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


			$lunchesareacode = $lunchesareacode . "<div class='ui raised segment'>";

			$lunchesareacode = $lunchesareacode . "<p>asukoht: ". getLocationName($connection, $lunch) . "</p>";
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
		<script src="semantic/dist/semantic.min.js"></script>
		<link rel="stylesheet" href="mainpagestyle.css">
        <script src="addLunch.js" type="text/javascript"></script>
        <!--script>
            function showAddLunchPopup(){
                console.log("show popup");
            }
        </script-->
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
                </select><br>
                <input type="date" name="day"></input><br>
                <input type="time" name="startTime"></input>
                <input type="time" name="endTime"></input>
                <div class="ui checkbox">
                    <input type="checkbox" name="unlimitedParticipants">
                    <label>inimesed võivad piiramatult lõunaga ühineda</label>
                </div>
                <input type="number" name="maxNumParticipants"></input>
            </form>
        </div>
		<div id="apparea" class="ui container">
            <div class="ui grid">
    			<div id="header" class="fifteen wide centered column">
                    <h3 id="nimi">NIMI PERENIMI</h3>
					<h3 id="colunch">CO-LUNCH</h3><br><br><br>
					<button class="ui button sortbutton">Koht⇅</button>
					<button class="ui button sortbutton">Aeg⇅</button>
					<button class="ui button sortbutton">Osalejad⇅</button>
					<button id="addLunchButton" class='ui button'>Lisa lõuna</button>
				</div>
    			<div id="lunchesarea" class="fifteen wide centered column">
    				<?php
						echo $lunchesareacode;
						
					?>
    			</div>
            </div>
		</div>
	</body>
</html>
