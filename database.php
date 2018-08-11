<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "monolith";

$connection = mysqli_connect($host, $username, $password, $database);


if(!$connection){
	die("connection failed: " . mysqli_connect_error());
}
