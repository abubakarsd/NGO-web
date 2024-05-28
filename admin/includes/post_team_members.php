<?php
include_once('connect.php'); // Include your database connection file
$msg = '';
$error = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $team_name = $_POST["team_name"];
    $team_position = $_POST["team_position"];
    $team_fb_handle = $_POST["team_fb_handle"];
    $team_tl_handle = $_POST["team_tl_handle"];
    $team_in_handle = $_POST["team_in_handle"];
    $target_file = ''; 

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
        $stmt = $con->prepare("INSERT INTO tbl_team (team_image, team_name, team_position, facebook_link, x_link,in_link) 
        VALUES (:teamimg, :team_name, :team_position, :team_fb_handle, :team_tl_handle, :team_in_handle)");

        // execute query with bind parameters
        $stmt->execute(
            array(
                ':teamimg' => $target_file,
                ':team_name' => $team_name,
                ':team_position' => $team_position,
                ':team_fb_handle' => $team_fb_handle,
                ':team_tl_handle' => $team_tl_handle,
                ':team_in_handle' => $team_in_handle
            )
        );

        // Check if the query was successful
        if ($stmt) {
            $msg = "Team member uploaded successfully.";
        } else {
            $error = "Error uploading information.";
        }
    }

    // Return the response as JSON
    echo json_encode(array('msg' => $msg, 'error' => $error));
}
?>