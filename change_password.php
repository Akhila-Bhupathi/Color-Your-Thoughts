<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/edit.css">
</head>
<body>
   
    <div class="con1">
        <form action="" method="post">
            <h2>Change Password</h2><hr>
            <br>
            <label for="">Old password</label> <input type="passwod" name="oldpsw"><br>
            <label for="">New password</label> <input type="password" name="np"><br>
            <label for="">Repeat password</label> <input type="password" name="rnp"><br><br>
            <input type="submit" name="submit" value="Change">
    </form>
        
    </div>
    <?php
        session_start();
        $user_id=$_SESSION['id'];
        require_once('config.php');
        if(isset($_POST['submit'])){
            $old_password=$_POST['oldpsw'];
            $query="select * from user_login where user_id='$user_id'";
            $result=mysqli_query($con,$query);
            $row=mysqli_fetch_array($result);
            $flag=strcmp($row['password'],$old_password);
            if($flag==0){
                $new_password=$_POST['np'];
                $conf_password=$_POST['rnp'];
                $flag1=strcmp($new_password,$conf_password);
                if($flag1==0){
                    $query1="update user_login set password='$new_password' where user_id='$user_id'";
                    if(mysqli_query($con,$query1)){
                        echo "<script>alert('Successful.Please Login');
                        window.location.replace('http://localhost/projects/web%20lab%20website/login.php');
                        </script>";
                    }
                }
                else{
                    echo "<script>alert('new password and confirm password doesn\'t match');</script>";
                }
            } 
            else{
                echo "<script>alert('Old password dosen\'t match');</script>";
            }  
        }
    
    ?>


</body>

</html>


<br>
      