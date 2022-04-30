<?php
session_start();
if(isset($_SESSION['id'])){
  $contest_id=$_COOKIE['contest_id'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add a Post</title>
    <link rel="stylesheet" type="text/css" href="css/css_for_addpost.css" />
  </head>
  <body>
  <a href="contest_home.php" style="text-decoration: none; color: white"><button
      
      type="button"
      style="margin-left: 1100px; margin-top: 0px"
    >Back</a>
    </button>
    <h2>Add a New Post</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="container">
        <label>Title </label><br />
        <input type="text" name="title" placeholder="Enter title of your painting" /><br />
        <label>Upload the painting</label><br />
        <input class="choosebtn" name="image" type="file" accept="image/*" /><br />
        <label>Description about the paint</label><br />
        <textarea
          id="textid"
          rows="7"
          name="description"
          cols="30"
          placeholder="Enter description about the painting"
        ></textarea>
        <br />
        <button type="submit" name="submit">Post</button>
      </div>
    </form>

    <?php
    if(isset($_POST["submit"])){
      require_once('config.php');
      $title=$_POST['title'];
      $description=$_POST['description'];
      $user_id=$_SESSION['id'];
      
      $filename=basename($_FILES['image']['name']);
      $filetype=pathinfo($filename,PATHINFO_EXTENSION);

      $allowtypes=array('jpg','jpeg','png');
      
      if(in_array($filetype,$allowtypes))
      {
          $image=$_FILES['image']['tmp_name'];
          $imgcontent=addslashes(file_get_contents($image));
          $query="insert into contest_posts(contest_id,user_id,title,description,painting,likes) values('$contest_id','$user_id','$title','$description','$imgcontent',0)";
          if(mysqli_query($con,$query)){
              echo "<script>alert('Successfiul');
              window.location.replace('http://localhost/projects/web%20lab%20website/contest_home.php');</script>";
          }
      }
      else{
          echo "<script>alert('Type not accepted.Try again');</script>";
      }
    }
    ?>
    <script>
      function goback(){
        window.history.back();
      }
    </script>
  </body>
</html>
<?php
}
else{
    echo "<script>alert('You need to login to view this page');
    window.location.replace('http://localhost/projects/web%20lab%20website/login.php');
    </script>";
}   
?>