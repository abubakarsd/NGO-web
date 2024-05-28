<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM tbl_galary ORDER BY data_add ASC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<h1>No image available now</h1>';
    } else {
        foreach ($result as $row) {
            // Calculate the number of days left
            $output .= '
            <div class="single-item-4 col-md-3 col-sm-6 '.$row['type_img'].'">
            <div class="gallery-img">
                <img src="images/'.$row['img'].'" alt="'.$row['img_tile'].'">
                <div class="overlay"></div>
                <div class="gallery-content">
                    <a href="images/'.$row['img'].'" data-rel="lightcase:myCollection" title="Image Title"><i class="fa fa-expand" aria-hidden="true"></i></a>
                    <h4><a href="#">'.$row['img_tile'].'</a></h4>
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