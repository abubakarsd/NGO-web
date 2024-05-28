<?php
// Start session
session_start();
// Include database connection file
sleep(2);
include_once('connect.php');
$success = '';
$error = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];
        // Prepare and execute SQL query to fetch user data
        $stmt = $con->prepare("SELECT * FROM tbl_admin WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $row = $stmt->fetch();

        // Check if user exists and password matches
        if ($row) {
            if (password_verify($password, $row['password'])) {
                // Set session variables
                $_SESSION['adm_id'] = $row['adm_id'];
                // Redirect to index.php upon successful login
                $success = 'Login successful';
            } else {
                $error = 'Invalid password';
            }
        } else {
            $error = 'User not found';
        }
        $response = array(
            'error' => $error,
            'success' => $success
        );
    echo json_encode($response);
}
?>