<?php
session_start();
if (isset($_SESSION['id'])) {
  require_once('config.php');
  $user_id = $_SESSION['id'];
  $contest_id = $_COOKIE['contest_id'];;
  $query = "select * from contests where contest_id='$contest_id'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
  $today = new DateTime();
  $end_date = new DateTime($row['end_date']);

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>parisara</title>
    <link rel="stylesheet" href="css/posts_style.css">
    <style>
      body {
        background-color: white;
      }

      img:hover,
      h1:hover {
        cursor: pointer;
      }

      .winners {
        text-align: center;
      }

      .winner {
        border: 2px solid hotpink;
        margin: 0 auto;
        width: 350px;
        text-align: center;
        padding: 5px;
        position: relative;
      }

      .winner h1 {
        background-color: hotpink;
        position: absolute;
        top: 0;
        padding: 10px;
        left: 0;
        margin: 0;
      }

      .winner img {
        border: 3px solid blue;
        padding: 5px;
        
      }

      .winner h2 {
        color: blue;
      }
    </style>
  </head>

  <body>
    <a href="contest.php"><button id="back">Back</button></a>
    <?php
    if ($today < $end_date) {
      $sql = "select * from contest_posts where contest_id='$contest_id' and user_id='$user_id'";
      $res = mysqli_query($con, $sql);
      if (!(mysqli_num_rows($res) > 0)) {
    ?>
        <a href="contest_add.php"><button id="add">Add a post</button></a>
    <?php }
    } ?>
    <div class="header">
      <h1><?php echo $row['contest_name'] ?></h1>
      <h4>Theme : <?php echo $row['contest_theme'] ?></h4>
      <h2>Start date: <?php $start_date = new DateTime($row['start_date']);
                      echo $start_date->format('d-M-Y'); ?> </h2>
      <h2>End date: <?php echo $end_date->format('d-M-Y'); ?> </h2>
    </div>
    <hr>
    <?php
    $query = "select * from contest_posts where contest_id='$contest_id order_by date desc'";
    $result = mysqli_query($con, $query);
    ?>
    <div class="paintings">
      <?php while ($row = mysqli_fetch_array($result)) {
        $u_id = $row['user_id'];
        $post_id = $row['c_post_id'];
        $query = "select fname,lname from user where user_id='$u_id'";
        $res = mysqli_query($con, $query);
        $res = mysqli_fetch_array($res);
      ?>
        <div class="painting">
          <div class="paint">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['painting']); ?>" alt="" />
          </div>
          <br />
          <?php

          if ($today < $end_date) {

            $sql = "select * from contest_likes where post_id='$post_id' and user_id='$user_id'";
            $r = mysqli_query($con, $sql);
            if (!mysqli_num_rows($r) > 0) {
          ?>
              <img src="images/heart.png" class="like" alt="" onclick="like('<?php echo $post_id ?>')" />
            <?php } else { ?>
              <img src="images/likeh.png" class="dislike" alt="" onclick="dislike('<?php echo $post_id ?>')" />
          <?php }
          } ?>
          <p><?php echo $row['title'] ?></p>
          <p><?php echo $row['description'] ?></p>
          <p><?php $dat = new DateTime($row['date']);
              echo $dat->format('d M Y'); ?></p>
          <h1 class="artist" onclick="profile('<?php echo $u_id ?>')"><?php echo $res['fname'] . " " . $res['lname'] ?></h1>
        </div>
      <?php }  ?>
    </div>

    <hr>
    <?php if ($today > $end_date) {
      $query = "select * from contest_posts where likes in(select max(likes) from contest_posts where contest_id='$contest_id') and contest_id='$contest_id'";
      $result = mysqli_query($con, $query); ?>
      <div class="winners">
        <h1 style="
        font-style: italic;
        font-size:50px;">Winner of the competition </h1>
        <?php while ($row = mysqli_fetch_array($result)) {
          $u_id = $row['user_id'];
          $sql = "update contests set winner_id='$u_id' where contest_id='$contest_id'";
          mysqli_query($con, $sql);
          $query1 = "select * from user where user_id='$u_id'";
          $res = mysqli_query($con, $query1);
          $res = mysqli_fetch_array($res);
        ?>
          <div class="winner">
            <h1 class="artist" onclick="profile('<?php echo $u_id ?>')"><?php echo $res['fname'] . " " . $res['lname'] ?></h1>
            <br><br><br><br>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['painting']); ?>" style="width:280px;height:280px" alt="" />
            <hr>

            <h2>Number of likes: <?php echo $row['likes'] ?></h2>
            <p><?php echo $row['title'] ?></p>
            <p><?php echo $row['description'] ?></p>


          </div>
        <?php } ?>
      </div>
    <?php } ?>

    <script>
      function like(p_id) {
        document.cookie = "c_post_id=" + p_id;
        window.location.replace('http://localhost/projects/web%20lab%20website/contest_like.php?act=like');
      }

      function dislike(p_id) {
        document.cookie = "c_post_id=" + p_id;
        window.location.replace('http://localhost/projects/web%20lab%20website/contest_like.php?act=dislike');
      }

      function profile(a) {
        document.cookie = "u_id=" + a;
        document.cookie = "from=contest";
        window.location.replace('http://localhost/projects/web%20lab%20website/profile_posts.php');
      }
    </script>
  </body>

  </html>

<?php
} else {
  echo "<script>alert('You need to login to view this page');
    window.location.replace('http://localhost/projects/web%20lab%20website/login.php');
    </script>";
}
?>