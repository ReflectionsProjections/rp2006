  <?php
function adderror($arg1)
{
  global $fail;
  $fail++;
  echo "<center><b>$arg1</b><p/></center>";
}
function quiterror($arg1)
{
  adderror($arg1);
  include '_bottom.php';
  exit();
}

function check_status($status)
{
  if(is_null($status) or !is_array($status) or is_null($status['status']) or is_null($status['name']))
    throw new Exception("Invalid status");

  switch($status['status'])
  {
    case REG_STAT_PREOPEN:
      print '<div class="status">' . $status['name'] . ' is not yet open.  Please come back soon!</div>';
      break;
    case REG_STAT_OFFLINE:
      print '<div class="status">' . $status['name'] . ' is currently down for maintenance.  Please try again later.</div>';
      break;
    case REG_STAT_CLOSED:
      print '<div class="status">' . $status['name'] . ' is now closed.  Thank you for your interest.</div>';
      break;
    default:
      return;
  }

  include '_bottom.php';
  exit();
}

function is_valid_string($parameter)
{
  return is_string($parameter) && strlen($parameter) > 0;
} 

function is_valid_email_address($email)
{
  if(!is_valid_string($email))
    return false;

  $pattern = '/^(([a-z0-9!#$%&*+-=?^_`{|}~][a-z0-9!#$%&*+-=?^_`{|}~.]*[a-z0-9!#$%&*+-=?^_`{|}~])|[a-z0-9!#$%&*+-?^_`{|}~]|("[^"]+"))[@]([-a-z0-9]+\.)+([a-z]{2}|com|net|edu|org|gov|mil|int|biz|pro|info|arpa|aero|coop|name|museum)$/ix';
  return preg_match ($pattern, $email) ? 1 : 0;
}
  ?>
