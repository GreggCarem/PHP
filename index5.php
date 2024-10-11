<?php
require_once('./index.php');
$query = "SELECT * FROM rooms";
$result = $conn->query($query);
?>

<body>
    <h1>Room List</h1>
    <ol>
        <?php
     
        if ($result && $result->num_rows > 0) {
            foreach ($result as $room) {
                echo "<li>";
                echo "Room Number: " . htmlspecialchars($room['roomNumber']) . "<br>";
                echo "Bed Type: " . htmlspecialchars($room['bedType']) . "<br>";
                echo "Facilities: " . htmlspecialchars($room['facilities']) . "<br>";
                echo "Rate: $" . htmlspecialchars($room['rate']) . "<br>";
                echo "Offer Price: $" . htmlspecialchars($room['offerPrice']) . "<br>";
                echo "Status: " . htmlspecialchars($room['status']) . "<br>";
                echo "Description: " . htmlspecialchars($room['description']) . "<br>";
                echo "<img src='" . htmlspecialchars($room['photo']) . "' alt='Room Image' style='width:200px; height:auto;'><br>";
                echo "</li>";
            }
        } else {
            echo "<li>No rooms found.</li>";
        }

      
        $conn->close();
        ?>
    </ol>
</body>
</html>