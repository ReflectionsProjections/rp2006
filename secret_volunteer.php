<?php
	$thispage = "volunteer";
  $parent = "register";
	$title = "Volunteer Registration";
	include 'includes/_top.php';

//  check_status($rp_reg_stat_volunteer);
?>

<div id="content">

<a name="attendee"><div class="section_title">Volunteer Registration</div></a>

Volunteeer registration entitles you to several benefits including meals
during the conference, a wonderful <?php echo $rp_name; ?> <?php echo
$rp_year; ?> t-shirt, wireless access, and a space in our electronic resume
book.  Volunteers are required to attend brief orientation meetings in the
week prior to the conference.  In particular, video volunteers will need to
go to a training sessions for using the video recording booths in Siebel and
DCL.

<form action="registered_volunteer.php" method="POST">

<?php $is_volunteer = 1; ?>
<?php include '_registration_form.php'; ?>

</form>

</div>

<?php include 'includes/_bottom.php'; ?>
