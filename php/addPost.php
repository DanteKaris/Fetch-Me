<?php
session_start();
require 'db/connect.inc.php';

if (isset($_POST['post'])) {
    // User credientials
    $title = $conn->real_escape_string($_POST['postTitle']);
    $content = $conn->real_escape_string($_POST['newPost']);
    $subCategory = $_POST['subCategory'];
    $username = $_SESSION['user'];
    $time = time();
    $date = date('Y-m-d H:i:s', $time);

    if ($subCategory == 'Math') {
        $category = 'Education';

    } elseif ($subCategory == 'Science') {
        $category = 'Education';

    } elseif ($subCategory == 'Football') {
        $category = 'Education';

    } elseif ($subCategory == 'Basketball') {
        $category = 'Sports';

    } elseif ($subCategory == 'Movies') {
        $category = 'Entertainment';

    } elseif ($subCategory == 'Series') {
        $category = 'Entertainment';

    } elseif ($subCategory == 'Anime') {
        $category = 'Entertainment';

    } elseif ($subCategory == 'Music') {
        $category = 'Entertainment';
    }


    if (!empty($title) && !empty($content)) {
        $addPost = "INSERT INTO posts (title, content, username, date_time, sub_category, category) VALUES
        ('".$title."', '".$content."', '".$username."', '".$date."', '".$subCategory."', '".$category."')";

        // Add user to db
        $conn->query($addPost) or die('Could not add user');

        if ($_SESSION['admin'] == 'n') {
            header('Location: ../pages/dashboard.php');

        } elseif ($_SESSION['admin'] == 'y') {
            header('Location: ../pages/dashboard_ad.php');
        }

    } else {
        echo 'Please add a title and content to the Fetch';
    }

} else {
    echo 'Did not submit form';
}
$conn->close();
