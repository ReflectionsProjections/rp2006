<table class="menu">
<tr>
<?php

	$pages = array(
		'index' => array(
			'url'	=> 'index.php',
			'name'  => 'Home',
		),

		'about' => array(
			'url'	=> 'about.php',
			'name'  => 'About',
		),

		'speakers' => array(
			'url'	=> 'speakers.php',
			'name'  => 'Speakers',
			'submenu'=> array(
				'speakers' => array(
					'url'	=> 'speakers.php',
					'name'	=> 'Speakers'
				),
				'webcast' => array(
					'url'	=> 'webcast.php',
					'name'	=> 'Webcast'
				)
			)
		),

    'events' => array(
        'url' => 'events.php',
        'name' => 'Events'
    ),

		'logistics' => array(
			'url'	=> 'logistics.php',
			'name'  => 'Logistics',
		),
		
		'register' => array(
			'url'	=> 'register.php',
			'name'  => 'Register',
      'submenu' => array(
        'attendee' => array(
          'url' => 'register_attend.php',
          'name' => 'Attendee'
        ),
        'volunteer' => array(
          'url' => 'register_volunteer.php',
          'name' => 'Volunteer'
        ),
        'mechmaniareg' => array(
          'url' => 'reg_mm.php',
          'name' => 'MechMania'
        )
      )
		),
		
		'jobfair' => array(
			'url'	=> 'jobfair.php',
			'name'  => 'Job Fair',
		),
		
		'mechmania' => array(
			'url'	=> 'mechmania.php',
			'name'  => 'Mechmania',
			'submenu'=> array(
				'story' => array(
					'url'	=> 'mechmania_story.php',
					'name'	=> 'Story'
				),
				'details' => array(
					'url'	=> 'mechmania_details.php',
					'name'	=> 'Details'
				),
				'mech_reg' => array(
					'url'	=> 'mechmania_registration.php',
					'name'	=> 'Registration'
				),
				'mech_history' => array(
					'url'	=> 'mechmania_history.php',
					'name'	=> 'History'
				),
        'documentation' => array(
          'url'   => 'mechmania_documentation.php',
          'name'  => 'Documentation'
        )
			)
		),
		/*
		'xbox' => array(
			'url'	=> 'xbox.php',
			'name'  => 'XBox',
		),
		*/
		/*
		'video' => array(
			'url'	=> 'webcast.php',
			'name'  => 'Video',
		),
		*/
		'puzzlecrack' => array(
			'url'	=> 'puzzlecrack.php',
			'name'  => 'PuzzleCrack',
		)
		
		/*
		'papers' => array(
			'url'	=> 'papers.php',
			'name'  => 'Call For Papers',
		)*/
	);
	

	foreach ($pages as $page => $value) {
		if ( $page != $thispage && $page != $parent ) {
			print '<td class="menu_item"><a class="navbar" href="' . $value['url'] . '">' . $value['name'] . '</a></td>';
		} else {
			if ( $page['submenu'] ) {
				if ( $page == $parent ) {
					print '<td class="sub_menu_item" style="border-left:#333;border-bottom:0px;border-collapse:sep;"><a class="sub_menu_item" href="'. $value['url']. '">' . $value['name'] . '</a></td>';
				} else {
					print '<td class="sub_menu_item"
                                        style="border-left:#333;border-bottom:0px;border-collapse:sep;"><a class="sub_menu_item_self" href="' . $value['url'] .'">'.$value['name'].'</a></td>';
				}
			} else {
				print '<td class="menu_item">' . $value['name'] . '</td>';
			}
		}
	}
	
	$parent = ( $parent ) ? $parent : $thispage;
	
	print "</tr></table>";

	if ( $pages[$parent]['submenu'] ) {
		print '<table class="sub_menu"><tr>';
		foreach ( $pages[$parent]['submenu'] as $page => $value) {
			if ( $page == $thispage ) {
				print '<td class="sub_menu_item_2">' . $value['name'] . '</td>';
			} else {
				print '<td class="sub_menu_item_2"><a class="sub_menu_item_2" href="' . $value['url'] . '">' . $value['name'] . '</a></td>';
			}
		}
		print "</tr></table>";
	}
?>

