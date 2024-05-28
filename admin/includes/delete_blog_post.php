<?php
// Include your database connection file
include_once('connect.php');

// Check if donation ID is provided
if(isset($_POST['postid'])) {
    // Sanitize the input to prevent SQL injection
    $postid = filter_var($_POST['postid'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare and execute SQL query to delete the donation
    $stmt = $con->prepare("DELETE FROM tbl_blog WHERE id = :post_id");
    $stmt->execute([':post_id' =>$postid]);

} else {
    // Return error message if donation ID is not provided
    echo json_encode(array('success' => false, 'message' => 'Team ID not provided.'));
}
?>