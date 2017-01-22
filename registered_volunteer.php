<?php
$thispage = "volunteer";
$parent = "register";
$title = "Volunteer Registration Confirmation";
require 'includes/_top.php';
require 'includes/database.php';

//check_status($rp_reg_stat_volunteer);

	/* Connecting, selecting database */
	
  $conn = new MySqlConnection($rp_db_host, $rp_db_user, $rp_db_pwd, $rp_db_database);

  $fail = 0;
  
  $_REQUEST[shirt_size] = strtoupper($_REQUEST[shirt_size]);
  $_REQUEST[is_volunteer] = 1;
  $_REQUEST[is_veg] = ($_REQUEST[veg] == "on");
        
  if(!($_REQUEST[shirt_size] == "S" ||
    $_REQUEST[shirt_size] == "M" ||
    $_REQUEST[shirt_size] == "L" ||
    $_REQUEST[shirt_size] == "XL" ||
    $_REQUEST[shirt_size] == "XX"))
  {
    adderror("You must specify a valid shirt size.");
  }

  if($_REQUEST[firstname] == "")
  {
    adderror("You must enter a first name.");
  }
  if($_REQUEST[lastname] == "")
  {
    adderror("You must enter a last name.");
  }
  if(!is_valid_email_address($_REQUEST[email]))
  {
    adderror("You must enter a valid email address.");
  }

  if($fail == 1)
  {
    quiterror("Please correct the above errors and resubmit your
      registration information.");
  }
       
  $q = $conn->prepare("SELECT firstname, lastname, address, address2, city, state, zip, is_veg, dietary_restrictions, shirt_size, email, referred_by, is_volunteer FROM registrants$rp_year WHERE email = ?");
  $is_registered = $q->execute($_REQUEST[email]) > 0;

  $ds = $q->fetchdataset();
  $ds->Scrape($_REQUEST);

  if($is_registered)
  {
    $ds->Update("email");
  }
  else
  {
    $ds->Insert();
  }

  include '_emails.php';

  mail($_REQUEST[email], $conf_subject, $conf_email, $conf_extra .  ($bcc_address ? "Bcc: $bcc_address\r\n" : "" ));

echo "
<center>You are now registered for $rp_name $rp_year!</center><p/>

<center>
To increase your employment opportunities, please <a href=\"resume.php?e=$_REQUEST[email]\"> submit your resume</a>.
</center>

<p></p>

<center>You will receive a confirmation email shortly.</center>
";
?>

<?php include 'includes/_bottom.php'; ?>
