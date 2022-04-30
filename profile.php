<?php
session_start();
if(isset($_SESSION['id'])){
    require_once('config.php');
    $user_id=$_SESSION['id'];
    $query="select * from user u,user_login ul where u.user_id='$user_id' and u.user_id=ul.user_id";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
    <style>

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
            padding: 20px 20px;
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
            height: 500px;
            width: 430px;
            text-align: center;
            background-color: white;
            margin: 40px auto;
            border:3px solid hotpink;
            padding: 5px;
            border-radius: 5%;
        
        }
        .con3:hover{
            box-shadow: 10px 10px hotpink;
        }

        p {
            font-size: 70px;
            font-weight: 900;
            font-style: italic;
            color: hotpink;
        }

        h1 {
            font-size: 55px;
            font-weight: 900;
            font-style: italic;
            color:blue;
            font-family: cursive;
        }

        h2 {
            font-size: 25px;
            font-weight: 900;
            
            color: hotpink;
            font-family: cursive;
        }
        h3{
            font-size: 45px;
            font-weight: 900;
            
            color: hotpink;
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
        #edit,#view{
            color:white;
            background-color: hotpink;
            border-radius: 10px;
            width:150px;
            height:50px;
            border:1px solid blue;
            font-size:20px;
        }
        #edit:hover,#view:hover{
            box-shadow: 0px 10px 10px blue;
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
            <li> <a href="index.php">Logout</a></li>

        </ul>
    </nav>
    </div>
   
    <div class="con3">
            <h1>Profile Details</h1>
            <hr>
            <h3><?php echo $row['fname']." ".$row['lname']?></h3>
            <h2>Mail :<?php echo $row['mail']?></h2>
            <h2>Mobile Number : <?php echo $row['mobile_no']?></h2>
            <a href="edit.php"><button id="edit">Edit details</button></a>&nbsp;&nbsp;
            <a href="view_my_posts.php"><button id="view">View my posts</button></a>
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