<?php



include 'connection.php';

$username = $_SESSION['username'];

$table = "CREATE TABLE $username (
          id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          volumeID VARCHAR(500) NOT NULL UNIQUE,
          title VARCHAR(500),
          author VARCHAR(500),
          ImageLink VARCHAR(500),
          status VARCHAR(500),
          liked VARCHAR(500),
          favourite VARCHAR(500)
        ); ";

mysqli_query($conn, $table);
