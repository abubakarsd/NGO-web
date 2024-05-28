<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM tbl_team ORDER BY id DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<h1>No Team available now</h1>';
    } else {
        foreach ($result as $row) {
            // Calculate the number of days left
            $output .= '
            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="single-member">
            <div class="member-image">
                <img src="images/'.$row['team_image'].'" alt="'.$row['team_name'].'">
            </div>
            <div class="member-info">
                <h4><a href="#">'.$row['team_name'].'</a></h4>
                <h5>'.$row['team_position'].'</h5>
            </div>
            <div class="member-social-link">
                <a href="'.$row['facebook_link'].'" terget="_blank" class="fa fa-facebook" aria-hidden="true"></a>
                <a href="'.$row['x_link'].'" terget="_blank" class="fa fa-twitter" aria-hidden="true"></a>
                <a href="'.$row['in_link'].'" terget="_blank" class="fa fa-linkedin" aria-hidden="true"></a>
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