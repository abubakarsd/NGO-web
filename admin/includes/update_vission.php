<?php
include_once('connect.php'); // Include your database connection file
$msg = '';
$error = '';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vission_id = $_POST['vission_id'];
    $vission_text = $_POST['vission_text'];

    // Prepare and execute SQL query to update donation information
    $stmt = $con->prepare("UPDATE tbl_page_info SET vission = :vission_text WHERE id = :vission_id");

    // execute query with bind parameters
    $stmt->execute(
        array(
            ':vission_id' => $vission_id,
            ':vission_text' => $vission_text
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