<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM tbl_program ORDER BY date_added DESC LIMIT 5";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<h1>No program available now</h1>';
    } else {
        foreach ($result as $row) {
            // Calculate the number of days left
            $dateNeed = new DateTime($row['prog_date']);
            $currentDate = new DateTime();
            $interval = $currentDate->diff($dateNeed);
            $daysLeft = $interval->days;
            
            $output .= '
            <div class="single-champign">
            <div class="champign-img">
                <a href="programme.html?id=' . $row['id'] . '"><img src="images/'.$row['program_img'].'" alt="'.$row['program_head'].'"></a>
            </div>
            <div class="champign-title">
                <h4><a href="programme.html?id=' . $row['id'] . '"">'.$row['program_head'].'</a></h4>
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