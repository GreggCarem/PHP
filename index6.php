<!-- http://localhost:8000/index6.php?id=2 -->

<?php
require_once('./index.php'); 


$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;


$sql = "SELECT * FROM rooms WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();


if ($result && $result->num_rows > 0) {
    $room = $result->fetch_assoc();
} else {
    $room = null; 
}


$stmt->close();
$conn->close();
?>


<body>
    <h1>Room Details</h1>

    <?php if ($room): ?>
        <h2>Room Number: <?php echo htmlspecialchars($room['roomNumber']); ?></h2>
        <p>Bed Type: <?php echo htmlspecialchars($room['bedType']); ?></p>
        <p>Facilities: <?php echo htmlspecialchars($room['facilities']); ?></p>
        <p>Rate: $<?php echo htmlspecialchars($room['rate']); ?></p>
        <p>Offer Price: $<?php echo htmlspecialchars($room['offerPrice']); ?></p>
        <p>Status: <?php echo htmlspecialchars($room['status']); ?></p>
        <p>Description: <?php echo htmlspecialchars($room['description']); ?></p>
        <img src="<?php echo htmlspecialchars($room['photo']); ?>" alt="Room Image" style="width:200px; height:auto;">
    <?php else: ?>
        <p>No room found with the specified ID.</p>
    <?php endif; ?>
</body>
</html>