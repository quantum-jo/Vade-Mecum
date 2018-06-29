<?php

session_start();

if(isset($_POST['loginButton'])) {

 include 'connection.php';

 $uid = mysqli_real_escape_string($conn, $_POST['uid']);
 $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

 //Error handlers
 //Check if inputs are empty
 if(empty($uid) || empty($pwd)) {
   header("Location: login.php?login=error");
   exit();
 } else {

   //Fetch the user from the database table
    $sql = "SELECT * FROM Users WHERE username='$uid' OR email='$uid'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck < 1) {
      header("Location: signup.php?login=empty");
      exit();

    } else {

      $row = mysqli_fetch_assoc($result);
      if($row) {

        //De-hashing user password
        $hashedPwdCheck = password_verify($pwd, $row['user_password']);
        if($hashedPwdCheck == false) {
          header("Location: login.php?login=password");
          exit();

        } elseif($hashedPwdCheck == true) {

          //Log-in the user
          $_SESSION['username'] = $_POST['uid'];


          header("Location: homeScreen.php");
          exit();

        }
      }
    }
 }
}


 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="reset.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>


    <style>

    body {
      font-family: 'Raleway';
      background: rgb(38, 38, 38);
    }

    header {
      text-align: center;
      height: 80px;
      background: rgb(255, 191, 0);
      padding-bottom: 30px;
    }

    span {
        margin-top: 30px;
    }

    header .home {
      float: left;
      width: 100px;
    }

    header .login {
      float: right;
      width: 100px;
    }

    a {
      text-decoration: none;
      background: #000;
      padding: 5px;
      color: #fff;

      border-radius: 4px;
    }

    a:hover {
      color: #ccc;
    }

    .wrapper {
      background: rgb(38, 38, 38);
      min-height: 300px;
      margin-top: 20px;
    }

    .content {
      width: 80%;
      min-height: 100px;
      margin: auto;
      background: #fff;
      text-align: center;
    }

    form {
      padding-top: 20px;
    }

    input {
      width: 100px;
      height: 20px;
      padding-left: 5px;
      border: 2px solid rgb(255, 102, 0);
      border-radius: 4px;
      outline: none;
    }

    #submit {
      width: 50px;
      background: rgb(255, 191, 39);
      padding: 0;
    }

    #submit:hover {
      cursor: pointer;
    }

    </style>

  </head>
  <body>

    <header>
      <span class="home"><a href="welcome.html">Home</a></span>
      <span class="login"><a href="signup.php">SignUp</a></span>
    </header>

    <!-- Enter login in details here -->
    <div class="wrapper">
      <div class="content">
        <h1>Login</h1>
        <div class="login">
          <form class="login-form" action="login.php" method="post" autocomplete="off">
            <input type="text" placeholder="Username/email" name="uid" required>
            <input type="password" placeholder="Password" name="pwd" required>
            <input type="submit" name="loginbutton" value="Login" id="submit">
          </form>
        </div>
      </div>
    </div>


  </body>
</html>
