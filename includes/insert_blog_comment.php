<?php
$msg = '';
$error = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include_once('connect.php');
    
    // Get the program ID from the POST data
    $programid = $_POST['programid'];
    
    // Get other form data
    $commentor_name = $_POST['fullname'];
    $commentor_email = $_POST['email'];
    $commentor_post = $_POST['commentor_post'];
    $reply_post = $_POST['post_id'];
    // Add more fields as needed
    
    // Prepare and execute the SQL query to insert the comment
    try {
        $sql = "INSERT INTO blog_comments (reply_id, blog_id, commentor_name, commentor_email, commentor_post) 
                VALUES (:replyid, :progID, :commentor_name, :commentor_email, :commentor_post)";
        $stmt = $con->prepare($sql);
        $stmt->execute(array(
            ':replyid' => $reply_post,
            ':progID' => $programid,
            ':commentor_name' => $commentor_name,
            ':commentor_email' => $commentor_email,
            ':commentor_post' => $commentor_post
            // Bind more parameters as needed
        ));
        
        // Check if the comment was inserted successfully
        if ($stmt->rowCount() > 0) {
            // Return a success message or any other response if needed
            $msg = "Comment inserted successfully!";
        } else {
            // Return an error message if the comment was not inserted
            $error = "Failed to insert comment!";
        }
    } catch (PDOException $e) {
        // Handle database errors
        $error = "Database error: " . $e->getMessage();
    }
} else {
    // If the form is not submitted via POST method, return an error message
    $error = "Form submission method not allowed!";
}

// Prepare the output array
$output = array(
    'msg' => $msg,
    'error' => $error
);

// Convert the output array to JSON and echo it
echo json_encode($output);
?>