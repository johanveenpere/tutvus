<!DOCTYPE HTML>

<?php
require_once('sql.php');

$kasutaja_id = 1;

$kasutaja = $conn -> query("SELECT * FROM user WHERE id=".$kasutaja_id) -> fetch_object();
$postitatud_lounad = $conn -> query("SELECT * FROM lunch");
while($obj = $postitatud_lounad -> fetch_object()){
	echo "<div class=\"postitus\">";
	#lõuna andmed
	echo "<p>louna ID: " . $obj -> id . "</p>";
	echo "<p>aeg: " . $obj -> lunch_time . "</p>";
	echo "<p>koht: " . $obj -> location . "</p>";
	#teise kasutaja andmed
	$teine_kasutaja = $conn -> query("SELECT * FROM user WHERE id=".$obj -> user_id_1) -> fetch_object();
	echo "<p>matchi nimi: " . $teine_kasutaja -> name . "</p>";
	echo "<p>amet: " . $teine_kasutaja -> department . "</p>";
	echo "</div>";
}
$restoranid = explode(",", $conn -> query("SELECT restaurants FROM company WHERE id=".$kasutaja -> company_id) -> fetch_object() -> restaurants);

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="interface.css">
	</head>
	<body>
		<div id="väljad">
			<form action="otsi.php">
				<select name="restoran">
					<?php 
						foreach($restoranid as $menuu_element){
							echo "<option value=\"".$menuu_element."\">".$menuu_element."</option>";
						}
					?>
				</select><br>
				<p>tund</p>
				<input class="tekstivali" id="aeg_input" type="number" name="aeg_tund" min="1" max="23"><br>
				<p>minut</p>
				<input class="tekstivali" id="aeg_input" type="number" name="aeg_minut" min="0" max="59"><br>
				<input type="submit" value="otsi">
			</form>
		</div>
	</body>
</html>