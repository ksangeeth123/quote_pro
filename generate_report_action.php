<?php
require('fpdf.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quote";

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Process search
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $piNo = $_POST["piNo"];
        $sql = "SELECT * FROM vw_reservation_details WHERE piNo LIKE '%$piNo%'";

        // Check if the query was successful
        $result = $conn->query($sql);
        if (!$result) {
            throw new Exception("Query failed: " . $conn->error);
        }

        // Create PDF document
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        // Define column headings
        $columnHeadings = array(
            'ID', 'PI Number', 'Date', 'Lecture Hall', 'No. of Days', 'Total Price',
            'Morning Tea Price', 'No. of Heads (Morning Tea)', 'Total Morning Tea Price',
            'Evening Tea Price', 'No. of Heads (Evening Tea)', 'Total Evening Tea Price',
            'Breakfast Price', 'No. of Heads (Breakfast)', 'Total Breakfast Price',
            'Water Bottles Price', 'No. of Water Bottles', 'Total Water Bottles Price',
            'Lunch Price', 'No. of Days (Lunch)', 'No. of Heads (Lunch)', 'Total Lunch Price',
            'Accommodation', 'No. of Rooms', 'No. of Nights', 'Total Accommodation Charges',
            'Total Amount'
        );

        // Output column headings
        foreach ($columnHeadings as $heading) {
            $pdf->Cell(35, 10, $heading, 1);
        }
        $pdf->Ln();

        // Loop through each row of data
        while ($row = $result->fetch_assoc()) {
            // Loop through each column and add cell
            foreach ($row as $value) {
                $pdf->Cell(35, 10, $value, 1);
            }
            $pdf->Ln();
        }

        // Save PDF file or output to browser
        $filename = "report_" . date('YmdHis') . ".pdf";
        $pdf->Output($filename, 'D');

        // Optionally, you can display a success message or redirect to another page.
        echo "Report generated successfully. <a href='$filename' target='_blank'>Download PDF</a>";
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    // Close connection
    if (isset($conn)) {
        $conn->close();
    }
}
?>
