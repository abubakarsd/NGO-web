<?php
include_once('connect.php');
$output = '';
try {
    $sql = "SELECT 
                b.id AS blog_id, 
                b.adminid, 
                b.blog_image, 
                b.blog_header, 
                b.blog_details, 
                b.date_post, 
                COUNT(bc.id) AS total_comments,
                a.full_name AS poster_name
            FROM tbl_blog b
            LEFT JOIN blog_comments bc ON b.id = bc.blog_id
            LEFT JOIN tbl_admin a ON b.adminid = a.adm_id
            WHERE MONTH(b.date_post) = MONTH(CURRENT_DATE()) AND YEAR(b.date_post) = YEAR(CURRENT_DATE())
            GROUP BY b.id";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<tr><td colspan="6">No blog posts available</td></tr>';
    } else {
        foreach ($result as $row) {
            $output .= '
            <div class="card single_post">
                    <div class="body">
                        <h3 class="m-t-0 m-b-5"><a href="blog-details.php?id='.$row['blog_id'].'">'.$row['blog_header'].'</a></h3>
                        <ul class="meta">
                            <li><a href="#"><i class="zmdi zmdi-account col-blue"></i>Posted By: '.$row['poster_name'].'</a></li>
                            <li><a href="#"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: '.$row['total_comments'].'</a></li>
                        </ul>
                    </div>                    
                    <div class="body">
                        <div class="img-post m-b-15">
                            <img src="../images/'.$row['blog_image'].'" alt="'.$row['blog_header'].'">
                        </div>
                        <p>'.substr(strip_tags($row['blog_details']), 0, 300).'...</p>
                        <a href="blog-details.php?id='.$row['blog_id'].'" title="read more" class="btn btn-round btn-info">Read More</a>
                        <a href="#" title="read more" class="btn btn-round btn-danger btn-delete" id="'.$row['blog_id'].'">Delete Post</a>                        
                    </div>
                </div>';
        }
    }
} catch (PDOException $e) {
    $output .= $e->getMessage();
}
echo $output;
?>