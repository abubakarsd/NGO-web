<?php
// Include your database connection file
include_once('connect.php');

// Check if donation ID is provided
if(isset($_POST['trustid'])) {
    // Sanitize the input to prevent SQL injection
    $trust_id = filter_var($_POST['trustid'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare and execute SQL query to delete the donation
    $stmt = $con->prepare("DELETE FROM tbl_partners WHERE id = :teamid");
    $stmt->execute([':teamid' =>$trust_id]);

} else {
    // Return error message if donation ID is not provided
    echo json_encode(array('success' => false, 'message' => 'Trustie ID not provided.'));
}
?>