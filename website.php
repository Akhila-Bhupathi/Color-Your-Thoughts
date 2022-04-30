<?php
session_start();
if(isset($_SESSION['id'])){
    require_once('config.php');
    $user_id=$_SESSION['id'];
    $query="select * from user where user_id='$user_id'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            background-image: url('https://previews.123rf.com/images/olegdudko/olegdudko1802/olegdudko180201809/94878830-colorful-drawing-supplies-frame-on-white-background-free-space-flat-lay-art-workshop-painting-inspir.jpg');
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: hotpink;
        }

        li {
            float: left;
            padding: 0;
            text-align: center;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 10px 10px;
            text-decoration: none;
            height: 50px;
            width: 150px;
            font-size: 25px;
            font-weight: 900;

        }

        li a:hover {
            background-color:pink
        }

        #logo {
            height: 70px;
            width: 70px;
            float: left;
        }

        .con3 {
            height: 700px;
            width: 600px;
            text-align: center;
            background-color: white;
            margin: 40px auto;
            border-radius: 10%;
            padding: 5px;
        }

        p {
            font-size: 50px;
            font-weight: 900;
            font-style: italic;
            color: hotpink;
            font-family: cursive;
        }

        h1 {
            font-size: 30px;
            font-weight: 900;
            font-style: italic;
            color: hotpink;
            font-family: cursive;
        }
        h3{
            font-size: 30px;
            font-weight: 900;
            font-style: italic;
            color: blue;
            
        }
        h2 {
            font-size: 15px;
            font-weight: 900;
            font-style: italic;
            color: rgb(100, 43, 235);
            font-family: cursive;
        }

        #add {
            height: 100px;
            width: 100px;
            border-radius: 50%;
        }

        .con3 {
            position: relative;
        }

        .nav4 {
            background-color:whitesmoke;
            position: absolute;
            bottom: 50px;
            left: 200px;
        }
    </style>
</head>

<body>

    <nav class="con2">
        <ul>
            <li><img id="logo" src="https://i.pinimg.com/originals/89/00/4b/89004be943011dffa76598bd33170660.png" alt=""></li>
            <li class="active"><a href="uhome.php">Home</a></li>
            <li><a href="posts.php">Posts</a></li>
            <li><a href="contest.php">Contests</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="add.php">Add Post</a></li>
            <li> <a href="logout.php">Logout</a></li>
            <li> <a href="website.php">Websites</a></li>
        </ul>
    </nav>
    </div>
   
    <div class="con3">
        <center>
        <a href="twitter.php">Twitter</a>
        <a href="instagram.php">Instagram</a>

    </div>
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