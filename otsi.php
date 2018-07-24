<?php

require_once('sql.php');
echo "Connected successfully";

$sql = "SELECT id, name, FROM user";
$result = $conn->query($sql);
#echo [$result];

#sisse logitud kasutaja andmed
$user = $conn->query("SELECT name FROM user WHERE id=1");
$time = "2018-07-24 13:00:00";
#while($obj = $user -> fetch_object()){
#    printf("\n sinu nimi: %s\n",$obj -> name);
#    printf("%s",$obj -> time);
#}
#echo [$user];
printf("%s%s", $user -> fetch_object() -> name, "\n");
$lounad = $conn -> query("SELECT * FROM lunch");
if($lounad == false){
    printf("lounaid ei ole %s", "\n");
}
else{
    printf("%s", $lounad -> fetch_object() -> user_id_1);
}
?> 