<?php
include_once('connect.php'); // Include your database connection file
$msg = '';
$error = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $slid_title = $_POST['slid_title'];
    $sub_title = $_POST['sub_title'];
    $target_file = ''; // Initialize $target_file as an empty string

    // File upload handling
    if (!empty($_FILES["file"]["name"])) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));

        // Check file size
        if ($_FILES["file"]["size"] > 5000000) { // 5MB limit
            $error = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $error = "Sorry, your file was not uploaded.";
        } else {
            // Get just the file name without the directory path
            $target_file = basename($_FILES["file"]["name"]);

            if (move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/" . $target_file)) {
                $msg = "The file " . $target_file . " has been uploaded.";
            } else {
                $error = "Sorry, there was an error uploading your file.";
                $target_file = ''; // Reset $target_file in case of upload error
            }
        }
    }

    // Proceed only if there's no upload error
    if (empty($error)) {
        // Prepare and execute SQL query to update donation information
        $stmt = $con->prepare("INSERT INTO carousel_item (img, header_text, sub_header_text) 
                                VALUES (:slidimg, :slid_title, :sub_title)");

        // Execute query with bind parameters
        $stmt->execute(
            array(
                ':slidimg' => $target_file,
                ':slid_title' => $slid_title,
                ':sub_title' => $sub_title
            )
        );

        // Check if the query was successful
        if ($stmt) {
            $msg = "Slid uploaded successfully.";
        } else {
            $error = "Error uploading information.";
        }
    }

    // Return the response as JSON
    echo json_encode(array('msg' => $msg, 'error' => $error));
}
?>