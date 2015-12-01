<?php
session_start();
require 'db/connect.inc.php';

// Get comment id
$comment_id = $_GET['comment_id'];

// Define who the user is
$user = $_SESSION['user'];

$deleteQuery = "DELETE FROM comments WHERE comment_id = '".$comment_id."'";
$conn->query($deleteQuery) or die('Could not query');

header('Location: ' . $_SERVER['HTTP_REFERER']);
