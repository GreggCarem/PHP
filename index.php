<?php

$servername = 'localhost'; 
$username = 'root';        
$password = '2734363410';
$dbname = 'hotel_api_db';  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>