<?php
include_once('connect.php'); // Include your database connection file
$output = array(); // Initialize an empty array to store donation data

try {
    $sql = "SELECT tbl_blog.*, tbl_admin.full_name, COUNT(blog_comments.id) AS total_comments 
    FROM tbl_blog 
    INNER JOIN tbl_admin ON tbl_blog.adminid = tbl_admin.adm_id 
    LEFT JOIN blog_comments ON tbl_blog.id = blog_comments.blog_id WHERE tbl_blog.id = :blogid";
    $stmt = $con->prepare($sql);
    $stmt->execute([':blogid' => $_GET['blogid']]); // Use $_GET for GET request
    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch data as associative array

    // Check if the query returned a row
    if ($row) {

        $formatted_day = date('d', strtotime($row['date_post']));
        $formatted_month_year = date('M Y', strtotime($row['date_post']));
        // If a row is found, populate the output array with the desired data
        $output["postername"] = $row["full_name"];
        $output["postday"] = $formatted_day;
        $output["postmonthyear"] = $formatted_month_year;
        $output['totalcomments'] = $row['total_comments'];
        $output["blogimg"] = $row["blog_image"];
        $output["blogheader"] = $row["blog_header"];
        $output["blogdetails"] = $row["blog_details"];
    } else {
        // If no row is found, set an error message in the output array
        $output['error'] = 'No blog information';
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