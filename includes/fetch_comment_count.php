<?php
include_once('connect.php'); // Include your database connection file

// Initialize the output variable
$output = array();

try {
    // Fetch comments count from the database based on the program ID
    $stmt = $con->prepare("SELECT COUNT(*) AS comment_count FROM program_comments WHERE progID = :program_id");
    $stmt->execute([':program_id' => $_GET['programid']]); // Assuming 'programid' is passed via GET
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check if the query returned a row
    if ($row) {
        // If a row is found, retrieve the comment count and store it in the output array
        $output['comment_count'] = $row['comment_count'];
    } else {
        // If no row is found, set the comment count to 0
        $output['comment_count'] = 0;
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