<?php
require_once('./index.php'); 


$roomNumber = '';
$bedType = '';
$facilities = '';
$rate = '';
$offerPrice = '';
$status = '';
$description = '';
$photo = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $roomNumber = $_POST['roomNumber'];
    $bedType = $_POST['bedType'];
    $facilities = $_POST['facilities'];

    $rate = preg_replace('/[^\d.]/', '', $_POST['rate']);
    $offerPrice = preg_replace('/[^\d.]/', '', $_POST['offerPrice']);
    
    $status = $_POST['status'];
    $description = $_POST['description'];
    $photo = $_POST['photo'];

    
    $sql = "INSERT INTO rooms (roomNumber, bedType, facilities, rate, offerPrice, status, description, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $roomNumber, $bedType, $facilities, $rate, $offerPrice, $status, $description, $photo);
    
    
    if ($stmt->execute()) {
        
        $newRoomId = $stmt->insert_id; 
        $stmt->close(); 

      
        header("Location: index5.php");
        exit(); 
    } else {
        echo "Error: " . $stmt->error; 
    }
}
?>

<body>
    <h1>Create a New Room</h1>
    
    
    <form method="POST">
        <label for="roomNumber">Room Number:</label>
        <input type="text" name="roomNumber" required value="<?= htmlspecialchars($roomNumber); ?>"><br>
        
        <label for="bedType">Bed Type:</label>
        <input type="text" name="bedType" required value="<?= htmlspecialchars($bedType); ?>"><br>
        
        <label for="facilities">Facilities:</label>
        <input type="text" name="facilities" required value="<?= htmlspecialchars($facilities); ?>"><br>
        
        <label for="rate">Rate (numeric value):</label>
        <input type="text" name="rate" required value="<?= htmlspecialchars($rate); ?>"><br>
        
        <label for="offerPrice">Offer Price (numeric value):</label>
        <input type="text" name="offerPrice" required value="<?= htmlspecialchars($offerPrice); ?>"><br>
        
        <label for="status">Status:</label>
        <input type="text" name="status" required value="<?= htmlspecialchars($status); ?>"><br>
        
        <label for="description">Description:</label>
        <textarea name="description" required><?= htmlspecialchars($description); ?></textarea><br>
        
        <label for="photo">Photo URL:</label>
        <input type="text" name="photo" required value="<?= htmlspecialchars($photo); ?>"><br>
        
        <input type="submit" value="Create Room">
    </form>
</body>