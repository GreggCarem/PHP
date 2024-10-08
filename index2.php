<?php

$jsonData = file_get_contents('rooms.json');


$rooms = json_decode($jsonData, true);


echo "<pre>";
print_r($rooms);
echo "</pre>";
?>