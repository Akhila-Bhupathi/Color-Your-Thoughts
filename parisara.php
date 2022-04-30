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
    </style>
  </head>
  <body>
    <button onclick="goback()" id="back">Back</button>
    <a href="send.php"><button id="add">Add a post</button></a>
    
    <div class="header">
        <h1>Parisara</h1>
        <h4>Theme : Nature</h4>
        <h2>Start date: 25/11/2020</h2>
        <h2>End Date: 30/11/2020</h2>
    </div>
    <hr>
    <div class="paintings">
      <div class="painting">
        <div class="paint">
          <img
            src="https://5.imimg.com/data5/UB/XI/MY-1501923/nature-painting-500x500.jpg"
            alt=""
          />
        </div>
        <br />
        <img src="images/heart.jpg" class="like" alt="" onclick="like(this)" />
        <img
          src="images/likeh.png"
          class="dislike"
          alt=""
          onclick="dislike(this)"
        />
        <a href="profile.html"><h1 class="artist">Arnav Mishra</h1> </a>
      </div>
      <div class="painting">
        <div class="paint">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSq9Pt71h0ipvi7toGVnHU2yS36qOT7o8OyKA&usqp=CAU" alt="" />
        </div>
        <br />
        <img src="images/heart.jpg" class="like" alt="" onclick="like(this)" />
        <img
          src="images/likeh.png"
          class="dislike"
          alt=""
          onclick="dislike(this)"
        />
        <a href="profile.html"><h1 class="artist">Akhila B</h1> </a>
      </div>

      <div class="painting">
        <div class="paint">
          <img
            src="https://i.pinimg.com/originals/01/db/59/01db59b47d816e79ec3f7f8c827ec4c2.jpg"
            alt=""
          />
        </div>
        <br />
        <img src="images/heart.jpg" class="like" alt="" onclick="like(this)" />
        <img
          src="images/likeh.png"
          class="dislike"
          alt=""
          onclick="dislike(this)"
        />
        <a href="profile.html"><h1 class="artist">Anusha M</h1> </a>
      </div>

      <div class="painting">
        <div class="paint">
          <img
            src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs2/149132385/original/e8bb33e07378332021214b18bbbcefabcaf1c400/draw-a-perfect-nature-picture-with-real-painting.jpg"
            alt=""
          />
        </div>
        <br />
        <img src="images/heart.jpg" class="like" alt="" onclick="like(this)" />
        <img
          src="images/likeh.png"
          class="dislike"
          alt=""
          onclick="dislike(this)"
        />
        <a href="profile.html"><h1 class="artist">Pavan B</h1> </a>
      </div>

      <div class="painting">
        <div class="paint">
          <img
            src="https://cdn.shopify.com/s/files/1/0128/3633/9802/products/81cYvw83k4L._SL1500_1500x.jpg?v=1577180973"
            alt=""
          />
        </div>
        <br />
        <img src="images/heart.jpg" class="like" alt="" onclick="like(this)" />
        <img
          src="images/likeh.png"
          class="dislike"
          alt=""
          onclick="dislike(this)"
        />
        <a href="profile.html"><h1 class="artist">Aparna Adiga G</h1> </a>
      </div>
    </div>

    
  </body>
</html>
