<?php
  session_start();
  include 'connection.php';
  include 'createTable.php';

  
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomeScreen</title>

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

      .searchBar, .profile, .logout {
        width: 100px;
        margin-top: 20px;
        margin-left: 10px;
        float: left;
      }

      .logout {
        float: right;
      }


      a {
        width: 70px;
        margin: auto;
        padding: 2px;
        text-decoration: none;
        background: rgb(255, 128, 0);
        border: 0;
        border-radius: 4px;
        color: #000;
      }

      a:hover {
        cursor: pointer;
        background: rgb(255, 64, 0);
      }

      .searchBar {
        width: auto;
      }

      select, input {
        width: 100px;
        height: 30px;
        border: 0;
        border-radius: 4px;
        background: rgb(185, 128, 70);
        font-size: 16px;
      }

      option {
        font-family: 'Raleway';
        font-size: 16px;
      }

      input {
        width: 200px;
        color: #000;
      }

      #findBooks {
        width: 70px;
        background: rgb(255, 0, 64);
        border: 0;
        border-radius: 4px;
      }

      #findBooks:hover {
        cursor: pointer;
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
      <div class="profile"><a href="profile.php">Profile</a></div>

      <div class="searchBar">
        <form class="searcher" autocomplete="off">
          <select name="searchBar" id="optionBar">
            <option id="title">Title</option>
            <option id="author">Author</option>
            <option id="publisher">Publisher</option>
            <option id="isbn">ISBN</option>
          </select>

          <input type="text" name="bookQuery" placeholder="Enter book detail" id="finder" onkeyup="findBookData(this.value)">
          <input type="submit" value="Find Books" name="submit" id="findBooks">
        </form>
      </div>

      <div class="logout">
        <a href="welcome.html">Log Out</a>
      </div>
    </header>

    <!-- Main wrapper containing the books -->
    <div class="main-wrapper">
      <div class="content" id="content">
      </div>
    </div>

    <script type="text/javascript" src="findBooks.js"></script>


  </body>
</html>
