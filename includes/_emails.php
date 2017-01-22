<?php
    // This address receives a copy of all automated conference mail
    $bcc_address = "conf-backup-l@acm.uiuc.edu";

    $conf_subject = "$rp_name Conference Registration";

    $conf_extra = "From: ACM Conference <conference@acm.uiuc.edu>\r\n";

    $conf_email = "Thank you for registering for the $rp_name $rp_year Computing Conference on $rp_date.

To provide your resume (in an electronic format) to the job fair recruiters, click here:
http://www.acm.uiuc.edu/conference/$rp_year/resume.php?e=$email

Thank you for registering,
ACM Conference Staff
$rp_name $rp_year
http://www.acm.uiuc.edu/conference/$rp_year/";

$volunteer_subject= "$rp_name Volunteer";

    $volunteer_extra = "From: ACM Conference <conference@acm.uiuc.edu>\r\n" .
                       "Cc: Volunteer Coordinator <volunteer@acm.uiuc.edu>\r\n";

$volunteer_email = "Thank you for volunteering for $rp_name.  We depend on volunteers to help man our booths and assist 
in other conference related tasks.

To provide your resume (in an electronic format) to the job fair recruiters, click here:
http://www.acm.uiuc.edu/conference/$rp_year/resume.php?e=$email

We will be contacting you closer to the date of the conference to arrange the specifics of your volunteering.

Thank you for volunteering,
ACM Conference Staff
$rp_name $rp_year
$rp_url";

//$mech_subject = "MechMania Team Registration Received";
//$mech_to = "$firstname_one $lastname_one <$email_one>, $firstname_two
//$lastname_two <$email_two>, $firstname_three $lastname_three <$email_three>";
//$mech_extra = "From: MechMania Team <mechmania@acm.uiuc.edu>\r\n" .
//              "Cc:   MechMania Team <mechmania@acm.uiuc.edu>\r\n";
//$mech_email = "We have received your registration for MechMania.  It is important 
//to note that all MechMania contestants must also register for conference at:
//http://www.acm.uiuc.edu/conference/$rp_year/register_attend.php
//
//We have recorded the following information about your team:
//Team Name: $teamname
//School: $school_name
//Your team number is: $team_num
//Entry status: $reg_status
//
//First player:  $firstname_one $lastname_one <$email_one> 
//Second player: $firstname_two $lastname_two <$email_two>
//Third player:  $firstname_three $lastname_three <$email_three>
//
//If you are from UIUC, we initially cap the number of UIUC teams to 4 and we
//place the rest on a waiting list to allow the non-UIUC teams a chance to play.
//
//We hope to see you at MechMania,
//$rp_mechmania_coordinators
//Mechmania Coordinators
//$rp_name $rp_year";

$jobfair_subject = "Univ. of Illinois: ACM $rp_name Conference";

$jobfair_email = "Thank you for your interest in sponsoring $rp_name $rp_year. A 
representative will contact you soon to discuss the details of sponsorship
and address any questions or concerns you may have.

We have received the following information regarding your sponsorship:
Name:                 $_REQUEST[company_name]
Representative Name:  $_REQUEST[rep_name] <$_REQUEST[rep_email]>
Phone:                $_REQUEST[phone]
Fax:                  $_REQUEST[fax]
Address               $_REQUEST[address]
                      $_REQUEST[address2]
                      $_REQUEST[city], $_REQUEST[state] $_REQUEST[zip]

Questions and Concerns:
$_REQUEST[note]

Sincerely,
-$rp_chair
Chair, $rp_name $rp_year
http://www.acm.uiuc.edu/conference/$rp_year/
";


?>
