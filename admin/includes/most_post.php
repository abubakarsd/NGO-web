<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM tbl_blog ORDER BY date_post DESC LIMIT 5";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<h1>No post available now</h1>';
    } else {
        foreach ($result as $row) {
            $output .= '
            <li class="row">
            <div class="icon-box col-4">
            <img class="img-fluid img-thumbnail" src="../images/'.$row['blog_image'].'" alt="'.$row['blog_header'].'">
            </div>
            <div class="text-box col-8 p-l-0">
            <h5 class="m-b-0"><a href="#">'.$row['blog_header'].'</a></h5>
            <small class="date">'.date('M d, Y', strtotime($row['date_post'])).'</small>
            </div>
            </li>
            ';
        }
    }
} catch (PDOException $e) {
    $output .= $e->getMessage();
}
echo $output;
?>
