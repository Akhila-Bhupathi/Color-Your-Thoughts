<?php
session_start();
if(isset($_SESSION['id'])){
  $user_id=$_SESSION['id'];
  require_once('config.php');
  $query="select * from user_posts where user_id='$user_id'";
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
      .painting{
          position: relative;
      }
      .del{
          width:150px;
          height:45px;
          background-color: hotpink;
          font-size: 20px;
          border-radius: 20px;
          color: white;
          }
          .del:hover{
            box-shadow: 10px 10px 10px blue;
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
        <img
          src="images/likeh.png"
          class="dislike"
          alt=""
          style="position: relative;"
        />
        <p style="position:absolute;left:20px;bottom:200px;"><?php echo $row['likes']?> likes</p>
        <br>
        <br>
        <p><?php echo $row['title'] ?></p>
        <p><?php echo $row['description'] ?></p>
        <p><?php $dat=new DateTime($row['date']); echo $dat->format('d M Y'); ?></p>
        <button class="del" onclick="delete_post('<?php echo $post_id?>')">Delete</button>
      </div>
      <?php } ?>
    </div>

    <script>
      function goback() {
        window.history.back();
      }
      function delete_post(post_id){
            var out=prompt("Are you sure of deleting this post. If yes , please type 'Yes' ");
            if(out=="Yes"){
                document.cookie="delete_post_id="+post_id;
                window.location.replace('http://localhost/projects/web%20lab%20website/delete_post.php');
            }
      }
      
    </script>
  </body>
</html>
<?php
  }
  else{
    ?>

<a href="profile.php"> <button style=" background-color: hotpink;
    border-radius: 10%;
    width: 100px;
    height: 40px;
    color: white;">Back</button></a>
    <hr>
<center><h1 style="color:blue;font-style:italic">No posts added yet</h1></center>

    <?php
  }
  
}
else{
    echo "<script>alert('You need to login to view this page');
    window.location.replace('http://localhost/projects/web%20lab%20website/login.php');
    </script>";
}   
?>