<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM tbl_galary ORDER BY data_add ASC LIMIT 9";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<h1>No image available now</h1>';
    } else {
        foreach ($result as $row) {
            // Calculate the number of days left
            $output .= '
            <a href="#"><img src="images/'.$row['img'].'" alt="'.$row['img_tile'].'" style="width: 50px;"/></a>
            ';
        }
    }
} catch (PDOException $e) {
    $output .= $e->getMessage();
}
echo $output;
?>