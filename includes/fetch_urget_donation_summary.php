<?php
include_once('connect.php'); // Include your database connection file
$output = array(); // Initialize an empty array to store donation data

try {
    $sql = "SELECT * FROM urgent_donation WHERE id = :danationid";
    $stmt = $con->prepare($sql);
    $stmt->execute([':danationid' => $_GET['danationid']]); // Use $_GET for GET request
    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch data as associative array

    // Check if the query returned a row
    if ($row) {
        // Calculate the percentage raised towards the goal
        $percentage = min(($row['raised_amount'] / $row['Goal_amount']) * 100, 100);

        $dateNeed = new DateTime($row['date_need']);
        $currentDate = new DateTime();
        $interval = $currentDate->diff($dateNeed);
        $daysLeft = $interval->days;
        // If a row is found, populate the output array with the desired data
        $output["cid"] = $row["id"];
        $output["donationImage"] = $row["donation_img"];
        $output["donationTitle"] = $row["donation_title"];
        $output["donation_discription"] = $row["donation_discription"];
        $output["raised_amount"] = $row["raised_amount"];
        $output["Goal_amount"] = $row["Goal_amount"];
        $output["location"] = $row["location"];
        $output["daysLeft"] = $daysLeft;
        $output["percentage"] = '<div class="progressbar" data-animate="false"><div class="circle" data-percent="'.$percentage.'" data-size="110" data-thickness="20"><div></div></div></div>';
    } else {
        // If no row is found, set an error message in the output array
        $output['error'] = 'No donation found with the provided ID.';
    }
} catch (PDOException $e) {
    // If there's an error, set success to false and include the error message
    $output['error'] = $e->getMessage();
}

// Set content type header to application/json
header('Content-Type: application/json');

// Convert the output array to JSON and echo it
echo json_encode($output);
?>