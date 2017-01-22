<?php
	$thispage = "index";
	require 'includes/_top.php';
?>

<div id="content">

<p><font size="+2">Reflections | Projections <?php print $rp_year; ?></font></p><p style="text-align:center;"><font size="+1"><a href="webcast.php">Talk videos now online</a></font></p>

<p>
The Association for Computing Machinery at the University of Illinois is
hosting its <?php echo $rp_number; ?> annual student computing conference on
<?php echo $rp_date; ?>. Registration for the conference is open to all
parties interested in cutting-edge computing technology. No university or
ACM affiliation is necessary.
</p>

<p>
<?php echo $rp_name; ?> brings together students from across the country to
gain a broader perspective on computer science. The conference is a unique
opportunity for attendees to enrich their knowledge of cutting-edge
concepts from beyond the classroom. The associated job fair provides an
ideal venue to meet representatives from a wide range of employers
interested in computer science, MIS and electrical and computer engineering
students. All in all, <?php echo $rp_name; ?> is an exciting weekend of
learning and fun.
</p>

<p> 
We had a number of excellent speakers present at the 2006 conference. Please check them out <a
href="speakers.php">here.</a> 
</p>

<p>
<!--
Please visit the <a href="register_attend.php">
attendee registration page</a> to sign up for the conference.  Other
types of registration, including <a href="mechmania.php">MechMania</a>
teams and <a href="jobfair.php">corporate sponsors</a> are also
available from the <a href="register.php">registration page</a>.
-->
<br/><br/>
</p>

<!--<p>Last Year's Sponsors:</p>-->

<?php //include '_sponsor.php'; ?>

</div>

<?php include 'includes/_bottom.php'; ?>
