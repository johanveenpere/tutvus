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
			$lunchesareacode = $lunchesareacode . "<p><b>Asukoht: </b>". getLocationName($connection, $lunch) . "</p>";
            if($lunch -> lunch_max_participant_number != 0){
                $lunchesareacode = $lunchesareacode . "<p><b>Kohad: </b> ".$lunch -> lunch_max_participant_number." / ".getCurrentNumberOfParticipants($connection, $lunch). " </p>";
            }
            else{
                $lunchesareacode = $lunchesareacode . "<p><b>Kohad: </b> piiramatu</p>";
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
        <div class="popup" id="lunchPopup">
            <form action="addlunch.php">
                <select class="ui dropdown" name="lunchlocations">
                    <?php
                        $result = $connection -> query("SELECT * FROM lunch_locations");
                        while($lunch_location = $result -> fetch_object()){
                            echo "<option value=" . $lunch_location -> lunch_location_id.">".$lunch_location -> lunch_location_name."</option>";
                        }
                    ?>
                </select><br>
                <input class="date" type="date" name="day"></input><br>
                <input type="time" name="startTime"></input>
                <input type="time" name="endTime"></input><br>
                <div class="ui checkbox">
                <input type="checkbox" name="example">
                <label>Piiramatu arv inimesi v6ib l6unaga uhineda</label>
                </div><br>
                <div class="ui input participants">
                <input type="number" name="maxNumParticipants"></input>
                </div>
            </form>
        </div>
		<div id="shadow" class="shadowoff">
		</div>
		<div id="apparea" class="ui container">
            <div class="ui grid">
    			<div id="header" class="fifteen wide centered column">
                    <h3 id="nimi">NIMI PERENIMI</h3>
					<h3 id="colunch">CO-LUNCH</h3><br><br><br>
					<button class="ui button sortbutton">Koht⇅</button>
					<button class="ui button sortbutton">Aeg⇅</button>
					<button class="ui button sortbutton">Osalejad⇅</button>
					<button onclick="showAddLunchPopup()" id="addLunchButton" class='ui button'>Lisa l6ouna</button>
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