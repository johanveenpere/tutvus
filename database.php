<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "monolith";

$connection = mysqli_connect($host, $username, $password, $database);

<<<<<<< HEAD
if(!$connection){
	die("connection failed: " . mysqli_connect_error());
}

echo "connected successfully";
=======
>>>>>>> bd67768b2f73445a2eca3e01f4af675fd044f228
?>