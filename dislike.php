<?php
session_start();
$user_id=$_SESSION['id'];
$post_id=$_COOKIE['post_id'];
if(isset($_COOKIE['u_id'])){
    $u_id=$_COOKIE['u_id'];
}
$page=$_GET['current_page'];
require_once('config.php');
$query="select * from user_posts where post_id='$post_id'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
$likes=$row['likes'];
//echo $likes;
$likes=(int)$likes;
$likes=$likes-1;
//echo $likes;

$query="update user_posts set likes='$likes' where post_id='$post_id'";
mysqli_query($con,$query);

$query="delete from likes_posts where post_id='$post_id' and user_id='$user_id'";
mysqli_query($con,$query);
if($page=="posts"){
header('Location:posts.php');
}
else if($page=="profile"){
    header('Location:profile_posts.php');
}
?>