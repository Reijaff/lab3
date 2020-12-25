<?php



date_default_timezone_set('Europe/Helsinki');
$now = time();

$some = strtotime("2001-9-9");

echo floor(($now - $some)/(60*60*24*365.2421896));



?>
