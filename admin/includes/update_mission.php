<?php
include_once('connect.php'); // Include your database connection file
$msg = '';
$error = '';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mission_id = $_POST['mission_id'];
    $mission_text = $_POST['mission_text'];

    // Prepare and execute SQL query to update donation information
    $stmt = $con->prepare("UPDATE tbl_page_info SET mission = :mission_text WHERE id = :mission_id");

    // execute query with bind parameters
    $stmt->execute(
        array(
            ':mission_id' => $mission_id,
            ':mission_text' => $mission_text
        )
    );

    // Check if the query was successful
    if ($stmt) {
        $msg = "Page information updated successfully.";
    } else {
        $error = "Error updating page information.";
    }

    // Return the response as JSON
    echo json_encode(array('msg' => $msg, 'error' => $error));
}
?>