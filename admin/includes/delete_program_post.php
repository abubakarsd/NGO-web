<?php
// Include your database connection file
include_once('connect.php');

// Check if donation ID is provided
if(isset($_POST['programid'])) {
    // Sanitize the input to prevent SQL injection
    $program_id = filter_var($_POST['programid'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare and execute SQL query to delete the donation
    $stmt = $con->prepare("DELETE FROM tbl_program WHERE id = :programid");
    $stmt->execute([':programid' =>$program_id]);

    // Check if the query was successful
    if ($stmt) {
        // Return success message
        echo json_encode(array('success' => true, 'message' => 'Program deleted successfully.'));
    } else {
        // Return error message
        echo json_encode(array('success' => false, 'message' => 'Error deleting donation.'));
    }
} else {
    // Return error message if donation ID is not provided
    echo json_encode(array('success' => false, 'message' => 'Program ID not provided.'));
}
?>