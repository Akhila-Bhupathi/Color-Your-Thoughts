<?php
session_start();
require_once('config.php');
$user_id=$_SESSION['id'];
$post_id= $_COOKIE['delete_post_id'];
$query="delete from user_posts where post_id='$post_id'";
mysqli_query($con,$query);
echo "<script>alert('Successfully deleted');
    window.location.replace('http://localhost/projects/web%20lab%20website/view_my_posts.php');</script>";
?>