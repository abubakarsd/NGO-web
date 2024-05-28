<?php
include_once('connect.php'); // Include your database connection file
$output = array(); // Initialize an empty array to store donation data

try {
    $stmt = $con->prepare("SELECT id, page_img, page_discription FROM climate_change");
    $stmt->execute();
    $rows = $stmt->fetchAll(); // Fetch data as associative array

    // Check if any rows are returned
    if ($rows) {
        // Loop through each row
        foreach ($rows as $row) {
            // Store individual row data in the output array
            $output[] = array(
                "id" => $row["id"],
                "pageimg" => $row["page_img"],
                "pagediscription" => $row["page_discription"]
            );
        }
    } else {
        // If no rows are found, set an error message in the output array
        $output['error'] = 'No blog information';
    }
} catch (PDOException $e) {
    // If there's an error, set success to false and include the error message
    $output['error'] = $e->getMessage();
}

// Set content type header to application/json
header('Content-Type: application/json');

// Convert the output array to JSON and echo it
echo json_encode($output);
?>
