<?php
session_start();
if(isset($_SESSION['id'])){
    $user_id=$_SESSION['id'];
    $u_id=$_COOKIE['u_id'];
    require_once('config.php');
    $query="select * from user where user_id='$u_id'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
    $from=$_COOKIE['from'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>parisara</title>
    <link rel="stylesheet" href="css/posts_style.css" >
    <style>
      body {
        background-color: white;
      }
    </style>
  </head>
  <body>
    <?php if($from=="posts"){?>
    <a href="posts.php"><button id="back">Back</button></a>
    <?php } else if($from=="contest"){?>
      <a href="contest_home.php"><button id="back">Back</button></a>
    <?php } ?> 
    
    <div class="header">
        <h1><?php echo $row['fname']." ".$row['lname']; ?></h1>
        
        <h2>Contact Number</h2>
        <h2><?php echo $row['mobile_no'];?></h2>
    </div>
    <hr>
    <?php
    $query="select * from user_posts where user_id='$u_id'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
    ?>

    <div class="paintings">
    <?php while($row=mysqli_fetch_array($result)){
        $post_id=$row['post_id']; ?>
      <div class="painting">
        <div class="paint">
          <img
            src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['painting'])?> "
            alt=""
          />
        </div>
        <br />
        <?php 
        $sql="select * from likes_posts where post_id='$post_id' and user_id='$user_id'";
        $r=mysqli_query($con,$sql);
        if(!mysqli_num_rows($r)>0){ 
        ?>
        <img src="images/heart.png" class="like" alt="" onclick="like('<?php echo $post_id ?>','<?php echo $u_id?>')" />
        <?php } else{ ?>
          <img
          src="images/likeh.png"
          class="dislike"
          alt=""
          onclick="dislike('<?php echo $post_id ?>','<?php echo $u_id?>')"
        />
        <?php } ?>
        <p><?php echo $row['title'] ?></p>
        <p><?php echo $row['description'] ?></p>
        <p><?php $dat=new DateTime($row['date']); echo $dat->format('d M Y'); ?></p>
      </div>
    <?php } ?>
    </div>
    <?php } ?>
    <script>
      function goback() {
        window.history.back();
      }
      function like(a,b) {
               document.cookie="post_id="+a; 
               document.cookie="u_id="+b;
       //     window.location.replace('http://localhost/projects/web%20lab%20website/like.php?pos='+a);
       window.location.replace('http://localhost/projects/web%20lab%20website/like.php?current_page=profile');
      }
      function dislike(a,b) {
        document.cookie="post_id="+a;
        document.cookie="u_id="+b;
        window.location.replace('http://localhost/projects/web%20lab%20website/dislike.php?current_page=profile');
      }
    </script>
<?php
}
else{
    echo "<script>alert('You need to login to view this page');
    window.location.replace('http://localhost/projects/web%20lab%20website/login.php');
    </script>";
}   
?>