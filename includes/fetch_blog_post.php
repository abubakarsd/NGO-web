<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT * FROM tbl_blog ORDER BY date_post DESC LIMIT 3";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<h1>No post available now</h1>';
    } else {
        foreach ($result as $row) {
            $output .= '
            <li>
            <span class="small-thumbnail">
                <a href="blog_single.html?id=' .$row['id']. '"><img src="images/'.$row['blog_image'].'" alt="'.$row['blog_header'].'" style="width:100%;"/></a>
            </span>
            <div class="content">
                <a href="blog_single.html?id=' .$row['id']. '" class="latest-news-title">'.$row['blog_header'].'</a>
                <span class="post-date">'.$row['date_post'].'</span>
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