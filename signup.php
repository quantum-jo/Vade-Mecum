<?php

session_start();


if(isset($_POST['signupbutton'])) {

   include_once 'connection.php' ;

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $uid = mysqli_real_escape_string($conn, $_POST['username']);
   $pwd = mysqli_real_escape_string($conn, $_POST['password']);

   //Error handlers
   //Check for empty fields
   if(empty($email) || empty($uid) || empty($pwd)) {
      header("Location: signup.php?signup=entervalue");
	    exit();

   } else {

   	 	//Check if email is valid
   	 	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: signup.php?signup=email");
	      exit();

   	 	} else {
   	 		$sql = "SELECT * FROM users WHERE username='$uid'";
   	 		$result = mysqli_query($conn, $sql);
   	 		$resultCheck = mysqli_num_rows($result);

   	 		if($resultCheck > 0) {
          echo "User already exits! Login to the system";
          header("Location: login.php?signup=exists");
	        exit();

   	 		} else {

   	 			//Hashing the passoword
   	 			$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
   	 			//Insert the user into the database
          $bookCount = 0;
          $activity = '';
   	 			$sql = "INSERT INTO Users (username, email, user_password, book_count) VALUES ('$uid', '$email', '$hashedPwd', '$bookCount', '$activity');";

   	 			if(!mysqli_query($conn, $sql)) {
            die("queryfailed!".mysqli_error($conn));
          }

          //set session username to user name obtained from form
          $_SESSION['username']= $_POST['username'];


   	 			header("Location: homeScreen.php?signup=success");
          exit();

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

    <title>Signup</title>

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
      <span class="login"><a href="login.php">Login</a></span>
    </header>

      <!-- Enter sign in details here -->
      <div class="wrapper">
        <div class="content">
          <h1>Sign Up</h1>
          <div class="signup">
            <form class="signup-form" action="signup.php" method="post" autocomplete="off">
              <input type="text" placeholder="username" name="username" required>
              <input type="text" placeholder="email" name="email" required>
              <input type="password" placeholder="password" name="password" required>
              <input type="submit" name="signupbutton" value="submit" id="submit">
            </form>
          </div>
        </div>
      </div>

  </body>
</html>
