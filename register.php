<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/css_for_registration.css" />

  </head>
  <body>
  

    <h2>Registration Form</h2>
    <form action="register.php" method="post">
      <div class="container">
        <label style="color: green; font-weight: 700">First Name</label><br />
        <input type="text" name="fname" placeholder="First Name" required /><br />
        <label style="color: green; font-weight: 700">Last Name</label><br />
        <input type="text" name="lname" placeholder="Last Name" /><br />
        
        <label style="color: green; font-weight: 700">Email ID</label><br />
        <input type="email" name="mail" placeholder="Enter your Email ID" required /><br />
        <label style="color: green; font-weight: 700">Phone Number</label><br />
        <input type="tel" name="mobile" placeholder="Phone Number"/><br />
        <label style="color: green; font-weight: 700">Password</label><br />
        <input
          type="password"
          name="pass"
          placeholder="Enter your Password"
          required
        /><br />
        <button type="submit" name="submit">Submit</button>
      </div>
    </form>
    
    <?php
if(isset($_POST['submit']))
{
      $con=mysqli_connect("localhost","root","","painting_website");
      if(!$con){
          echo "Not found";
        }
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $mobile_no=$_POST['mobile'];
      $mail=$_POST['mail'];
      $pass=$_POST['pass'];
      echo "$fname";
      $query="Insert into user (fname,lname,mobile_no) values ('$fname','$lname','$mobile_no')";
      mysqli_query($con,$query);

      $query="select user_id from user where fname='$fname' and lname='$lname' and mobile_no='$mobile_no'";
      $result=mysqli_query($con,$query);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
          $u_id=$row['user_id'];
          $query="Insert into user_login(user_id,mail,password) values('$u_id','$mail','$pass')";
          if(mysqli_query($con,$query))
          {
            echo "<script>alert('Registered successfully. Login now');
            window.location.replace('http://localhost/projects/web%20lab%20website/index.php');
            </script>";
            
            
          }
       
      } 
      
}



?>
  </body>
</html>
