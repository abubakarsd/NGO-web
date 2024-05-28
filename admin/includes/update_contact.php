<?php
include_once('connect.php'); // Include your database connection file
$msg = '';
$error = '';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paged_id = $_POST['paged_id'];
    $phonenumber = $_POST['phonenumber'];
    $emailaddress = $_POST['emailaddress'];
    $officeaddress = $_POST['officeaddress'];
    $mediafacebook = $_POST['mediafacebook'];
    $mediatwiter = $_POST['mediatwiter'];
    $mediaig = $_POST['mediaig']; 

    // Prepare and execute SQL query to update donation information
    $stmt = $con->prepare("UPDATE tbl_page_info SET phone_number = :phonenumber, page_email = :emailaddress, page_address = :officeaddress, media_facebook = :mediafacebook, media_twiter = :mediatwiter, media_ig = :mediaig WHERE id = :paged_id");

    // execute query with bind parameters
    $stmt->execute(
        array(
            ':paged_id' => $paged_id,
            ':phonenumber' => $phonenumber,
            ':emailaddress' => $emailaddress,
            ':officeaddress' => $officeaddress,
            ':mediafacebook' => $mediafacebook,
            ':mediatwiter' => $mediatwiter,
            ':mediaig' => $mediaig
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