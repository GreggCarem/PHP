<?php
require_once('BladeOne.php'); 

use eftec\bladeone\BladeOne;


$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';


$blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);


require_once('./index.php'); 
require_once('./room.php'); 


$roomArray = Room::loadFromDatabase();


echo $blade->run("rooms", ["rooms" => $roomArray]);
?>