<?php

function uncaught_exception_handler($exception)
{
  global $rp_admin_email;
  print '<h3>An error has occurred</h3>';
  print '<p>We apologize, but an error has occurred while processing your request.  The administrator has been notified.</p>';
  mail($rp_admin_email, "Conference: bork bork bork!", $exception->getMessage() . ' at ' . $exception->getFile() . ' line ' . $exception->getLine() . 'stack trace follows: ' . $exception->getTraceAsString());
}

set_exception_handler(uncaught_exception_handler);

?>
