<?php
	$title = "Wireless Access";
	include '_top.php';
?>

<br>

<div id="content">
<?php 

if($_REQUEST[e] == "")
{
    print "You must follow the link you received from your email.<p/>";
}
else
{
?>
<form action="wireless_submit.php" method="GET">
E-mail: <?php print"$_REQUEST[e]"; ?>  
    <input type="hidden" name="email" value="<?php print "$_REQUEST[e]"; ?>"><p/>
        Mac address (xxxxxx:xxxxxx): <input type="text" name="mac"><p/>
    <input type="submit" name="add" value="Submit Request"><br>
</form>
<?php
}
?>

</div>

<?php include '_bottom.php'; ?>
