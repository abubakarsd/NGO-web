<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT tbl_blog.*, tbl_admin.full_name, COUNT(blog_comments.id) AS total_comments 
            FROM tbl_blog 
            INNER JOIN tbl_admin ON tbl_blog.adminid = tbl_admin.adm_id 
            LEFT JOIN blog_comments ON tbl_blog.id = blog_comments.blog_id 
            GROUP BY tbl_blog.id 
            ORDER BY tbl_blog.date_post DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<h1>No post available now</h1>';
    } else {
        foreach ($result as $row) {
            $formatted_day = date('d', strtotime($row['date_post']));
            $formatted_month_year = date('M Y', strtotime($row['date_post']));
            $output .= '
            <div class="single-blog">
            <div class="single-blog-img">
                <a href="blog_single.html?id=' .$row['id']. '"><img src="images/'.$row['blog_image'].'" alt="'.$row['blog_header'].'"></a>
            </div>
            <div class="blog-content-box">
                <div class="blog-post-date">
                    <span>'.$formatted_day.'</span>
                    <span>'.$formatted_month_year.'</span>
                </div>
                <div class="blog-content">
                   <h4><a href="blog_single.html?id=' .$row['id']. '">'.$row['blog_header'].'</a></h4>
                    <div class="meta-post">
                        <span class="author">Post By: <a href="#">'.$row['full_name'].'</a></span>
                        <span>'.$row['total_comments'].' Comments</span>
                    </div>
                    <div class="exerpt">'.substr(strip_tags($row['blog_details']), 0, 200).'</div>
                    <a href="blog_single.html?id=' .$row['id']. '" class="btn-two">Read More</a>
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