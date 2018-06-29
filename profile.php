<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    <link rel="stylesheet" href="reset.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

    <style>
    body {
      font-family: 'Raleway';
      background: rgb(38, 38, 38);
    }

    header {
      min-height: 80px;
      background: rgb(255, 191, 0);
    }

    header nav {
      width: 80%;
      margin: auto;
    }

    header ul {
        padding-top: 30px;
        text-align: center;
    }

    header nav ul li {
      display: inline;
    }

    header nav ul li a {
      text-decoration: none;
      width: 60px;
      height: 30px;
      background: rgb(255, 128, 0);
      color: #000;

      border: 0;
      border-radius: 4px;
      padding: 5px;
    }

    header nav ul li a:hover {
      cursor: pointer;
      background: rgb(255, 64, 0);
    }

    .content {
      width: 60%;
      margin: auto;
      background: #ddd;
    }

    .items {
      height: 200px;
      border: 2px solid #ccc;
      margin-bottom: 20px;
      background: #fff;
    }

    .items:hover {
      background: rgb(18, 22, 33);
      color: #fff;
      cursor: pointer;
    }

    .details {
      width: 550px;
      float: right;
    }

    .thumbanail {
      width: auto;
      float: left;
    }

    </style>
  </head>
  <body>

    <header>
      <nav>
        <ul>
          <li><a href="homeScreen.php">Home</a></li>
          <li><a id="favourites">Favourites</a></li>
          <li><a id="currentReads">Current Reads</a></li>
          <li><a id="activity">Activity</a></li>
          <li><a id="findUsers">Find Users</a></li>
          <li><a href="welcome.html">Logout</a></li>
        </ul>
      </nav>
    </header>

    <!-- Main wrapper containing the books -->
    <div class="main-wrapper">
      <div class="content" id="content">
      </div>
    </div>

  </body>
</html>
