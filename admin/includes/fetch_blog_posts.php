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
            <tr>
                <td>'.$row['blog_header'].'</td>
                <td>'.$row['poster_name'].'</td>
                <td>'.$row['total_comments'].'</td>
            </tr>';
        }
    }
} catch (PDOException $e) {
    $output .= $e->getMessage();
}
echo $output;
?>