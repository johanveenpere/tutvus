
<html>
	<head>
	</head>
	<body>
		<p>logged in</p>
	</body>
</html>

<?php
	require_once("database.php");
	$lunchesareacode = "";
	if(isset($_GET["sortbytime"])){
		#tekitab aja järgi sorditud listi lõunatest
		if(!$result = $connection -> query("SELECT * FROM lunches ORDER BY lunch_location")){
			echo "sql error: " . mysqli_error($connection);
		}
		while($lunch = $result -> fetch_object()){
            $lunchLocationName = $connection -> query("SELECT lunch_location_name FROM lunch_locations WHERE lunch_location_id =". $lunch -> lunch_location) -> fetch_object() -> lunch_location_name;
			$lunchesareacode = $lunchesareacode . "<div class='lunch'>";
			$lunchesareacode = $lunchesareacode . "<p>asukoht: ". $lunchLocationName . "</p>";
			$lunchesareacode = $lunchesareacode . "</div>";
			echo "while";
		}
	}
	else if(isset($_GET["sortbylocation"])){
		#sordib lõunad koha järgi
	}
	else{

	}
?>
<html>
	<head>
		<!--link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
		<script src="semantic/dist/semantic.min.js"></script -->
		<link rel="stylesheet" href="mainpagestyle.css">
	</head>
	<body>
		<div class="ui grid">
  			<div class="fifteen wide column header">

			</div>
		</div>
			<div id="lunchesarea">
				<?php
					echo $lunchesareacode;
				?>
			</div>
	</body>
</html>
