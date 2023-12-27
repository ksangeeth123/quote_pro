<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $piNo = $_POST['piNo'];
    $date = $_POST['date'];
    $lectureHall = $_POST['lectureHall'];
    $noOfDays = $_POST['noOfDays'];
    $totalPrice = $_POST['totalPrice'];
    $morningTeaPrice = $_POST['morningTeaPrice'];
    $noOfHeadsMorningTea = $_POST['noOfHeads']; // Updated this line
    $totalMorningTeaPrice = $_POST['totalMorningTeaPrice'];
    $eveningTeaPrice = $_POST['eveningTeaPrice'];
    $noOfEveningTeaHeads = $_POST['noOfEveningTeaHeads'];
    $totalEveningTeaPrice = $_POST['totalEveningTeaPrice'];
    $breakfastPrice = $_POST['breakfastPrice'];
    $noOfBreakfastHeads = $_POST['noOfBreakfastHeads'];
    $totalBreakfastPrice = $_POST['totalBreakfastPrice'];
    $waterBottlesPrice = $_POST['waterBottlesPrice'];
    $noOfWaterBottles = $_POST['noOfWaterBottles'];
    $totalWaterBottlesPrice = $_POST['totalWaterBottlesPrice'];
    $lunchPrice = $_POST['lunchPrice'];
    $noOfLunchDays = $_POST['noOfLunchDays'];
    $noOfLunchHeads = $_POST['noOfLunchHeads'];
    $totalLunchPrice = $_POST['totalLunchPrice'];
    $accommodation = $_POST['accommodation'];
    $noOfRooms = $_POST['noOfRooms'];
    $noOfNights = $_POST['noOfNights'];
    $totalAccommodationCharges = $_POST['totalAccommodationCharges'];
    $totalAmount = $_POST['totalAmount'];

    // Your database connection code
    $conn = new mysqli("localhost", "root", "", "quote");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Your SQL insert statement
    $sql = "INSERT INTO reservations (piNo, date, lectureHall, noOfDays, totalPrice, morningTeaPrice, noOfHeadsMorningTea, totalMorningTeaPrice, eveningTeaPrice, noOfEveningTeaHeads, totalEveningTeaPrice, breakfastPrice, noOfBreakfastHeads, totalBreakfastPrice, waterBottlesPrice, noOfWaterBottles, totalWaterBottlesPrice, lunchPrice, noOfLunchDays, noOfLunchHeads, totalLunchPrice, accommodation, noOfRooms, noOfNights, totalAccommodationCharges, totalAmount) VALUES ('$piNo', '$date', '$lectureHall', '$noOfDays', '$totalPrice', '$morningTeaPrice', '$noOfHeadsMorningTea', '$totalMorningTeaPrice', '$eveningTeaPrice', '$noOfEveningTeaHeads', '$totalEveningTeaPrice', '$breakfastPrice', '$noOfBreakfastHeads', '$totalBreakfastPrice', '$waterBottlesPrice', '$noOfWaterBottles', '$totalWaterBottlesPrice', '$lunchPrice', '$noOfLunchDays', '$noOfLunchHeads', '$totalLunchPrice', '$accommodation', '$noOfRooms', '$noOfNights', '$totalAccommodationCharges', '$totalAmount')";

    if ($conn->query($sql) === TRUE) {
        header("Location: success.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
