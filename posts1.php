<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>posts</title>
    <style>
      body {
        background-color: white;
      }

      .dislike {
        display: none;
      }
      .paintings {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-gap: 30px;
      }

      .painting img {
        height: 30px;
        width: 30px;
      }
      .paint img {
        height: 280px;
        width: 280px;
      }
      .painting {
        padding: 15px;
        border: 2px solid hotpink;
        position: relative;
        padding-bottom: 40px;
      }
      .painting .artist {
        padding: 10px;
        background-color: hotpink;
        position: absolute;
        right: 0;
        bottom: 0;
        margin: 0;
        color: #0f121f;
      }
      #back {
        background-color: hotpink;
        border-radius: 10%;
        width: 100px;
        height: 40px;
        color: white;
      }
      .painting:hover{
            box-shadow: 10px 10px 10px blue;
        }
        button:hover{
            box-shadow: 10px 10px 10px black;
        }
    </style>
  </head>
  <body>
    <button onclick="goback()" id="back">Back</button>
    <br />
    <br />
    <div class="paintings">
      <div class="painting">
        <div class="paint">
          <img
            src="https://s.hdnux.com/photos/01/13/26/14/19751699/5/920x920.jpg"
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
          <img src="https://i.imgur.com/dP9XNov.jpg" alt="" />
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
            src="https://cdn.eventfinda.co.nz/uploads/events/transformed/1490831-653168-34.png?v=4"
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
            src="https://images-na.ssl-images-amazon.com/images/I/71qHpgdzk3L._SL1440_.jpg"
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
            src="https://storage.googleapis.com/ehimages/2017/10/25/img_942b5703ed4c5d3b242a34f7cc87d9c0_1508933938684_processed_original.jpg"
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

    <script>
      function goback() {
        window.history.back();
      }
      function like(a) {
        a.style.display = "none";
        a.nextElementSibling.style.display = "block";
      }
      function dislike(a) {
        a.style.display = "none";
        a.previousElementSibling.style.display = "block";
      }
    </script>
  </body>
</html>
