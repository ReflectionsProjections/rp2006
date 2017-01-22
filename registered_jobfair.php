<?php
	$title = "Registered";
	include 'includes/_top.php';
  include 'includes/database.php';

//  check_status($rp_reg_stat_jobfair);

	/* Connecting, selecting database */

  $conn = new MySqlConnection($rp_db_host, $rp_db_user, $rp_db_pwd, $rp_db_database);

  /* Validate input */
  $fail = 0;

  if(!is_string($_REQUEST[type]) || $_REQUEST[type] == "")
  {
    adderror("Please choose the Keystone or Foundation sponsorship.");
    $fail = 1;
  }

  if(!is_string($_REQUEST[company_name]) || $_REQUEST[company_name] == "")
  {
    adderror("Please specify a company name.");
    $fail = 1;
  }
  
  if(!is_string($_REQUEST[rep_name]) || preg_match("/^[A-Za-z .\-]+$/", $_REQUEST[rep_name]) == 0)
  {
    adderror("Please specify a representative name.");
    $fail = 1;
  }
      
  if(!is_valid_email_address($_REQUEST[rep_email]))
  {
    adderror("Please specify an email address for the
      representative.");
    $fail = 1;
  }

  if(!is_string($_REQUEST[phone]) || $_REQUEST[phone] == "")
  {
    adderror("Please specify a phone number.");
    $fail = 1;
  }

  if(!is_string($_REQUEST[address]) || $_REQUEST[address] == "")
  {
    adderror("Please specify an address.");
    $fail = 1;
  }
  
  if(!is_string($_REQUEST[city]) || $_REQUEST[city] == "")
  {
    adderror("Please specify a city.");
    $fail = 1;
  }
  
  if(!is_string($_REQUEST[state]) || $_REQUEST[state] == "")
  {
    adderror("Please specify a state.");
    $fail = 1;
  }

  if(!is_string($_REQUEST[zip]) || $_REQUEST[zip] == "")
  {
    adderror("Please specify a zip code.");
    $fail = 1;
  }

  /* Performing SQL query */

  if($fail == 1)
  {
    quiterror("After correcting the above errors you may resubmit your registration information.");
  }
      
  $q = $conn->prepare("INSERT INTO sponsors$rp_year SET company_name = ?, rep_name = ?, rep_email = ?, address = ?, address2 = ?, city = ?, state = ?, zip = ?, phone = ?, fax = ?, type = ?, note = ?");
  
  $q->execute($_REQUEST["company_name"], $_REQUEST["rep_name"], $_REQUEST["rep_email"], $_REQUEST["address"], $_REQUEST["address2"], $_REQUEST["city"], $_REQUEST["state"], $_REQUEST["zip"], $_REQUEST["phone"], $_REQUEST["fax"], $_REQUEST["type"], $_REQUEST["note"]);

        include '_emails.php';

        mail("$_REQUEST[rep_name] <$_REQUEST[rep_email]>", $jobfair_subject, stripslashes($jobfair_email),
             "From: corporate@acm.uiuc.edu\r\n".
             "Reply-to: corporate@acm.uiuc.edu\r\n".
             "Cc: corporate@acm.uiuc.edu\r\n");

?>

<div id="content">

<center><b>Thank you for your interest in sponsoring Reflections
Projections.</b></center><p/>
<center><b>You will receive a confirmation email shortly.</b></center>

</div>

<?php include '_bottom.php'; ?>

