<?php

	require_once("database.php");

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if($connection -> query("SELECT * FROM `users` WHERE username =".$_POST["username"])){
			echo "user found";
		}
		else{
			echo "user not found";
		}
		$result = $connection -> query("SELECT * FROM `users` WHERE username =".$_POST["username"]) or trigger_error(mysqli_error($connection));
		if(mysqli_num_rows($result) === 0){
			#$connection -> query("INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `tel_num`, `user_email`, `username`, `password`) VALUES (NULL, 'kaspar', 'jesmin', '666666666', 'midagion', 'kaspar', 'jesmin')");
			if($connection -> query("INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `tel_num`, `user_email`, `username`, `password`) VALUES (NULL, '".$_POST["first_name"]."', '".$_POST["last_name"]."', '".$_POST["phone_num"]."', '".$_POST["email"]."', '".$_POST["username"]."', '".$_POST["password"]."')")){
				echo "user registration failed";
			}
			header("location:mainpage.php?sortbytime");
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
				<div class='field'><input type='text' placeholder='username' name='username' required></div>
				<div class='field'><input type='password' placeholder='password' name='password' required></div>
				<button type='submit' class='ui button'>Register</button>
			</form>
			<div class="register">
				<p>already a user?</p><a href='login.php'>log in</a>
			</div>
		</div>
	</body>
</html>
