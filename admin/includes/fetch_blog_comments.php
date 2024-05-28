<?php
include_once('connect.php');
$output = '';
try {
    $stmt = $con->prepare("SELECT * FROM blog_comments WHERE blog_id = :blogid AND reply_id = 0 ORDER BY comments_date DESC");
    $stmt->execute([':blogid' => $_GET['blogID']]);
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $output .= '<ul class="comment-list">
        <li class="comment">
            <article class="comment-item"><p>No comments available for now</p></article>
        </li>
        </ul>';
    } else {
        // Loop through each comment
        $output .= '<ul class="comment-reply list-unstyled">';
        foreach ($result as $row) {
            // Format the date
            $formatted_date = date('d F Y \a\t h:i a', strtotime($row['comments_date']));

            $output .= '
            <li class="row">
            <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="../images/user-sign-icon-person-symbol-human-avatar-isolated-on-white-backogrund-vector.jpg" alt="Awesome Image"></div>
            <div class="text-box col-md-10 col-8 p-l-0 p-r0">
            <h5 class="m-b-0">'.$row['commentor_name'].'</h5>
            <p>'.$row['commentor_post'].'</p>
            <ul class="list-inline">
            <li><a href="#">'.$formatted_date.'</a></li>
            <li><a href="#comment_form" class="btn_reply" id="'.$row['id'].'">Reply</a></li>
            </ul>
            </div>
            </li>';

            // Fetch replies for this comment
            $stmt_replies = $con->prepare("SELECT * FROM blog_comments WHERE reply_id = :comment_id");
            $stmt_replies->execute([':comment_id' => $row['id']]);
            $replies = $stmt_replies->fetchAll();
            
            if (!empty($replies)) {
                $output .= '<ul class="comment-reply list-unstyled">';
                foreach ($replies as $reply) {
                    // Format the reply date
                    $formatted_reply_date = date('d F Y \a\t h:i a', strtotime($reply['comments_date']));
                    $output .= '
                    <li class="row">
                    <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="../images/user-sign-icon-person-symbol-human-avatar-isolated-on-white-backogrund-vector.jpg" alt="Awesome Image"></div>
                    <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                    <h5 class="m-b-0">'.$row['commentor_name'].'</h5>
                    <p>'.$row['commentor_post'].'</p>
                    <ul class="list-inline">
                    <li><a href="#">'.$formatted_reply_date.'</a></li>
                    <li><a href="#comment_form" class="btn_reply" id="'.$row['id'].'">Reply</a></li>
                    </ul>
                    </div>
                    </li>';
                }
                $output .= '</ul>';
            }
            
            $output .= '</li></ul>';
        }
    }
} catch (PDOException $e) {
    $output .= $e->getMessage();
}
echo $output;
?>