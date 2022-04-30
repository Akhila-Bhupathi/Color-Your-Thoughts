<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Color your thoughts</title>
    <style>
      body {
        background-image: url("images/index-bg.jpg");
        background-repeat: no-repeat;
        background-size: cover;
      }
      #logo {
        height: 50px;
        width: 50px;
      }
      #login {
        float: right;
        background-color: hotpink;
        border-radius: 7px;
        width: 150px;
        height: 50px;
        color: white;
      }

      #signup {
        float: right;
        background-color: hotpink;
        border-radius: 7px;
        width: 150px;
        height: 50px;
        color: white;
        margin: 0 10px;
      }

      button:hover {
        box-shadow: 0px 10px 10px gray;
      }
      .nav {
        overflow: hidden;
      }
      .container {
        margin-top: 170px;
        height: 500px;
        width: 100%;
      }
      h1 {
        font-family: "Courier New", Courier, monospace;
        color: hotpink;
        font-style: italic;
        line-height: 20px;
        padding-top: 20px;
      }

      p {
        padding-left: 180px;
        max-width: 400px;
        display: block;
        font-size: 25px;
        font-family: cursive;
      }
    </style>
  </head>
  <!--https://i.pinimg.com/originals/89/00/4b/89004be943011dffa76598bd33170660.png-->
  <body>
    <div class="nav">
      <img
        id="logo"
        src="https://i.pinimg.com/originals/89/00/4b/89004be943011dffa76598bd33170660.png"
        alt=""
      />

      <a href="login.php"><button id="login">Login</button></a>

      <a href="register.php"><button id="signup">Sign Up</button></a>
    </div>
    <div class="container">
      <h1 style="font-size: 70px; font-weight: 900; padding-left: 180px">
        Color
      </h1>
      <h1 style="padding-left: 165px">&nbsp;&nbsp; your thoughts.........</h1>
      <br />
      <p>
        Every Canvas has it's own story.So what's your story share it with
        us........
      </p>
    </div>
  </body>
</html>
