#!/usr/bin/python2.3

# Load pygame libraries
import pygame
from pygame.locals import *
if not pygame.font: print "Warning, fonts are disabled"

#import psyco
#psyco.full()

from heapq import heappush, heappop # Used by PriorityQueue
import math
import time

import util # trig helpers (for drawing fire indicator)
import boats

resolution = (800, 600)

def game_to_screen(pt):
    return ((pt[0] + 70) * (resolution[0]/140.),
            (-pt[1] + 70) * (resolution[1]/140.))

class PriorityQueue:
    """
    Object-oriented wrapper around the heapq library.
    Maintains a list of objects and their depth,
    with fast removal of the HIGHEST-depth object.
    """
    def __init__(self):
        self._nodes = []
    
    def __len__(self):
        return len(self._nodes)
        
    def clear(self):
        """Clears the queue. Smile and wave to the garbage collector"""
        self._nodes = []
    
    def push(self, node, depth):
        """Adds a node and its depth to queue"""
        # Take advantage of the fact that Python sorts tuples first by the
        # first element, then by the second, etc.
        heappush(self._nodes, (depth, node))

    def pop(self):
        """Gets next node, according to priority"""
        return heappop(self._nodes)[1] # discard depth and return node

class Drawable:
    """Anything that wants to be drawn on the screen
    should implement this interface."""
    
    def draw(self, surface):
        """Draw myself onto the given surface."""
        pass

class BoatGlyph(Drawable):
    def __init__(self, b, color):
        self.vertices = [game_to_screen(pt) for pt in b.vertices()]
        self.color = color
        # We need this for attributes that doesn't vary from boat to boat
        # (and thus aren't sent over the network)
        cls = b.__class__
        h_width = cls.WIDTH*(b.health/cls.MAX_HEALTH)
        self.health_vertices = [game_to_screen(pt) for pt in
                                util.rect(b.location, h_width, cls.HEIGHT,
                                          angle=b.heading)]
        self.center = game_to_screen(b.location)
        if hasattr(b, 'software'):
            self.software = b.software
        else:
            self.software = 0
        
    def draw(self, surface):
        pygame.draw.lines(surface, self.color, True, self.vertices)
        pygame.draw.polygon(surface, self.color, self.health_vertices, 0)
        if self.software > 0:
            pygame.draw.circle(surface, (128,128,128), self.center, 4)

class TextStack(Drawable):
    def __init__(self, lines, loc, font, color=(255, 255, 255)):
        self.loc = game_to_screen(loc)
        self.surfaces = [font.render(line, True, color) for line in lines]
        self.spacing = font.get_height() + 2

    def draw(self, dest):
        loc = self.loc
        for surf in self.surfaces:
            dest.blit(surf, loc)
            loc = (loc[0], loc[1] + self.spacing)

class Text(Drawable):
    def __init__(self, text, loc, font, color=(255, 255, 255)):
        self.loc = game_to_screen(loc)
        self.surf = font.render(text, True, color)

    def draw(self, dest):
        dest.blit(self.surf, self.loc)

class StatusText(Drawable):
    '''Like Text, but positioned in screen instead of game coordinates'''
    def __init__(self, text, loc, font, color=(255, 255, 255)):
        self.loc = loc
        self.surf = font.render(text, True, color)

    def draw(self, dest):
        dest.blit(self.surf, self.loc)

class Pier(Drawable):
    def __init__(self, loc, color):
        self.loc = loc
        self.color = color
        
    def draw(self, surface):
        pygame.draw.circle(surface, self.color,
                           game_to_screen(self.loc), 4, 1)

class FireIndicator(Drawable):
    def __init__(self, loc, heading, fire_angle, fire_dist, color):
        self.loc = loc
        self.heading = heading
        self.fire_angle = fire_angle
        self.dist = fire_dist
        self.color = color
    def draw(self, surface):
        angle = (self.heading + self.fire_angle)%360
        theta = math.radians(angle)
        p2 = util.add(self.loc, (self.dist*math.cos(theta),
                                 self.dist*math.sin(theta)))
        pygame.draw.aaline(surface, self.color,
                           game_to_screen(self.loc),
                           game_to_screen(p2))

class Crosshairs(Drawable):
    def draw(self, surface):
        pygame.draw.line(surface, (255, 255, 255),
                         game_to_screen((-10,0)), game_to_screen((10,0)))
        pygame.draw.line(surface, (255, 255, 255),
                         game_to_screen((0,-10)), game_to_screen((0,10)))
        pygame.draw.circle(surface, (255, 255, 255),
                           game_to_screen((0,0)), 1, 1)

# TODO: this could be something spiky-looking instead
class DamagePoint(Drawable):
    def __init__(self, pt, color):
        self.pt = pt
        self.color = color
    def draw(self, surface):
        pygame.draw.circle(surface, self.color,
                           game_to_screen(self.pt), 1, 1)

class Visualizer:
    def __init__(self, fps=10, mediapath="media"):
        self._fps = fps
        self._clock = pygame.time.Clock()
        self._drawables = PriorityQueue()
        self._mediapath = mediapath
        
        pygame.init()
        self._window = pygame.display.set_mode(resolution)
        pygame.display.set_caption("Pirates Game")
        self._screen = pygame.display.get_surface()
        self._font = pygame.font.Font(None,36)
        self._boat_font = pygame.font.Font(None,16)
        self._big_font = pygame.font.Font(None,72)

    def update_state(self, game, players, boats):
        """Update our knowledge of the game state"""
        self._g = game
        self._players = players
        self._boats = boats
        
    def draw(self):
        """Mainloop for Visualizer"""
        if self._fps > 0:
            self._clock.tick(self._fps)
        self.prepare_drawables()
        self.update_graphics()

    def prepare_drawables(self):
        """Use the new game state to build a list of
        what to draw on the screen"""

        status_locs = [(10, 10), (10, 40)]
        for i, player in enumerate(self._players):
            self._drawables.push(
                StatusText('%s: %d' % (player.name, player.software),
                           status_locs[i], self._font), 10)
            self._drawables.push(Pier(player.pier, player.color), 10)
        
        for boat in self._boats:
            b = self._boats[boat]
            color = self._players[b.player].color
            
            # Draw rectangle showing actual location of boat
            vertices = [game_to_screen(pt) for pt in b.vertices()]
            self._drawables.push(BoatGlyph(b, color), 5)

            # Draw boat health, cargo
            boat_info = [str(b.id)]
            #if isinstance(b, boats.PirateBoat) and b.software > 0:
            #    boat_info.append('S: ' + str(b.software))
            self._drawables.push(TextStack(boat_info, b.location,
                                           self._boat_font, (255,255,255)), 6)

            # Draw fire indications
            if isinstance(b, boats.PirateBoat):
                for i in range(len(b.fire)):
                    if b.fire[i]:
                        self._drawables.push(FireIndicator(
                            b.location, b.heading,
                            b.fire_angle[i], b.fire_range[i], color), 6)

            # Draw vertices that deal damage
            for pt in b.damage_points:
                self._drawables.push(DamagePoint(pt, color), 6)

    def show_winner(self, delay):
        self.prepare_drawables()
        if self._g.winner == -1:
            win_str = 'Tie game!'
        else:
            win_str = 'Winner: ' + self._players[self._g.winner].name
        self._drawables.push(StatusText(win_str, (100, 250), self._big_font),
                             20)
        self.update_graphics()
        time.sleep(delay) # in seconds
        
    def update_graphics(self):
        """Updates our visualization with new information on boats"""
        self._screen.fill( (0,0,0) )
        while len(self._drawables) > 0:
            drawable = self._drawables.pop()
            drawable.draw(self._screen)
        pygame.display.flip()

    def _draw_fire(self, b, cannon, color):
        p1 = b.location
        angle = (b.heading + b.fire_angle[cannon])%360
        theta = math.radians(angle)
        dist = b.fire_range[cannon]
        p2 = util.add(p1, (dist*math.cos(theta), dist*math.sin(theta)))
        self._drawables.push(FireIndicator(p1, p2, color), 6)
        
    
def net_main(args):
    import net
    from client import ObserverClient
    
    if len(args) >= 1:
        host = args[0]
    else:
        host = net.HOST
    if len(args) >= 2:
        port = int(args[1])
    else:
        port = net.PORT
    
    game_client = ObserverClient(host, port)
    viz = Visualizer(fps=0) # draw as fast as we get data

    while True:
        game, players, boats = game_client.wait_for_next_turn()
        viz.update_state(game, players, boats)
        if game.status == game.DONE:
            break
        viz.draw()
    
    print 'Score: %f to %f' % (players[0].software, players[1].software)
    viz.show_winner(5)
    if game.winner == -1:
        print 'Tie game!'
    else:
        print 'Winner: Player', game.winner
    
def local_main(args):
    import ai
    import game
    
    g = game.Game(500)
    players = []
    for i in range(2):
        try:
            PlayerClass = getattr(ai, args[i])
        except AttributeError:
            print 'Could not find player class named', args[i]
            return
        pid = g.add_player()
        players.append(PlayerClass(pid))
    viz = Visualizer(fps=10)
    
    while g.status != g.DONE:
        state = game.unserialize_state(g.state())
        viz.update_state(*state)
        viz.draw()
        orders = {}
        for p in players:
            orders[p.id] = p.give_orders(*state)
        g.next_turn(orders)
    print 'Score: %f to %f' % (g.players[0].software, g.players[1].software)
    viz.show_winner(4)
    if g.winner == -1:
        print 'Tie game!'
    else:
        print 'Winner: Player', g.winner
    #raw_input("Press any key to continue")


usage = '''Usage:

Remote game: python visualizer.py remote [host_name] [port]
Local game:  python visualizer.py local Player1 Player2
 (Player[i] may be BusyPlayer, TestPlayer, etc.)
'''

if __name__ == '__main__':
    import sys
    import os

    #if len(sys.argv) < 2:
    #    print usage
    #else:
    if len(sys.argv) < 2 or sys.argv[1] == 'remote':
        net_main(sys.argv[2:])
    elif sys.argv[1] == 'local':
        local_main(sys.argv[2:])
    else:
        print usage
