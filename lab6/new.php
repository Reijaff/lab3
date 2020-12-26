<?php


$conn = mysqli_connect("localhost","mydbuser","tBQZ8UDPsim3MLMm");	
if (!$conn)
	die("Connection failed : ".mysqli_connect_error());

$sql = "CREATE DATABASE myDB";

if (mysqli_query($conn, $sql)){
	echo " hello from db";
}else{
	echo "error".musqli_error($conn);
}

mysqli_close($conn);

?>
