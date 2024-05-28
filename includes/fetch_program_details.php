<?php
include_once('connect.php'); // Include your database connection file
$output = array(); // Initialize an empty array to store donation data

try {
    $sql = "SELECT * FROM tbl_program WHERE id = :programid";
    $stmt = $con->prepare($sql);
    $stmt->execute([':programid' => $_GET['programid']]); // Use $_GET for GET request
    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch data as associative array

    // Check if the query returned a row
    if ($row) {

        $dateNeed = new DateTime($row['prog_date']);
        $currentDate = new DateTime();
        $interval = $currentDate->diff($dateNeed);
        $daysLeft = $interval->days;

        // If a row is found, populate the output array with the desired data
        $output["cid"] = $row["id"];
        $output["programimg"] = $row["program_img"];
        $output["programhead"] = $row["program_head"];
        $output["programdiscript"] = $row["prog_discription"];
        $output["programtimelocation"] = '<span><i class="fa fa-clock-o" aria-hidden="true"></i>'.$daysLeft.' Days Lift </span><span><i class="fa fa-map-marker" aria-hidden="true"></i>'.$row['prog_location'].'</span>';
    } else {
        // If no row is found, set an error message in the output array
        $output['error'] = 'No programm information';
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