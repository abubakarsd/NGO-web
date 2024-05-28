<?php
// Include your database connection file
include_once('connect.php');

// Check if donation ID is provided
if(isset($_POST['slideid'])) {
    // Sanitize the input to prevent SQL injection
    $slide_id = filter_var($_POST['slideid'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare and execute SQL query to delete the donation
    $stmt = $con->prepare("DELETE FROM carousel_item WHERE id = :slideid");
    $stmt->execute([':slideid' =>$slide_id]);

} else {
    // Return error message if donation ID is not provided
    echo json_encode(array('success' => false, 'message' => 'Donation ID not provided.'));
}
?>