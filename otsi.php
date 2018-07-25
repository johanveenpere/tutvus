<?php

require_once('sql.php');

$kasutaja_id = 1;


$sql = "SELECT id, name, FROM user";
$result = $conn->query($sql);
#echo [$result];

#sisse logitud kasutaja andmed

$restoran = $_GET["restoran"];
$aeg = $_GET["aeg"];

#$conn -> query("INSERT INTO lunch ('id', 'lunch_time', 'user_id_1', 'user_id_2', 'location') VALUES (NULL, '12:00:00','".$kasutaja_id."', NULL, '".$restoran."'" );
$conn -> query("INSERT INTO `lunch` (`id`, `lunch_time`, `user_id_1`, `user_id_2`, `location`) VALUES (NULL, '2018-07-26 " . $aeg . "', '1', NULL, '" . $restoran . "')");
/*
$user = $conn->query("SELECT name FROM user WHERE id=1");
$time = "2018-07-24 13:00:00";
#while($obj = $user -> fetch_object()){
#    printf("\n sinu nimi: %s\n",$obj -> name);
#    printf("%s",$obj -> time);
#}
#echo [$user];
$lounad = $conn -> query("SELECT * FROM lunch");
while($louna = $lounad -> fetch_object()){
if($lounad == false){
    $louna_search = "lounaid ei ole";
}
else{
    $louna_search = "kellega matchiti: " . $louna ->  user_id_1 . " louna aeg: " . $louna -> lunch_time;
}

if($time == $louna -> lunch_time){
    echo "aeg sama";
}
}
*/


?> 
<html>
    <head>

    </head>
    <body>
<!--        <p><?php printf("sina: %s", $user -> fetch_object() -> name, "\n"); ?> </p>
        <p><?php printf("%s", $louna_search); ?> </p>-->
    </body>
</html>