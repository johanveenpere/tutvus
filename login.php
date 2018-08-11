<?php
	require_once("database.php");
	session_start();
	
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$myusername = mysqli_real_escape_string($connection,$_POST['username']);
			$mypassword = mysqli_real_escape_string($connection,$_POST['password']); 
			  
			$sql = "SELECT user_id FROM users WHERE username = '$myusername' and password = '$mypassword'";
			$result = mysqli_query($connection,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			#$active = $row['active'];
			  
			$count = mysqli_num_rows($result);
			  
			// If result matched $myusername and $mypassword, table row must be 1 row
				
			if($count == 1) {
				$_SESSION['login_user'] = $myusername;



				header("location: mainpage.php?sortbytime");

			}
			else {
				echo "Your Login Name or Password is invalid";
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
			<p>LOGIN</p>
			<form action="" class="ui form" method="post">
						<div class='field'><input type='text' placeholder='username' name='username'></div>
						<div class='field'><input type='password' placeholder='password' name='password'></div>
						<button type='submit' class='ui button'>log in</button>
			</form>
			<div class="register">
				<p>don't have an account?</p><a href='register.php?register'>register</a>
			</div>
		</div>
	</body>
</html>