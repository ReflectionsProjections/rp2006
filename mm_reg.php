<?php
#die('Registration is not yet open.');
	$title = "Registered";
	include '_top.php';

        function adderror($arg1)
        {
            echo "<center><b>$arg1</b><p/></center>";
        }
        function quiterror($arg1)
        {
            adderror($arg1);
            include '_bottom.php';
            exit();
        }

import_request_variables("gp", "url_");

if ($url_print == '') {
  $url_print = "no";
}

if (($url_member1_email == '')||($url_member2_email == '')||($url_member3_email == '')) {
?>

<center><img src="images/register.jpg"></center>

<div id="content">


<center><b>Error: each team member must have have a valid e-mail address to register for MechMania.</b></center><p/>

</div>

<?php
} else {
	$mm_to = "$url_member1_email, $url_member2_email, $url_member3_email";
	$mm_fields = "
Member 1: $url_member1_first $url_member1_last <$url_member1_email>
Member 2: $url_member2_first $url_member2_last <$url_member2_email>
Member 3: $url_member3_first $url_member3_last <$url_member3_email>
Team name: $url_team_name
School / Organization: $url_school
Printed documentation? $url_print
Colors: $url_color1 and $url_color2
Alternate colors: $url_color3 and $url_color4
Note: $url_note
";

	$mm_message = "
Members of $url_team_name,

Thank you for registering for MechMania XII. You will receive additional
information shortly.

The information you entered was:
";


mail("jroth2@gmail.com", "MechMania registration", $mm_fields,
"From: mechmania-registration@acm.uiuc.edu\r\n");

mail("mm-l@acm.uiuc.edu", "MechMania registration", $mm_fields,
"From: mechmania-registration@acm.uiuc.edu\r\n");

#mail($mm_to, "MechMania registration", $mm_message.$mm_fields,
#"From: mechmania@acm.uiuc.edu\r\n");

?>

<center><img src="images/register.jpg"></center>

<div id="content">


<center><b>Thank you for your interest in MechMania.</b></center><p/>
<center><b>You will receive a confirmation email shortly.</b></center>

</div>

<?php

}

?>

<?php include '_bottom.php'; ?>
