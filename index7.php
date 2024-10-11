<?php
require_once('./index.php');


$search = isset($_GET['search']) ? $_GET['search'] : '';


if ($search) {
   
    $query = "SELECT * FROM rooms WHERE roomNumber LIKE ? OR description LIKE ?";
    $stmt = $conn->prepare($query);
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
} else {

    $query = "SELECT * FROM rooms";
    $stmt = $conn->prepare($query);
}


$stmt->execute();
$result = $stmt->get_result();
?>

<body>
    <h1>Room List</h1>
    
   
    <form>
        <input type="text" name="search" placeholder="Search for rooms..." value="<?php echo htmlspecialchars($search); ?>">
        <input type="submit" value="Search">
    </form>

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

     
        $stmt->close();
        $conn->close();
        ?>
    </ol>
</body>
</html>