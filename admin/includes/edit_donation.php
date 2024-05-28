<?php
include_once('connect.php'); // Include your database connection file
$output = array(); // Initialize an empty array to store page information
try {
    $sql = $con->prepare("SELECT * FROM urgent_donation WHERE id = :donationid");
    $sql->execute([':donationid' => $_POST['donationid']]);
    $row = $sql->fetch(PDO::FETCH_ASSOC); // Fetch data as associative array

    // Check if the query returned a row
    if ($row) {
        // If a row is found, populate the output array with the desired data
        $output["dontitle"] = $row["donation_title"];
        $output["dateneed"] = $row["date_need"];
        $output["location"] = $row["location"];
        $output["Goalamount"] = $row["Goal_amount"];
        $output["discription"] = $row["donation_discription"];
        $output["statusid"] = $row["status"];
        
    } else {
        // If no row is found, set an error message in the output array
        $output['error'] = 'No Information found';
    }
} catch (PDOException $e) {
    // If there's an error, set an error message in the output array
    $output['error'] = $e->getMessage();
}

// Set content type header to application/json
header('Content-Type: application/json');

// Convert the output array to JSON and echo it
echo json_encode($output);
?>