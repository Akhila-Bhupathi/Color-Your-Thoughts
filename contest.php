<?php
session_start();
if(isset($_SESSION['id'])){
    require_once('config.php');
    $query="select * from contests order by end_date desc";
    $result=mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contests</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .con2 ul li a:active{
            color: pink;
        }
        .contest{
            width:55%;
            margin: 20px auto;
            text-align:center;
            background-color:white;
            border-radius: 20px;
           
        }
        .contest h1{
            color:hotpink;
            font-weight: 800;
            font-size: 50px;
            font-style: italic;
        }
        .contest h2{
            color:blue;
            text-align:right;
            font-style: italic;
            
        }
        .contest h4{
            color:hotpink;
            
            font-style: italic;
        }
         a{
            text-decoration: none;
        }
        .contest:hover{
            box-shadow: 10px 10px 10px blue;
        }
        h1:hover{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="con2">
        <ul>
            <li><img id="logo" src="images/rainbow-logo.png" alt=""></li>
            <li class="active"><a href="uhome.php">Home</a></li>
            <li><a href="posts.php">Posts</a></li>
            <li><a href="contest.php">Contests</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="add.php">Add Post</a></li>
            <li> <a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="contestslist">
    <?php while($row=mysqli_fetch_array($result)){
        $contest_id=$row['contest_id']; ?>
        <div class="contest">
            <h1 onclick="contest('<?php echo $contest_id?>')">
                <?php echo $row['contest_name']?>
            </h1>
            <h4>Theme : <?php echo $row['contest_theme']?></h4>
            <h2>Start date: <?php $dt=new DateTime($row['start_date']);
            echo $dt->format('d-M-Y'); ?> </h2>
            <h2>End date: <?php $dt=new DateTime($row['end_date']);
            echo $dt->format('d-M-Y'); ?> </h2>
        </div>
    <?php } ?>
    </div>
    <script>
        function contest(contest_id){
            document.cookie="contest_id="+contest_id;
            window.location.replace('http://localhost/projects/web%20lab%20website/contest_home.php');
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