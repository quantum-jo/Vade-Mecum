<?php

  session_start();
  include 'connection.php';

  $uid = $_SESSION['username'];
  $shelfData = array();

  $uid = mysqli_real_escape_string($conn, $uid);

  $sql = "SELECT * FROM $uid";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) !=0) {
    while($row = mysqli_fetch_assoc($result)) {
      $temp = array('title'=>$row['title'], 'author'=>$row['author'], 'ImageLink'=>$row['ImageLink'], 'volumeID'=>$row['volumeID'], 'liked'=>$row['liked'], 'favourite'=>$row['favourite']);
      array_push($shelfData, $temp);
    }
  }
  echo json_encode($shelfData);

 ?>
