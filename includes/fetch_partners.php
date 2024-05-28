<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM tbl_partners ORDER BY date_add ASC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<h1>No partners available now</h1>';
    } else {
        $output .= '<div class="swiper-container-two">';
        $output .= '<div class="swiper-wrapper">';
        foreach ($result as $row) {
            // Calculate the number of days left
            $output .= '
            <div class="swiper-slide">
			<div class="single-logo">
			<img src="images/'.$row['pertner_img'].'" alt="Image Name" style="width:30%"/>
			</div>
			</div>
            ';
        }
        $output .= '</div>';
        $output .= '</div>';
    }
} catch (PDOException $e) {
    $output .= $e->getMessage();
}
echo $output;
?>