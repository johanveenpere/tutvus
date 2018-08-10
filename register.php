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
	<div class="ui grid">
			<div class="fifteen wide centered column">
				<h4 class="co-lunch">CO-LUNCH</h4>
			</div>
			<div class="four wide centered column">
				<h2>Registeeri</h2>
				<div class="ui input">
  					<input type="text" placeholder="Nimi">
				</div>
				<div class="ui input">
  					<input type="text" placeholder="Kasutajanimi">
				</div>
				<div class="ui input">
  					<input type="password" placeholder="parool">
				</div>
				<div class="ui input">
  					<input type="number" placeholder="Telefoni number">
				</div>
				<div class="ui input">
  					<input type="e-mail" placeholder="meiliaadress">
				</div>
				<button class="ui button">
					Registreeri
				</button>
				<p class='registreeri'>Ikka on kasutaja?</br> <a href='login.php'>Logi sisse</a></p>
			</div>	
		</div>
	</body>
</html>