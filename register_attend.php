<?php
  $thispage = "attendee";
	$parent = "register";
	$title = "Register";
	require 'includes/_top.php';

  check_status($rp_reg_stat_attendee);
  $result = mysql_query("SELECT COUNT(*) FROM registrants$rp_year");
  if(mysql_result($result, 0) >= 550)
    check_status(array('name' => 'Attendee registration', 'status' => REG_STAT_CLOSED));
?>

<div id="content">

<a name="attendee"><div class="section_title">Attendee Registration</div></a>
<p>

<?php echo $rp_name; ?> <?php echo $rp_year; ?> online registration is now
closed, but you are invited to come to the conference and attend for free
without registering.  All talks and other conference events are still open
to the public for free.  You may optionally provide us with your information
to receive an e-mail for attendee feedback after the conference, and a
reminder next year.

<!--
 All registered attendees receive a <?php echo $rp_name; ?> <?php echo
$rp_year; ?> T-shirt, an e-mail reminder prior to the conference, and are
entitled to a space in our electronic resume book.  You may optionally choose
to purchase meals for the weekend at a cost of $20, payable at check-in.
Please indicate below whether you would like to purchase meals and your T-shirt
size so we can order appropriate quantities. 
</p>
<p> Resumes are made
available to employers participating in the job fair. All other information
submitted is held confidential and only used to gauge attendance and contact
you regarding <?php echo $rp_name; ?>. 
-->
</p>
<p>

<form action="registered_attend.php" method="POST">

<?php include '_registration_form.php'; ?>

</form>

</div>

<?php require 'includes/_bottom.php'; ?>
