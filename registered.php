<?php
$thispage = "register";
$title = "Registration Confirmation";
require 'includes/_top.php';
require 'includes/database.php';

function adderror($arg1)
{
  echo "<center><b>$arg1</b><p/></center>";
}
function quiterror($arg1)
{
  adderror($arg1);
  print "</div>";
  include '_bottom.php';
  exit();
}
?>

<?php
if ($rp_db_locked) {
        	quiterror("Registration is closed.");
	}

	/* Connecting, selecting database */
/*	
	$link = mysql_connect($rp_db_host, $rp_db_user, $rp_db_pwd)
		or quiterror("There was a problem connecting to the database,
                please try again later.");
	
	mysql_select_db($rp_db_database) or quiterror("There was a problem accessing
        the database");

	$volunteer = ( $_REQUEST[type] == "is_volunteer" ) ? 1 : 0;

        $veggie = ( $_REQUEST[veg] == "on" ) ? 1 : 0;
*/
	/* Performing SQL query */
/*        $fail =0;

        $_REQUEST[shirt_size] = strtoupper($_REQUEST[shirt_size]);
        
        if(!($_REQUEST[shirt_size] == "S" ||
           $_REQUEST[shirt_size] == "M" ||
           $_REQUEST[shirt_size] == "L" ||
           $_REQUEST[shirt_size] == "XL" ||
           $_REQUEST[shirt_size] == "XX"))
        {
           adderror("You must specify a valid shirt size.");
           $fail =1 ;
        }
        
        if($_REQUEST[firstname] == "")
        {
            adderror("You must enter a first name.");
            $fail = 1;
        }
        if($_REQUEST[lastname] == "")
        {
            adderror("You must enter a last name.");
            $fail = 1;
        }
        if($_REQUEST[email] == "")
        {
            adderror("You must enter an email address.");
            $fail = 1;
        }
       
        if($fail == 1)
        {
            quiterror("Please correct the above errors and resubmit your
            registration information.");
        }
       
        #check to see if they are already in the database because they 
        #signed up for mechmania first.
        $is_registered = "SELECT id FROM registrants$rp_year WHERE
        email=\"$_REQUEST[email]\"";

        $result = mysql_query($is_registered);
        if($result && mysql_num_rows($result) == 1)
        {
            $row = mysql_fetch_row($result);
            $id = $row[0];
            $insert = "UPDATE registrants$rp_year ";
        }else
        {
            $id = -1;
            $insert = "INSERT INTO registrants$rp_year ";
        }
        $insert = $insert . "SET
        firstname=\"$_REQUEST[firstname]\",lastname=\"$_REQUEST[lastname]\",address=\"$_REQUEST[address]\",address2=\"$_REQUEST[address2]\",
        city =\"$_REQUEST[city]\", state = \"$_REQUEST[state]\",zip=\"$_REQUEST[zip]\",phone =
        \"$_REQUEST[phone]\",email=\"$_REQUEST[email]\",when_registered=NOW(),
        is_volunteer=\"$volunteer\", is_veg=\"$veggie\", dietary_restrictions=\"$_REQUEST[dietary_restrictions]\", 
        referred_by=\"$_REQUEST[referred_by]\", shirt_size=\"$_REQUEST[shirt_size]\"";

        if($id != -1)
        {
            $insert = $insert . "WHERE id=\"$id\"";
        }
        else
        {
            $insert = $insert . ", school = \"$_REQUEST[school]\"";
        }
            
        $work = mysql_query($insert) or quiterror ("There was a problem adding
                    you to the database, please contact the webmaster:".
                    mysql_error());

        include '_emails.php';

                if($volunteer == 1)
        {
                //mail($_REQUEST[email], $volunteer_subject, $volunteer_email,
                 $volunteer_extra .  ($bcc_address ? "Bcc: $bcc_address\r\n" : "" ));
            }else {
                //mail($_REQUEST[email], $conf_subject, $conf_email, $conf_extra .  ($bcc_address ? "Bcc: $bcc_address\r\n" : "" ));
                }

echo "
<center>You are now registered for $rp_name $rp_year!</center><p/>

<center>
To increase your employment opportunities, please <a href=\"resume.php?e=$_REQUEST[email]\"> submit your resume</a>.
</center>

<p></p>

<!--<center>
To sign up for wireless access, <a href=\"wireless.php?e=$_REQUEST[email]\">click here</a>.
</center>-->

<p></p>

<center>You will receive a confirmation email shortly.</center>
";*/
?>

<?php include '_bottom.php'; ?>

