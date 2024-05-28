<?php
include_once('connect.php'); // Include your database connection file
$output = array(); // Initialize an empty array to store page information

try {
    $sql = "SELECT COUNT(*) AS total_Initiative
    FROM tbl_program
    WHERE MONTH(prog_date) = MONTH(CURRENT_DATE())
    AND YEAR(prog_date) = YEAR(CURRENT_DATE())";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(); // Fetch data as associative array
    // Check if the query returned a row
    if ($row) {
        // If a row is found, populate the output array with the desired data
        $output["totalInitiative"] = $row["total_Initiative"];
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