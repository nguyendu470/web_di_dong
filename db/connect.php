<?php
$mysqli = new mysqli("localhost","root","","bangiay");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Change character set to utf8
$mysqli -> set_charset("utf8");

$mysqli -> character_set_name();

//$mysqli -> close();
?>