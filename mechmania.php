<?php
	$thispage = "mechmania"; 
	$title = "MechMania $rp_mechmania_num";
	$mm_staff_email = "mechmania@acm.uiuc.edu";
	include 'includes/_top.php';
?>

<div id="content">

<table><tr><td>
<!--<img src="images/mmxilogo.jpg" width = "360" height = "360" align="right">-->

<div class="section_title">MechMania <?php echo $rp_mechmania_num;
?>:<br>ACM@UIUC's <?php echo $rp_number; ?> Annual 
<br>C++/AI Programming Contest</div>
<div class="section">
<b><?php echo "$rp_days, $rp_year"; ?></b>
<br>
University of Illinois at Urbana-Champaign
<br>
Thomas M. Siebel Center for Computer Science
<br>
<br>
<!-- 
<a href="reg_mm.php">Register your team for MechMania</a>
-->
</div>
</td>

<td>
<?php include '_mechmaniasponsor.php'; ?>
</td>
</tr></table>

<div class="section_title">Results</div>
<p>
First Place - Team NOOP (University of Missouri-Rolla)<br>
Second Place - Team KIN (UIUC)<br>
Third Place - Artificial Unintelligence (UIS)<br>
</p>
<p>
Here is the <a href="mm-files/bracket.jpg">final bracket</a>.
</p>
<p>
<div class="section_title">Source Code</div>
Due to the size of the 3D visualizer, we have split the source code distribution into two .tar.gz files: <a href="mm-files/mm12.tar.gz">the main distribution</a> and <a href="mm-files/spiffviz.tar.gz">the 3D visualizer</a> (31 MB). Refer to the README files in each of these for instructions on building and running the code.
</p>
<p>
<div class="section_title">Screenshots</div>
<a href="mm-files/screen1.png"><img src="mm-files/screen1-sm.png"></a>
<a href="mm-files/screen2.png"><img src="mm-files/screen2-sm.png"></a>
<br/>
(Click for a full-size image)
<p>
If you have any questions about this year's competition, email the staff at <a href="mailto:<?php echo $mm_staff_email; ?>"><?php echo $mm_staff_email; ?></a>.
</p>
<!--
<p>
<a href="reg_mm.php">Register your team for MechMania</a>
</p>
-->
</div>
<?php include 'includes/_bottom.php'; ?>
