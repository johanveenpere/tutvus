<?php
    function getLocationName($connection, $lunch){
        return $connection -> query("SELECT lunch_location_name FROM lunch_locations WHERE lunch_location_id =". $lunch -> lunch_location) -> fetch_object() -> lunch_location_name;
    }

    function getCurrentNumberOfParticipants($connection, $lunch){
        $participants = $connection -> query("SELECT * FROM lunch_participants WHERE lunch_id=".$lunch -> lunch_id);
        return mysqli_num_rows($participants);
    }

    function getLunchTime($lunch){
        $returnstring = "";
        $startdate = date_create($lunch -> lunch_starting_date);
        $endtime = date_create($lunch -> lunch_end_date);
        $returnstring = $returnstring . $startdate -> format("d M");
        $returnstring = $returnstring . " " . $startdate -> format("H:i") . " - " . $endtime -> format("H:i");
        return $returnstring;
    }
?>
