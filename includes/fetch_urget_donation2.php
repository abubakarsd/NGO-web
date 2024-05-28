<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM urgent_donation WHERE status = 1 ORDER BY data_send DESC";
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
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-causes-box">
                    <div class="causes-img">
                        <a href="causes_single.html?id='.$row['id'].'"><img src="images/'.$row['donation_img'].'" alt="Causes Image"></a>
                    </div>
                    <div class="causes-content">
                        <h4> <a href="causes_single.html?id='.$row['id'].'">'.$row['donation_title'].'</a></h4>
                        <div class="time-shedule">
                            <span><i class="fa fa-clock-o" aria-hidden="true"></i>'.$daysLeft.' Days Left </span>
                            <span><i class="fa fa-map-marker" aria-hidden="true"></i>'.$row['location'].'</span>
                        </div>
                        <p>'.substr(strip_tags($row['donation_discription']), 0, 200).'</p>
                        <h5><span>Raised: </span>₦'.number_format($row['raised_amount'], 2).'</h5>
                        <h5><span>Goal: </span>₦'.number_format($row['Goal_amount'], 2).'</h5>
                        <div class="progressbar" data-animate="false">
                            <div class="circle" data-percent="'.$percentage.'">
                                <div></div>
                            </div>
                        </div>
                        <a href="#" class="btn-two btn_donate" id="'.$row['id'].'">Donate Now <i class="fa fa-heart" aria-hidden="true"></i></a> 
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