<?php

require_once('sql.php');
echo "Connected successfully";

$sql = "SELECT id, name, FROM user";
$result = $conn->query($sql);
#echo [$result];

#sisse logitud kasutaja andmed

$kuupaev = $_POST["kuupaev"];
$aeg = $_POST["aeg"];

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


?> 
<html>
    <head>

    </head>
    <body>
        <p><?php printf("sina: %s", $user -> fetch_object() -> name, "\n"); ?> </p>
        <p><?php printf("%s", $louna_search); ?> </p>
    </body>
</html>