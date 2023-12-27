<?php
$conn = new mysqli("localhost", "root", "", "quote");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$reservationId = $_GET['id']; // Get reservation ID from the AJAX request

$sql = "SELECT totalAmount FROM vw_reservation_details WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $reservationId);

$stmt->execute();
$stmt->bind_result($totalAmount);
$stmt->fetch();

$stmt->close();
$conn->close();

// Return total amount as JSON
echo json_encode(['totalAmount' => $totalAmount]);
?>
