<?php
session_start();
require 'db/connect.inc.php';

if (isset($_POST['addComment'])) {
    // User credientials
    $comment = $_POST['comment'];
    $username = $_SESSION['user'];
    $post_id = $_POST['post_id'];
    $time = time();
    $date = date('Y-m-d H:i:s', $time);

    if (!empty($comment)  && !empty($_SESSION['user'])) {
        $addcomment = "INSERT INTO comments (comment, username, post_id, date_time)
        VALUES ('".$comment."', '".$username."', '".$post_id."', '".$date."')";

        // Add user to db
        $conn->query($addcomment) or die('Could not post comment');

        if ($_SESSION['admin'] == 'n') {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
//            header('Location: ../pages/dashboard.php');

        } elseif ($_SESSION['admin'] == 'y') {
//            header('Location: ../pages/dashboard_ad.php');
              header('Location: ' . $_SERVER['HTTP_REFERER']);

        } else {
            echo 'No sessions started';
        }

    } else {
        echo 'Blank comments are not allowed';
    }

} else {
    echo 'Did not add comment';
}
$conn->close();
