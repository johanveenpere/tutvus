<?php

	require_once("database.php");

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user_exists = $connection -> query("select * from users where username =".$_POST["username"]);
		if(!$user_exists){
			if($connection -> query("insert into 'users' values (null, '".$_POST["first_name"]."', '".$_POST["last_name"]."', '".$_POST["phone_num"]."', '".$_POST["email"]."', '".$_POST["username"]."', '".$_POST["password"]."'")){
				echo "user registration failed";
			}
			header("location:mainpage.php");
		}
		else{
			echo "user with this name already exists";
		}
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
		<script src="semantic/dist/semantic.min.js"></script>
		<link rel="stylesheet" type="text/css" href="login-register_style.css">
	</head>

	<body>
		<div class="ui container">
			<p>REGISTER</p>
			<form action="" class="ui form" method="post">
				<div class='field'><input type='text' placeholder='first name' name='first_name'></div>
				<div class='field'><input type='text' placeholder='last name' name='last_name'></div>
				<div class='field'><input type='email' placeholder='email' name='email'></div>
				<div class='field'><input type='text' placeholder='phone number' name='phone_num'></div>
				<div class='field'><input type='text' placeholder='username' name='username'></div>
				<div class='field'><input type='password' placeholder='password' name='password'></div>
				<button type='submit' class='ui button'>log in</button>
			</form>
			<div class="register">
				<p>already a user?</p><a href='login.php'>log in</a>
			</div>
		</div>
	</body>
</html>