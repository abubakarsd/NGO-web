<?php
include_once('connect.php'); // Include your database connection file
$output = array(); // Initialize an empty array to store page information

try {
    $sql = "SELECT SUM(amount) AS total_amount, COUNT(*) AS total_donators
    FROM tbl_donation
    WHERE MONTH(donate_date) = MONTH(CURRENT_DATE())
    AND YEAR(donate_date) = YEAR(CURRENT_DATE())";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(); // Fetch data as associative array
    // Check if the query returned a row
    if ($row) {
        // If a row is found, populate the output array with the desired data
        $output["totaldonation"] = "₦" . number_format($row["total_amount"], 2);
        $output["totaldonators"] = $row["total_donators"];
    } else {
        // If no row is found, set an error message in the output array
        $output['error'] = 'No Information found';
    }
} catch (PDOException $e) {
    // If there's an error, set an error message in the output array
    $output['error'] = $e->getMessage();
}

// Set content type header to application/json
header('Content-Type: application/json');

// Convert the output array to JSON and echo it
echo json_encode($output);
?>