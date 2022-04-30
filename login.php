<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/css_for_login.css" />
  </head>
  <body>
    <h2>Login Form</h2>
    <form action="" method="post">
      <div class="container">
        <label style="color: olivedrab; font-weight: 700">Email ID </label
        ><br />
        <input type="mail" name="mail" placeholder="Enter your Email ID " required /><br />
        <label style="color: olivedrab; font-weight: 700">Password </label
        ><br />
        <input
          type="password"
          name="pass"
          placeholder="Enter your password"
          required
        /><br />
        <button type="submit"name="submit">Login</button>
      </div>
    </form>
    <?php
    if(isset($_POST['submit'])){
      $con=mysqli_connect("localhost","root","","painting_website");
      $mail=$_POST['mail'];
      $pass=$_POST['pass'];
      $query="select * from user_login where mail='$mail' and password='$pass'";
      $result=mysqli_query($con,$query);
      if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        echo "<script>alert('Logged in successfully');
        window.location.replace('http://localhost/projects/web%20lab%20website/uhome.php');</script>";
        session_start();
        $_SESSION['id']=$row['user_id'];
        
      }
      else{
        echo "<script>alert('Please register to login');</script>";
      }
    }
    ?>
  </body>
</html>
