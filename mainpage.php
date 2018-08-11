<?php
	require_once("database.php");
    require_once("lunch_display_data.php");
	$lunchesareacode = "";
	if(isset($_GET["sortbytime"])){
		#tekitab aja järgi sorditud listi lõunatest
		if(!$result = $connection -> query("SELECT * FROM lunches ORDER BY lunch_location")){
			echo "sql error: " . mysqli_error($connection);
		}
		while($lunch = $result -> fetch_object()){
            $lunchLocationName = getLocationName($connection, $lunch);
			$lunchesareacode = $lunchesareacode . "<div class='lunch'>";
			$lunchesareacode = $lunchesareacode . "<p>asukoht: ". $lunchLocationName . "</p>";
            if($lunch -> lunch_max_participant_number != 0){
                $lunchesareacode = $lunchesareacode . "<p>kohad: ".$lunch -> lunch_max_participant_number." / ".getCurrentNumberOfParticipants($connection, $lunch). " </p>";
            }
            else{
                $lunchesareacode = $lunchesareacode . "<p>kohad: piiramatu</p>";
            }
			$lunchesareacode = $lunchesareacode . "</div>";
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
		<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
		<script src="semantic/dist/semantic.min.js"></script>
		<link rel="stylesheet" href="mainpagestyle.css">
        <script src="addLunch.js"></script>
	</head>
	<body>
        <div class="popup">
            <form action="addlunch.php">
                <select name="lunchlocations">
                    <?php
                        $result = $connection -> query("SELECT * FROM lunch_locations");
                        while($lunch_location = $result -> fetch_object()){
                            echo "<option value=" . $lunch_location -> lunch_location_id.">".$lunch_location -> lunch_location_name."</option>";
                        }
                    ?>
                </select>
            </form>
        </div>
		<div id="apparea">
			<div id="header">

			</div>
			<div id="lunchesarea">
				<?php
					echo $lunchesareacode;
				?>
			</div>
		</div>
	</body>
</html>

