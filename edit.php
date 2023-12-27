<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quote";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if the form is submitted

  // For Meals table
  if (isset($_POST["edit_meal"])) {
    $meal_id = $_POST["meal_id"];
    $new_cost = $_POST["new_cost"];

    $update_meal_sql = "UPDATE meals SET cost='$new_cost' WHERE id='$meal_id'";
    if ($conn->query($update_meal_sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
  }

  // For Hall Price table
  if (isset($_POST["edit_hall_price"])) {
    $hall_id = $_POST["hall_id"];
    $new_price = $_POST["new_price"];

    $update_hall_price_sql = "UPDATE hall_price SET price='$new_price' WHERE id='$hall_id'";
    if ($conn->query($update_hall_price_sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
  }
}

$conn->close();
?>
