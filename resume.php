<?php
	$title = "Job fair resume drop";
	include 'includes/_top.php';
?>

<br>


<?php

    if($_REQUEST[e] == "")
    {
        quiterror("You must follow the link from the email.");
    }
    
	$link = mysql_connect($rp_db_host,$rp_db_user,$rp_db_pwd)
		or die("Could not connect");
	mysql_select_db($rp_db_database) or die("Could not select database");

    $fail = 0;

    $q = "SELECT firstname, lastname FROM registrants$rp_year WHERE email=\"$_REQUEST[e]\"";

    $res = mysql_query($q) or quiterror("Database error.");

    if(mysql_num_rows($res) < 1)
    {
        quiterror("You must register for conference first.");
    }
    else
    {
        $row = mysql_fetch_row($res);
        $name = "$row[0] $row[1]";

    }
?>
<form action="resume_drop.php" method="POST" enctype="multipart/form-data">
<table border=0 width="90%">
<input type="hidden" name="rp" value="1"/>
<input type="hidden" name="email" value= <?php print "\"$_REQUEST[e]\""; ?> >
<tr>
<td width="40%">Name: </td><td width="60%"><?php print "$name";?></td>
</tr>
<tr>
    <td width="40%">Graduation data MM-YY:</td>
    <td width="60%"><input type="text" name="graddate"></td>
</tr>
<tr>
    <td width="40%">Employment type</td>
    <td width="60%">
        <input type="checkbox" name="intern" value="on">Internship</input>
        <input type="checkbox" name="coop" value="on">Co-op</input>
        <input type="checkbox" name="fulltime" value="on">Fulltime</input>
    </td>
</tr>
<tr>
    <td>Resume File (.pdf, .doc or .txt only!):</td>
    <td><input type="file" name="resume" /></td>
</tr>
<tr>
    <td></td>
    <td>
    <input type="submit" name="drop" value="submit" /></td>
</tr>
</table>
</form>

<?php include 'includes/_bottom.php'; ?>
