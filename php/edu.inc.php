<?php
session_start();
require 'db/connect.inc.php';

// Query for selecting matching post titles
$postsQuery = "SELECT * FROM posts WHERE category = 'Education' ORDER BY post_id DESC";
$posts = $conn->query($postsQuery);


while ($post = mysqli_fetch_assoc($posts)) {
    // Post variables
    $post_id = $post['post_id'];
    $title = $post['title'];
    $content = $post['content'];
    $postBy = $post['username'];
    $timestamp = $post['date_time'];
    $sub_category = $post['sub_category'];

    // Div to output
    echo '
    <div class="post" id="'.$post_id.'">
      <a href="#">'. $title. '</a>. <span><em>Posted by</em> '. $postBy. ' on '. $timestamp. '</span>
      <hr />
      <p>'. $content. '</p><br />
      <span class="sub-category">' .$sub_category. '</span><br />
      <span class="comment">&gt;&gt; See comments</span><br />';

    if ($postBy == $_SESSION['user'] || $_SESSION['admin'] == 'y') {
        echo '
        <form action="../php/deletePost.php" method="GET">
          <input type="hidden" name="post_id" value="'.$post_id.'" />
          <input type="submit" name="delete" value="Delete" /><br /><br />
        </form>';
    }

    echo '<div class="comments">';

    // Get all the comments
    $commentsQuery = "SELECT * FROM comments WHERE post_id='".$post_id."' ORDER BY comment_id ASC";
    $comments = $conn->query($commentsQuery);

    while ($comment = mysqli_fetch_assoc($comments)) {
        // Commment variables
        $comment_id = $comment['comment_id'];
        $ActualComment = $comment['comment'];
        $commentBy = $comment['username'];
        $date = $comment['date_time'];


        echo $ActualComment. '
        <br />
        <span><em>Posted by</em> '. $commentBy. ' on '. $date.'</span>
        <br />';

        if ($commentBy == $_SESSION['user'] || $_SESSION['admin'] == 'y') {
            echo '
            <form action="../php/deleteComment.php" method="GET">
              <input type="hidden" name="comment_id" value="'.$comment_id.'" />
              <input type="submit" name="delete" value="Delete" /><br /><br />
            </form>
            ';
        }
    }
?>
<div class="row">
    <div class="col-12">
      <form action="../php/addComment.php" method="post">
        <table>
         <tr>
           <th><label for="comment"><i class="material-icons">create</i> Add your comment<hr /></label></th>
         </tr>
          <tr>
            <td>
              <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Add your comment"></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            </td>
          </tr>
          <tr>
            <td><input type="submit" name="addComment" value="Comment" /></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
<?php
    echo '
      </div>
    </div>
    <hr />';
}
