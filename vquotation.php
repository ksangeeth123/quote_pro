<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="q.png" rel="icon">
  <title>QuotePro | View Quotation</title>
  <style>
  <!-- Add any additional CSS or meta tags as needed -->
  @import url('https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i');
@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i');

<style>
      body {
        background: #fff;
        display: flex;
      flex-direction: column;
      min-height: 100vh; /* Set minimum height to 100% of viewport height */
      margin: 0; 
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

      .dashboard-cards {
        position: relative;
        padding-bottom: 50px;
        margin: 0 !important;
      }

      .dashboard-cards .card {
        background: #ffffff;
        display: inline-block;
        -webkit-perspective: 1000;
        perspective: 1000;
        z-index: 20;
        padding: 0 !important;
        margin: 5px 5px 10px 5px;
        position: relative;
        text-align: left;
        -webkit-transition: all 0.3s 0s ease-in;
        transition: all 0.3s 0s ease-in;
        z-index: 1;
        width: calc(33.33333333% - 10px);
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .dashboard-cards .card:hover {
        box-shadow: 0 15px 10px -10px rgba(31, 31, 31, 0.5);
        transition: all 0.3s ease;
      }

      .dashboard-cards .card .card-title {
        background: #ffffff;
        padding: 20px 15px;
        position: relative;
        z-index: 0;
      }

      .dashboard-cards .card .card-title h2 {
        font-size: 24px;
        letter-spacing: -0.05em;
        margin: 0;
        padding: 0;
      }

      .dashboard-cards .card .card-title h2 small {
        display: block;
        font-size: 14px;
        margin-top: 8px;
        letter-spacing: -0.025em;
      }

      .dashboard-cards .card .card-description {
        position: relative;
        font-size: 14px;
        border-top: 1px solid #ddd;
        padding: 10px 15px 0 15px;
      }

      .dashboard-cards .card .card-actions {
        box-shadow: 0 2px 0px 0 rgba(0, 0, 0, 0.075);
        padding: 10px;
        text-align: center;
      }

      .dashboard-cards .card .card-flap {
        background: #d9d9d9;
        position: absolute;
        width: 100%;
        -webkit-transform-origin: top;
        transform-origin: top;
        -webkit-transform: rotateX(-90deg);
        transform: rotateX(-90deg);
      }

      .dashboard-cards .card .flap1 {
        -webkit-transition: all 0.3s 0.3s ease-out;
        transition: all 0.3s 0.3s ease-out;
        z-index: -1;
      }

      .dashboard-cards .card .flap2 {
        -webkit-transition: all 0.3s 0s ease-out;
        transition: all 0.3s 0s ease-out;
        z-index: -2;
      }

      .dashboard-cards.showing .card {
        cursor: pointer;
        opacity: 0.6;
        -webkit-transform: scale(0.88);
        transform: scale(0.88);
      }

      .dashboard-cards .no-touch .dashboard-cards.showing .card:hover {
        opacity: 0.94;
        -webkit-transform: scale(0.92);
        transform: scale(0.92);
      }

      .dashboard-cards .card.d-card-show {
        opacity: 1 !important;
        -webkit-transform: scale(1) !important;
        transform: scale(1) !important;
      }

      .dashboard-cards .card.d-card-show .card-flap {
        background: #ffffff;
        -webkit-transform: rotateX(0deg);
        transform: rotateX(0deg);
      }

      .dashboard-cards .card.d-card-show .flap1 {
        -webkit-transition: all 0.3s 0s ease-out;
        transition: all 0.3s 0s ease-out;
      }

      .dashboard-cards .card.d-card-show .flap2 {
        -webkit-transition: all 0.3s 0.2s ease-out;
        transition: all 0.3s 0.2s ease-out;
      }

      .dashboard-cards .card .task-count {
        width: 40px;
        height: 40px;
        position: absolute;
        top: 22px;
        right: 10px;
        background: #ecf0f1;
        text-align: center;
        line-height: 40px;
        border-radius: 100%;
        color: #333333;
        font-weight: 600;
        transition: all .2s ease;
      }

      .dashboard-cards .task-list {
        padding: 0 !important;
      }

      .dashboard-cards .task-list li {
        padding: 10px 0;
        padding-left: 10px;
        margin: 3px 0;
        list-style-type: none;
        border-bottom: 1px solid #e9ebed;
        border-left: 3px solid #f36525;
        transition: all .2s ease;
      }

      .dashboard-cards .task-list li:hover {
        background: #ecf0f1;
        transition: all .2s ease;
      }

      .dashboard-cards .task-list li span {
        float: right;
        color: #f36525;
        margin-right: 5px;
      }

      .dashboard-cards.showing .card.d-card-show .task-count {
        color: #ffffff;
        background: #f36525;
        transition: all .2s ease;
      }

      .dashboard-cards .card-actions .btn {
        color: #333;
      }

      .dashboard-cards .card-actions .btn:hover {
        color: #f36525;
      }
      table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 15px;
      text-align: left;
    }

    th {
      background-color: #3498db; /* Blue background color for table header */
      color: #fff; /* White text color for table header */
    }

    tr:nth-child(even) {
      background-color: #f9f9f9; /* Alternate row background color */
    }
    .content {
      flex: 1;
      padding-bottom: 50px; /* Adjust padding-bottom to make space for the footer */
    }

    footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 10px;
      margin-top: auto;
    }

    .search-form {
      margin-top: 20px;
    }

    .search-form input[type="text"] {
      padding: 10px;
    }

    .search-form input[type="submit"] {
      padding: 10px;
      background-color: #3498db;
      color: #fff;
      cursor: pointer;
      border: none;
    }
      </style>
      </head>
      <body>
  <header class="header">
    <a href="index.php" class="logo"><h3 style="color: #fcfafa;">QuotePro</h3></a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
      <li><a href="dashboard1.php">Home</a></li>
      <li><a href="add_quote.php">Add Quotation</a></li>
      <li><a href="#careers">Reports</a></li>
      <li><a href="#contact">Backup</a></li>
    </ul>
  </header>

  <div class="content">
    <form class="search-form" method="post" action="">
      <label for="piNo">Search by PI Number:</label>
      <input type="text" name="piNo" id="piNo">
      <input type="submit" value="Search">
    </form>
    <br><br>

    <div class="dashboard-cards">
      <!-- Display Reservation Details in a Table -->
      <?php
      // Assuming you have a database connection established
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "quote";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Process search
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $piNo = $_POST["piNo"];
        $sql = "SELECT * FROM vw_reservation_details WHERE piNo LIKE '%$piNo%'";
      } else {
        // Fetch all data if no search is performed
        $sql = "SELECT * FROM vw_reservation_details";
      }

      // Fetch data from the view
      $result = $conn->query($sql);

      // Display data in a table
      if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>PI Number</th>
                <th>Date</th>
                <th>Lecture Hall</th>
                <th>No. of Days</th>
                <th>Total Price</th>
                <th>Total Morning Tea Price</th>
                <th>Total Evening Tea Price</th>
                <th>Total Breakfast Price</th>
                <th>Total Water Bottles Price</th>
                <th>Total Lunch Price</th>
                <th>Accommodation</th>
                <th>No. of Rooms</th>
                <th>No. of Nights</th>
                <th>Total Accommodation Charges</th>
                <th>Total Amount</th>
              </tr>";

        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["piNo"] . "</td>";
          echo "<td>" . $row["date"] . "</td>";
          echo "<td>" . $row["lectureHall"] . "</td>";
          echo "<td>" . $row["noOfDays"] . "</td>";
          echo "<td>" . $row["totalPrice"] . "</td>";
          echo "<td>" . $row["totalMorningTeaPrice"] . "</td>";
          echo "<td>" . $row["totalEveningTeaPrice"] . "</td>";
          echo "<td>" . $row["totalBreakfastPrice"] . "</td>";
          echo "<td>" . $row["totalWaterBottlesPrice"] . "</td>";
          echo "<td>" . $row["totalLunchPrice"] . "</td>";
          echo "<td>" . $row["accommodation"] . "</td>";
          echo "<td>" . $row["noOfRooms"] . "</td>";
          echo "<td>" . $row["noOfNights"] . "</td>";
          echo "<td>" . $row["totalAccommodationCharges"] . "</td>";
          echo "<td>" . $row["totalAmount"] . "</td>";
          echo "</tr>";
        }
        echo "</table>";
      } else {
        echo "No reservations found.";
      }

      // Close connection
      $conn->close();
      ?>
    </div>
  </div>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> QuotePro. All rights reserved.</p>
  </footer>
</body>
</html>