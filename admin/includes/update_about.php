<?php
include_once('connect.php'); // Include your database connection file
$msg = '';
$error = '';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $about_id = $_POST['about_id'];
    $about_text = $_POST['about_text'];

    // Prepare and execute SQL query to update donation information
    $stmt = $con->prepare("UPDATE tbl_page_info SET page_info = :about_text WHERE id = :about_id");

    // execute query with bind parameters
    $stmt->execute(
        array(
            ':about_id' => $about_id,
            ':about_text' => $about_text
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