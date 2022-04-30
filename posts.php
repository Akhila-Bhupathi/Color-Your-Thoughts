<?php
session_start();
if(isset($_SESSION['id'])){
  $user_id=$_SESSION['id'];
  require_once('config.php');

  $query="select * from user_posts order by date desc";
  $result=mysqli_query($con,$query);
  if(mysqli_num_rows($result)>0){

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/posts_style.css">
    <title>posts</title>
    <style>
      body {
        background-color: white;
      }
      h1:hover,img:hover{
        cursor: pointer;
      }
    </style>
  </head>
  <body>
   <a href="uhome.php"> <button id="back">Back</button></a>
    <br />
    <br />
    <div class="paintings">
      <?php while($row=mysqli_fetch_array($result)){
          $u_id=$row['user_id'];
          $post_id=$row['post_id'];
          $query="select fname,lname from user where user_id='$u_id'";
          $res=mysqli_query($con,$query);
          $res=mysqli_fetch_array($res);
        ?>
      <div class="painting">
        <div class="paint">
          <img
          src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['painting']); ?>"
            alt=""
          />
        </div>
        <br />
        <?php 
        $sql="select * from likes_posts where post_id='$post_id' and user_id='$user_id'";
        $r=mysqli_query($con,$sql);
        if(!mysqli_num_rows($r)>0){ 
        ?>
        <img src="images/heart.png" class="like" alt="" onclick="like('<?php echo $post_id ?>')" />
        <?php } else{ ?>
          <img
          src="images/likeh.png"
          class="dislike"
          alt=""
          onclick="dislike('<?php echo $post_id ?>')"
        />
        <?php } ?>
        <p><?php echo $row['title'] ?></p>
        <p><?php echo $row['description'] ?></p>
        <p><?php $dat=new DateTime($row['date']); echo $dat->format('d M Y'); ?></p>
        <h1 class="artist" onclick="profile('<?php echo $u_id?>')"><?php echo $res['fname']." ".$res['lname'] ?></h1> 
      </div>
      <?php } ?>
    </div>

    <script>
      function goback() {
        window.history.back();
      }
      function like(a) {
       // a.style.display = "none";
        //a.nextElementSibling.style.display = "block";
        //alert(a);
        //var data="post_id="+a;
               document.cookie="post_id="+a; 
       //     window.location.replace('http://localhost/projects/web%20lab%20website/like.php?pos='+a);
       window.location.replace('http://localhost/projects/web%20lab%20website/like.php?current_page=posts');
      }
      function dislike(a) {
        //a.style.display = "none";
        //a.previousElementSibling.style.display = "block";
        document.cookie="post_id="+a;
        window.location.replace('http://localhost/projects/web%20lab%20website/dislike.php?current_page=posts');
      }
      function profile(a){
        document.cookie="from=posts";
        document.cookie="u_id="+a;
        window.location.replace('http://localhost/projects/web%20lab%20website/profile_posts.php');
      }
    </script>
  </body>
</html>
<?php
  }
  
}
else{
    echo "<script>alert('You need to login to view this page');
    window.location.replace('http://localhost/projects/web%20lab%20website/login.php');
    </script>";
}   
?>