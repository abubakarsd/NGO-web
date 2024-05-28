<?php
include_once('connect.php'); // Include your database connection file
$output = array(); // Initialize an empty array to store page information
try {
    $sql = $con->prepare("SELECT * FROM tbl_blog WHERE id = :blogid");
    $sql->execute([':blogid' => $_POST['postid']]);
    $row = $sql->fetch(PDO::FETCH_ASSOC); // Fetch data as associative array

    // Check if the query returned a row
    if ($row) {
        // If a row is found, populate the output array with the desired data
        $output["imageUrl"] = "../images/" . $row["blog_image"];
        $output["blogheader"] = $row["blog_header"];
        $output["blogdetails"] = $row["blog_details"];
        
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