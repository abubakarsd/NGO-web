<?php
include_once('connect.php'); // Include your database connection file
$msg = '';
$error = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donation_title = $_POST['donation_title'];
    $donation_date = $_POST['donation_date'];
    $donation_location = $_POST['donation_location'];
    $target_amount = $_POST['target_amount'];
    $active_status = $_POST['active_status'];
    $donation_description = $_POST['donation_description']; // Rich text editor content
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

    // Prepare and execute SQL query to update donation information
    $stmt = $con->prepare("INSERT INTO 
                        urgent_donation (donation_img, donation_title, date_need, location, donation_discription, Goal_amount, status) 
                            VALUES (:donation_img, :donation_title, :donation_date, :donation_location, :donation_description, :target_amount, :status)");

    // execute query with bind parameters
    $stmt->execute(
        array(
            ':donation_img' => $target_file,
            ':donation_title' => $donation_title,
            ':donation_date' => $donation_date,
            ':donation_location' => $donation_location,
            ':donation_description' => $donation_description,
            ':target_amount' => $target_amount,
            ':status' => 1
        )
    );

    // Check if the query was successful
    if ($stmt) {
        $msg = "Donation information uploaded successfully.";
    } else {
        $error = "Error updating donation information.";
    }
    }

    // Return the response as JSON
    echo json_encode(array('msg' => $msg, 'error' => $error));
}
?>