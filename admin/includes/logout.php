<?php
// Start session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Send response as JSON
header('Content-Type: application/json');
echo json_encode(array('message' => 'Logout successful'));
?>