<?php
session_start();
$admin = $_SESSION['admin'];

if (isset($_GET['search'])) {
    $search_text = $_GET['search'];
}

if (!empty($search_text)) {
    require 'db/connect.inc.php';

    // Query for selecting matching post titles
    $postsQuery = "SELECT * FROM posts WHERE title LIKE '%$search_text%' ORDER BY post_id DESC";
    $posts = $conn->query($postsQuery);

    while ($rows = mysqli_fetch_assoc($posts)) {
        $post_id = $rows['post_id'];
        $title = $rows['title'];
        $content = $rows['content'];

        if ($admin == 'y') {
            echo '<hr /><a href="dashboard_ad.php#'.$post_id.'" title="'. $content. '" style="overflow: hidden; text-overflow: ellipsis;">'. $title. '</a>';

        } elseif ($admin == 'n') {
            echo '<hr /><a href="dashboard.php#'.$post_id.'" title="'. $content. '" style="overflow: hidden; text-overflow: ellipsis;">'. $title. '</a>';
        }
    }
}
