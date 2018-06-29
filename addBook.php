<?php

  session_start();

  include 'connection.php';
  $uid = $_SESSION['username'];
  $uid = mysqli_real_escape_string($conn, $uid);

  $q = $_GET['q'];

  $book_list = json_decode($q);
  $status = "Want to Read";
  $liked = "no";
  $favourite = "no";

  $sql = "INSERT INTO $uid (volumeID, title, author, ImageLink, status, liked, favourite) VALUES ();"
