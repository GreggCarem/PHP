<?php

$jsonData = file_get_contents('rooms.json');

$rooms = json_decode($jsonData, true);


$roomId = isset($_GET['id']) ? (int)$_GET['id'] : null;


$foundRoom = null;
foreach ($rooms as $room) {
    if ($room['ID'] === $roomId) {
        $foundRoom = $room;
        break; 
    }
}

if ($foundRoom) {
    echo "Name: " . $foundRoom['Name'] . "<br>";
    echo "Number: " . $foundRoom['Number'] . "<br>";
    echo "Price: $" . $foundRoom['Price'] . "<br>";
    echo "Discount: " . $foundRoom['Discount'] . "%<br>";
} else {
    echo "Room not found.";
}
?>