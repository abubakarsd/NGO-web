<?php
include_once('connect.php'); // Include your database connection file
$output = array(); // Initialize an empty array to store donation data

try {
    $sql = "SELECT * FROM urgent_donation WHERE id = :course_id";
    $stmt = $con->prepare($sql);
    $stmt->execute([':course_id' => $_POST['cursusid']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch data as associative array

    // Check if the query returned a row
    if ($row) {
        // If a row is found, populate the output array with the desired data
        $output["cid"] = $row["id"];
        $output["cname"] = $row["donation_title"];
    } else {
        // If no row is found, set an error message in the output array
        $output['error'] = 'No donation found with the provided ID.';
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