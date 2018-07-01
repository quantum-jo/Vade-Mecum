<?php

  session_start();
  include 'connection.php';

  $uid = $_SESSION['username'];

  $q = $_GET['q'];
  $p = $_GET['p'];

  if(strcmp($p, 'fav') == 0) {

    $sql = "UPDATE $uid SET favourite='yes' WHERE title='$q'";
    $conn->query($sql);

  } elseif(strcmp($p, 'liked') == 0) {

    $sql = "UPDATE $uid SET liked='yes' WHERE title='$q'";
    $conn->query($sql);

  }
 ?>
