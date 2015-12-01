<?php
session_start();
require 'db/connect.inc.php';

// Get comment id
$post_id = $_GET['post_id'];

$deleteQuery = "DELETE FROM posts WHERE post_id = '".$post_id."'";
$conn->query($deleteQuery) or die('Could not query');

header('Location: ' . $_SERVER['HTTP_REFERER']);
