<?php

require_once('sql.php');

$kasutaja_id = 1;


$sql = "SELECT id, name, FROM user";
$result = $conn->query($sql);
#echo [$result];

#sisse logitud kasutaja andmed

$restoran = $_GET["restoran"];
$hour = $_GET["aeg_tund"];
$minute = $_GET["aeg_minut"];

$date = new DateTime();
$date = $date->setTime($hour, $minute);
$date = $date->modify('+1 day');


#echo $_GET["aeg"];
echo $date->format('d M H:i');
echo " ".$date->format("Y-m-d H:i:s");
if(! $conn -> query("INSERT INTO `lunch` (`id`, `lunch_time`, `user_id_1`, `user_id_2`, `location`) VALUES (NULL, '" . $date->format("Y-m-d H:i:s") . "'  , '1', NULL, '" . $restoran . "')")){
    echo "query fail";
}


?> 
<html>
    <head>

    </head>
    <body>
<!--        <p><?php printf("sina: %s", $user -> fetch_object() -> name, "\n"); ?> </p>
        <p><?php printf("%s", $louna_search); ?> </p>-->
    </body>
</html>