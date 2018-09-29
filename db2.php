<?php
$dbhost = "localhost";
$dbname = "inventory";
$dbuser = "root";
$dbpassword = "";

$con = mysqli_connect($dbhost,$dbuser,$dbpassword, $dbname);

if (!$con) {
	# code...
	die ("connection failed " . mysqli_connect_error());
}
?>
