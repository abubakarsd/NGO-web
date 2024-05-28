<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM urgent_donation WHERE status = 1 ORDER BY data_send DESC LIMIT 5";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<h1>No Urgent Causes Donation for now</h1>';
    } else {
        foreach ($result as $row) {
            // Calculate the percentage raised towards the goal
            $percentage = min(($row['raised_amount'] / $row['Goal_amount']) * 100, 100);

            // Calculate the number of days left
            $dateNeed = new DateTime($row['date_need']);
            $currentDate = new DateTime();
            $interval = $currentDate->diff($dateNeed);
            $daysLeft = $interval->days;

            $output .= '
            <div class="single-champign">
            <div class="champign-img">
            <a href="causes_single.html?id='.$row['id'].'"><img src="images/'.$row['donation_img'].'" alt="Causes Image"></a>
            </div>
            <div class="champign-title">
            <h4> <a href="causes_single.html?id='.$row['id'].'">'.$row['donation_title'].'</a></h4>
            <p><span>'.$daysLeft.'</span> Days Left</p>
            </div>
            </div>
            ';
        }
    }
} catch (PDOException $e) {
    $output .= $e->getMessage();
}
echo $output;
?>