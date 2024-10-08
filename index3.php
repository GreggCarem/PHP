<?php

$jsonData = file_get_contents('rooms.json');


$rooms = json_decode($jsonData, true);


echo "<ol>";
foreach ($rooms as $room) {
    echo "<li>";
    echo "Name: " . $room['Name'] . ", ";
    echo "Number: " . $room['Number'] . ", ";
    echo "Price: $" . $room['Price'] . ", ";
    echo "Discount: " . $room['Discount'] . "%";
    echo "</li>";
}
echo "</ol>";
?>