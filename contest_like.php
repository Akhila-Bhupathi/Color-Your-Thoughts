<?php
session_start();
require_once('config.php');
$user_id=$_SESSION['id'];
$post_id=$_COOKIE['c_post_id'];
$act=$_GET['act'];
echo $act;
if($act=="like"){
    $query="select * from contest_posts where c_post_id='$post_id' ";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
    $likes=$row['likes'];
    $likes=(int)$likes;
    $likes++;

    $query="update contest_posts set likes='$likes' where c_post_id='$post_id'";
    mysqli_query($con,$query);

    $query="insert into contest_likes(user_id,post_id) values('$user_id','$post_id')";
    mysqli_query($con,$query);
    header('Location:contest_home.php');
}
else if($act=="dislike"){
    $query="select * from contest_posts where c_post_id='$post_id'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
    $likes=$row['likes'];
    $likes=(int)$likes;
    $likes--;
    
    $query="update contest_posts set likes='$likes' where c_post_id='$post_id'";
    mysqli_query($con,$query);

    $query="delete from contest_likes where user_id='$user_id' and post_id='$post_id'";
    mysqli_query($con,$query);

    header('Location:contest_home.php');
}


?>