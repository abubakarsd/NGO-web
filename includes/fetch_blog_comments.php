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
        foreach ($result as $row) {
            // Format the date
            $formatted_date = date('d F Y \a\t h:i a', strtotime($row['comments_date']));

            $output .= '
            <ul class="comment-list">
            <li class="comment">
            <article class="comment-item">
            <div class="profile-image">
            <img src="images/user-sign-icon-person-symbol-human-avatar-isolated-on-white-backogrund-vector.jpg" style="width: 100%" alt="Image Name" />
            </div>
            <div class="comment-content">
            <div class="comment-meta">
            <div class="user-name">
            <h5><a href="#">'.$row['commentor_name'].'</a></h5>
            <span>'.$formatted_date.'</span>
            </div>
            </div>
            <p>'.$row['commentor_post'].'</p>
            <div class="reply-btn">
            <a href="#comment_form" class="btn_reply" id="'.$row['id'].'">Reply<i class="fa fa-reply-all"></i></a>
            </div>
            </div>
            </article>';

            // Fetch replies for this comment
            $stmt_replies = $con->prepare("SELECT * FROM blog_comments WHERE reply_id = :comment_id");
            $stmt_replies->execute([':comment_id' => $row['id']]);
            $replies = $stmt_replies->fetchAll();
            
            if (!empty($replies)) {
                $output .= '<ul class="comment-list">';
                foreach ($replies as $reply) {
                    // Format the reply date
                    $formatted_reply_date = date('d F Y \a\t h:i a', strtotime($reply['comments_date']));
                    $output .= '
                        <li class="comment">
                            <article class="comment-item">
                                <div class="profile-image">
                                    <img src="images/user-profile-icon-profile-avatar-user-icon-male-icon-face-icon-profile-icon-free-png.webp" style="width: 100%" alt="Image Name">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-meta">
                                        <div class="user-name">
                                            <h5><a href="#">'.$reply['commentor_name'].' </a></h5>
                                            <span>'.$formatted_reply_date.'</span>
                                        </div>
                                    </div>
                                    <p>'.$reply['commentor_post'].'</p>
                                </div>
                            </article>
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