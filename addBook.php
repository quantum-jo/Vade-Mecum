<?php

  session_start();

  include 'connection.php';
  $uid = $_SESSION['username'];
  $uid = mysqli_real_escape_string($conn, $uid);

  $q = $_GET['q'];
  $p = $_GET['p'];
  $r = $_GET['r'];
  $s = $_GET['s'];


  $status = "Want to Read";
  $liked = "no";
  $favourite = "no";

  $sql = "INSERT INTO $uid (volumeID, title, author, ImageLink, status, liked, favourite) VALUES ('$s', '$q', '$p', '$r', '$status', '$liked', '$favourite');";

  if(!mysqli_query($conn, $sql)) {
    die("queryfailed!".mysqli_error($conn));
  }



  ?>
