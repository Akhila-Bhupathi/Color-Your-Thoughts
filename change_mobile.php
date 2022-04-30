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
        <h2>Change Mobile number</h2><hr>
        <br>
        <input type="text" name="mobile">  
        <br><br>
        <input type="submit" name="submit" value="Change">
    </form>
        
    </div>
    <?php
    session_start();
    $user_id=$_SESSION['id'];
    if(isset($_POST['submit'])){
        $new_mobile_no=$_POST['mobile'];
        require_once('config.php');
        $query="update user set mobile_no='$new_mobile_no' where user_id='$user_id'";
        if(mysqli_query($con,$query)){
            echo "<script>alert('Successful');
            window.location.replace('http://localhost/projects/web%20lab%20website/profile.php');
            </script>";
            //header('Location:profile.php');
        }
    }
    ?>
</body>

</html>