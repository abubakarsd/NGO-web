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
            <div class="col-sm-4 col-xs-12">
            <div class="single-causes-box">
            <div class="causes-img">
            <a href="programme.html?id=' . $row['id'] . '"><img src="images/'.$row['program_img'].'" alt="'.$row['program_head'].'"></a>
            </div>
            <div class="causes-content">
            <h4><a href="programme.html?id=' . $row['id'] . '"">'.$row['program_head'].'</a></h4>
            <div class="time-shedule">
            <span><i class="fa fa-clock-o" aria-hidden="true"></i>'.$daysLeft.' Days Lift </span>
            <span><i class="fa fa-map-marker" aria-hidden="true"></i>'.$row['prog_location'].'</span>
            </div>
            <p>'.substr(strip_tags($row['prog_discription']), 0, 150).'</p>
            <a href="programme.html?id=' . $row['id'] . '" class="btn-two">Read More</a> 
            </div>
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