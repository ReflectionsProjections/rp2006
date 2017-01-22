<?php

include 'includes/utility.php';
?>
<html><body>
<?php
if($_POST)
{
  print isValidEmailAddress($_POST['test']);
}

?>
<form method="post">
<input type="text" name="test">
<input type="submit">
</form>
</body></html>
