<?php
// Include your database connection file
include_once('connect.php');

// Check if donation ID is provided
if(isset($_POST['teamid'])) {
    // Sanitize the input to prevent SQL injection
    $team_id = filter_var($_POST['teamid'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare and execute SQL query to delete the donation
    $stmt = $con->prepare("DELETE FROM tbl_team WHERE id = :teamid");
    $stmt->execute([':teamid' =>$team_id]);

} else {
    // Return error message if donation ID is not provided
    echo json_encode(array('success' => false, 'message' => 'Team ID not provided.'));
}
?>