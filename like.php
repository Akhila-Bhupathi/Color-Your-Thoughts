<?php

session_start();
$user_id=$_SESSION['id'];
//echo $_COOKIE['post_id'];
//echo $_GET['pos'];
if(isset($_COOKIE['u_id'])){
    $u_id=$_COOKIE['u_id'];
}
$page=$_GET['current_page'];
$post_id=$_COOKIE['post_id'];
require_once('config.php');
$query="select * from user_posts where post_id='$post_id'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);

$likes=$row['likes'];
$likes=(int)$likes;
$likes++;
//echo $likes;

$query="update user_posts set likes='$likes' where post_id='$post_id'";
mysqli_query($con,$query);

$query="insert into likes_posts(post_id,user_id) values('$post_id','$user_id')";
mysqli_query($con,$query);
//header('Location:posts.php');
if($page=="posts"){
    header('Location:posts.php');
    }
    else if($page=="profile"){
        header('Location:profile_posts.php');
    }
?>