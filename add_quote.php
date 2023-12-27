<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="q.png" rel="icon">
  <title>QuotePro | Dashboard</title>
  <!-- Add your CSS styles or link to external stylesheets here -->
  <style>
    body {
      background: #fff;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .header {
      background: #000000;
      color: #bfbfbf;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      text-decoration: none;
      color: #fff;
      font-size: 20px;
    }

    .menu-btn {
      display: none;
    }

    .menu-icon {
      cursor: pointer;
      display: none;
      flex-direction: column;
    }

    .navicon {
      background: #fff;
      height: 3px;
      width: 25px;
      margin: 5px;
      transition: background 0.3s;
    }

    .menu {
      display: flex;
      list-style: none;
    }

    .menu li {
      margin: 0 15px;
    }

    .menu a {
      text-decoration: none;
      color: #fff;
      font-size: 16px;
    }

    .form-container {
      margin: 20px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    form {
  background: rgba(255, 255, 255, 0.2);
  border-radius: 15px;
  padding: 20px;
  backdrop-filter: blur(10px);
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="date"],
input[type="number"],
select {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  border: none;
  border-radius: 5px;
  margin-bottom: 10px;
  background: rgba(0,0,255,0.3);
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.5);
}

input[type="submit"] {
  background-color: #00ccff;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

input[type="submit"]:hover {
  background-color: #6666ff;
}

/* Optional: Style for error messages or additional form feedback */
.error-message {
  color: #ff0000;
  font-size: 14px;
  margin-top: 5px;
}

    @media (max-width: 768px) {
      .menu-btn:checked + .menu-icon .navicon {
        background: #fff;
      }

      .menu-btn:checked ~ .menu {
        display: flex;
        flex-direction: column;
        width: 100%;
        position: absolute;
        background: #333;
        top: 70px;
        left: 0;
      }

      .menu-btn:checked ~ .menu .menu li {
        text-align: center;
        margin: 0;
        padding: 15px 0;
        width: 100%;
      }

      .menu-btn:checked ~ .menu .menu a {
        font-size: 18px;
      }

      .menu-icon {
        display: flex;
      }

      .menu-btn {
        display: block;
        cursor: pointer;
        position: absolute;
        top: 10px;
        right: 20px;
        width: 40px;
        height: 40px;
        opacity: 0;
        z-index: 2;
      }
    }

    footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 10px;
      margin-top: auto;
    }
  </style>
</head>
<body>
  <header class="header">
    <a href="index.php" class="logo"><h3 style="color: #fcfafa;">QuotePro</h3></a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
      <li><a href="dashboard.php">View Prices</a></li>
      <li><a href="#careers">Reports</a></li>
      <li><a href="#contact">Backup</a></li>
    </ul>
  </header>

  <div class="form-container">
    <form method="post" action="process_form.php">
      <h2>Reservation Details</h2>

      <label for="piNo">PI No.:</label>
      <input type="text" name="piNo" required><br><br>

      <label for="date">Date:</label>
      <input type="date" name="date" required><br><br>

      <label for="lectureHall">Lecture Hall:</label>
      <select name="lectureHall" id="lectureHall" onchange="fetchHallPrice()" required><br><br>
          <?php
          // Fetch hall names from the hall_price table
          $conn = new mysqli("localhost", "root", "", "quote"); // Update with your database credentials

          $result = $conn->query("SELECT hall FROM hall_price");
          while ($row = $result->fetch_assoc()) {
              echo "<option value=\"{$row['hall']}\">{$row['hall']}</option>";
          }

          $conn->close();
          ?>
           <?php
  // Your existing database connection code
  $conn = new mysqli("localhost", "root", "", "quote");

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Set the reservation ID here (you need to replace this with the actual reservation ID)
  $reservationId = 1;  // Replace with the actual reservation ID

  // Query to get the total amount from the view
  $sql = "SELECT totalAmount FROM vw_reservation_details WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $reservationId);

  // Execute the query
  $stmt->execute();

  // Bind the result variable
  $stmt->bind_result($totalAmount);

  // Fetch the result
  $stmt->fetch();

  // Close the statement
  $stmt->close();

  // Close the database connection
  $conn->close();
  ?>
      </select><br><br>

      <label for="noOfDays">No of Days:</label>
      <input type="number" name="noOfDays" id="noOfDays" oninput="calculateTotalPrice()" required><br><br>

      <label for="totalPrice"><b>Total Price of Hall:</b></label>
      <input type="text" name="totalPrice" id="totalPrice" readonly><br><br>

      <!-- Morning Tea Price Fields -->
      <label for="morningTeaPrice">Morning Tea Price:</label>
      <input type="number" name="morningTeaPrice" id="morningTeaPrice" value="250" readonly><br><br>

      <label for="noOfHeads">No of Heads (Morning Tea):</label>
      <input type="number" name="noOfHeads" id="noOfHeads" oninput="calculateTotalMorningTeaPrice()" required><br><br>

      <label for="totalMorningTeaPrice"><b>Total Morning Tea Price:</b></label>
      <input type="text" name="totalMorningTeaPrice" id="totalMorningTeaPrice" readonly><br><br>
      <!-- End of Morning Tea Price Fields -->

      <!-- Evening Tea Price Fields -->
      <label for="eveningTeaPrice">Evening Tea Price:</label>
      <input type="number" name="eveningTeaPrice" id="eveningTeaPrice" value="200" readonly><br><br>

      <label for="noOfEveningTeaHeads">No of Heads (Evening Tea):</label>
      <input type="number" name="noOfEveningTeaHeads" id="noOfEveningTeaHeads" oninput="calculateTotalEveningTeaPrice()" required><br><br>

      <label for="totalEveningTeaPrice"><b>Total Evening Tea Price:</b></label>
      <input type="text" name="totalEveningTeaPrice" id="totalEveningTeaPrice" readonly><br><br>
      <!-- End of Evening Tea Price Fields -->

      <!-- Breakfast Price Fields -->
      <label for="breakfastPrice">Breakfast Price:</label>
      <input type="number" name="breakfastPrice" id="breakfastPrice" value="800" readonly><br><br>

      <label for="noOfBreakfastHeads">No of Heads (Breakfast):</label>
      <input type="number" name="noOfBreakfastHeads" id="noOfBreakfastHeads" oninput="calculateTotalBreakfastPrice()" required><br><br>

      <label for="totalBreakfastPrice"><b>Total Breakfast Price:</b></label>
      <input type="text" name="totalBreakfastPrice" id="totalBreakfastPrice" readonly><br><br>
      <!-- End of Breakfast Price Fields -->

      <label for="waterBottlesPrice">Water Bottles Price:</label>
      <input type="number" name="waterBottlesPrice" id="waterBottlesPrice" value="130" readonly><br><br>

      <label for="noOfWaterBottles">No of Water Bottles:</label>
      <input type="number" name="noOfWaterBottles" id="noOfWaterBottles" oninput="calculateTotalWaterBottlesPrice()" required><br><br>

      <label for="totalWaterBottlesPrice"><b>Total Water Bottles Price:</b></label>
      <input type="text" name="totalWaterBottlesPrice" id="totalWaterBottlesPrice" readonly><br><br>
      <!-- End of water bottles price fields -->
      <label for="lunchPrice">Lunch Price:</label>
      <select name="lunchPrice" id="lunchPrice" onchange="calculateTotalLunchPrice()" required>
        <option value="1400">Lunch M01</option>
        <option value="1250">Lunch M02</option>
        <option value="1100">Lunch M03</option>
      </select><br><br>

      <label for="noOfLunchDays">No of Days (Lunch):</label>
      <input type="number" name="noOfLunchDays" id="noOfLunchDays" oninput="calculateTotalLunchPrice()" required><br><br>

      <label for="noOfLunchHeads">No of Heads (Lunch):</label>
      <input type="number" name="noOfLunchHeads" id="noOfLunchHeads" oninput="calculateTotalLunchPrice()" required><br><br>

      <label for="totalLunchPrice"><b>Total Price of Lunch:</b></label>
      <input type="text" name="totalLunchPrice" id="totalLunchPrice" readonly><br><br>

      <label for="accommodation">Accommodation Charges:</label>
      <select name="accommodation" id="accommodation" onchange="calculateAccommodationCharges()" >
      <option value="N/A">N/A</option>
        <option value="4500">A/C</option>
        <option value="2000">Non A/C</option>
      </select><br><br>

      <label for="noOfRooms">No of Rooms:</label>
      <input type="number" name="noOfRooms" id="noOfRooms" oninput="calculateAccommodationCharges()" ><br><br>

      <label for="noOfNights">No of Nights:</label>
      <input type="number" name="noOfNights" id="noOfNights" oninput="calculateAccommodationCharges()" ><br><br>

      <label for="totalAccommodationCharges"><b>Total Accommodation Charges:</b></label>
      <input type="text" name="totalAccommodationCharges" id="totalAccommodationCharges" readonly><br><br>

      <label for="totalAmount"><b>Total Amount:</b></label>
      <input type="text" name="totalAmount" id="totalAmount" value="<?php echo $totalAmount; ?>" readonly><br><br>


      <input type="submit" value="Submit">
    </form>
  </div>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> QuotePro. All rights reserved.</p>
  </footer>
  <script>
    // Hall prices data (replace with your actual data from the database)
    var hallPrices = {
      'Sanbhavi Hall': 23000,
      'Sandharani Hall': 17250,
      'Sanvadani Hall': 34500,
      'Sanhinda Hall': 92000,
      'Sanhinda Hall ( 4 Hours)': 51750,
      '1-1 Hall': 46000,
      'Sansravani Hall': 46000,
      'Nomal Lecture Hall (for 40/30 participants) 3-2': 11500,
      'Sankathani Hall': 69000,
      '2-1 Lecture Hall': 46000,
      '3-3 Lecture Hall': 17250,
      'VIP Lounge Ground Flooor 4 Hours': 17250,
      'VIP Lounge Ground Flooor &amp; 1st floor 4 hours': 40250,
      'VIP Dining Room (lFloor) - 4 Hours': 23000,
      'VIP Longuge 1st Floor &amp; Roof top 4 hours': 46000,
      'Extra Hour Charges for VIP Dining Room': 2300,
      'Extra Hour Charges for Sandharani Hall': 2300,
      'Extra Hour Charges for Sansravani / 1-1/ 2-1 Hall': 5750,
      'Extra OT Payment ( Charges will apply for programs held after 4.30 pm and on holidays )': 1800,
      'Multimedia Charges': 5000,
      'Oil Lamp': 300,
      'Wireless Mick/Clipa Mick': 1500,
      'SLIDA Premises - Nigtht Time Programme (After 4.30 pm)': 29000,
      'SLIDA Premises day Time Programme': 17250,
      'Morning Tea': 250, // Morning Tea Price
      'Evening Tea': 200, // Evening Tea Price
      'Breakfast': 800 // Breakfast Price
    };

    // JavaScript code for dynamic calculation
    function fetchHallPrice() {
      // Get selected hall name
      var selectedHall = document.getElementById('lectureHall').value;

      // Set the fetched hall price to the input field
      document.getElementById('totalPrice').value = hallPrices[selectedHall] || '';
    }

    function calculateTotalPrice() {
      // Get values from the form
      var hallPrice = parseFloat(document.getElementById('totalPrice').value);
      var noOfDays = parseInt(document.getElementById('noOfDays').value);

      // Calculate total price
      var totalPrice = isNaN(hallPrice) || isNaN(noOfDays) ? '' : (hallPrice * noOfDays);

      // Update the total price input field
      document.getElementById('totalPrice').value = totalPrice;
    }

    function calculateTotalMorningTeaPrice() {
      // Get values from the form
      var morningTeaPrice = parseFloat(document.getElementById('morningTeaPrice').value);
      var noOfHeads = parseInt(document.getElementById('noOfHeads').value);
      var noOfDays = parseInt(document.getElementById('noOfDays').value);

      // Calculate total morning tea price
      var totalMorningTeaPrice = isNaN(morningTeaPrice) || isNaN(noOfHeads) || isNaN(noOfDays)
        ? ''
        : morningTeaPrice * noOfHeads * noOfDays;

      // Update the total morning tea price input field
      document.getElementById('totalMorningTeaPrice').value = totalMorningTeaPrice;
    }

    function calculateTotalEveningTeaPrice() {
      // Get values from the form
      var eveningTeaPrice = parseFloat(document.getElementById('eveningTeaPrice').value);
      var noOfEveningTeaHeads = parseInt(document.getElementById('noOfEveningTeaHeads').value);
      var noOfDays = parseInt(document.getElementById('noOfDays').value);

      // Calculate total evening tea price
      var totalEveningTeaPrice = isNaN(eveningTeaPrice) || isNaN(noOfEveningTeaHeads) || isNaN(noOfDays)
        ? ''
        : eveningTeaPrice * noOfEveningTeaHeads * noOfDays;

      // Update the total evening tea price input field
      document.getElementById('totalEveningTeaPrice').value = totalEveningTeaPrice;
    }

    function calculateTotalBreakfastPrice() {
      // Get values from the form
      var breakfastPrice = parseFloat(document.getElementById('breakfastPrice').value);
      var noOfBreakfastHeads = parseInt(document.getElementById('noOfBreakfastHeads').value);
      var noOfDays = parseInt(document.getElementById('noOfDays').value);

      // Calculate total breakfast price
      var totalBreakfastPrice = isNaN(breakfastPrice) || isNaN(noOfBreakfastHeads) || isNaN(noOfDays)
        ? ''
        : breakfastPrice * noOfBreakfastHeads * noOfDays;

      // Update the total breakfast price input field
      document.getElementById('totalBreakfastPrice').value = totalBreakfastPrice;
    }
    function calculateTotalWaterBottlesPrice() {
      // Get values from the form
      var waterBottlesPrice = parseFloat(document.getElementById('waterBottlesPrice').value);
      var noOfWaterBottles = parseInt(document.getElementById('noOfWaterBottles').value);
      var noOfDays = parseInt(document.getElementById('noOfDays').value);

      // Calculate total water bottles price
      var totalWaterBottlesPrice = isNaN(waterBottlesPrice) || isNaN(noOfWaterBottles) || isNaN(noOfDays)
        ? ''
        : waterBottlesPrice * noOfWaterBottles * noOfDays;

      // Update the total water bottles price input field
      document.getElementById('totalWaterBottlesPrice').value = totalWaterBottlesPrice;
    }
    function calculateTotalLunchPrice() {
          // Get values from the form
          var lunchPrice = parseFloat(document.getElementById('lunchPrice').value);
          var noOfLunchDays = parseInt(document.getElementById('noOfLunchDays').value);
          var noOfLunchHeads = parseInt(document.getElementById('noOfLunchHeads').value);

          // Calculate total lunch price
          var totalLunchPrice = isNaN(lunchPrice) || isNaN(noOfLunchDays) || isNaN(noOfLunchHeads)
            ? ''
            : lunchPrice * noOfLunchDays * noOfLunchHeads;

          // Update the total lunch price input field
          document.getElementById('totalLunchPrice').value = totalLunchPrice;
        }
  function calculateAccommodationCharges() {
      // Get values from the form
      var accommodationType = document.getElementById('accommodation').value;
      var noOfRooms = parseInt(document.getElementById('noOfRooms').value);
      var noOfNights = parseInt(document.getElementById('noOfNights').value);

      // Set accommodation charges based on selection
      var accommodationCharges = (accommodationType === 'A/C') ? 4500 : 2000;

      // Calculate total accommodation charges
      var totalAccommodationCharges = isNaN(noOfRooms) || isNaN(noOfNights) ? '' : (accommodationCharges * noOfRooms * noOfNights);

      // Update the total accommodation charges input field
      document.getElementById('totalAccommodationCharges').value = totalAccommodationCharges;
    }
    
   
      </script>
</body>
</html>
