<?php
include_once('connect.php'); // Include your database connection file

// Initialize an empty array to store page information
$output = array();

try {
    // Prepare and execute SQL query to fetch team information based on the team ID
    $sql = $con->prepare("SELECT * FROM tbl_team WHERE id = :teamid");
    $sql->execute([':teamid' => $_POST['teamid']]);
    
    // Fetch data as associative array
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    // Check if data is found for the given team ID
    if ($row) {
        // Populate the output array with the fetched data
        $output["imageUrl"] = "../images/" . $row["team_image"];
        $output["team_name"] = $row["team_name"];
        $output["team_position"] = $row["team_position"];
        $output["team_fb_handle"] = $row["facebook_link"];
        $output["team_tl_handle"] = $row["x_link"];
        $output["team_in_handle"] = $row["in_link"];
    } else {
        // Set an error message if no data is found
        $output['error'] = 'No information found for the given team ID.';
    }
} catch (PDOException $e) {
    // Set an error message if there's an exception
    $output['error'] = 'Database error: ' . $e->getMessage();
}

// Set content type header to application/json
header('Content-Type: application/json');

// Convert the output array to JSON and echo it
echo json_encode($output);
?>