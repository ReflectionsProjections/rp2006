<?php
	$title = "Wireless Access";
	include '_top.php';

        function adderror($arg1)
        {
            echo
            "<center><b>$arg1</b><p/></center>";
        }
        function quiterror($arg1)
        {
            adderror($arg1);
	    print "</div>";
            include '_bottom.php';
            exit();
        }

?>

<div id="content">

<?php

    $fail =0;
    if($_REQUEST[email] == "")
    {
        adderror("You must enter your email address.");
        $fail = 1;
    }
    if($_REQUEST[mac] == "")
    {
        adderror("You must enter a mac address.");
        $fail = 1;
    }

    if($fail == 1)
    {
        quiterror("Correct the above error(s) and try again.");
    }

	$link = mysql_connect($rp_db_host,$rp_db_user,$rp_db_pwd)
		or die("Could not connect");
	mysql_select_db($rp_db_database) or die("Could not select database");

    $q = "UPDATE registrants$rp_year SET mac_address=\"$_REQUEST[mac]\" WHERE email=\"$_REQUEST[email]\"";

    mysql_query($q) or quiterror("Problem adding mac address.");

    adderror("We have addded your mac address to our database.");
    
    mysql_close($link);
?>

</div>

<?php include '_bottom.php'; ?>
