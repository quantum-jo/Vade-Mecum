<?php

session_start();

if(isset($_POST['signupbutton'])) {

   include_once 'connection.php' ;

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

   //Error handlers
   //Check for empty fields
   if(empty($email) || empty($username) || empty($password)) {
      header("Location: signup.php?signup=entervalue");
	    exit();

   } else {

   	 	//Check if email is valid
   	 	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: signup.php?signup=email");
	      exit();

   	 	} else {
   	 		$sql = "SELECT * FROM Users WHERE username='$username'";
   	 		$result = mysqli_query($conn, $sql);
   	 		$resultCheck = mysqli_num_rows($result);

   	 		if($resultCheck > 0) {
          echo "User already exits! Login to the system";
          header("Location: login.php?signup=exists");
	        exit();

   	 		} else {

   	 			//Hashing the passoword
   	 			$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
   	 			//Insert the user into the database
   	 			$sql = "INSERT INTO Users (username, email, user_password, books_count, following, followers) VALUES ('$username', '$email', '$hashedPwd', 0, '', '');";

   	 			mysqli_query($conn, $sql);

          //set session username to user name obtained from form
          $_SESSION['username']= $_POST['username'];
          echo "Successfully signed in";

   	 			header("Location: createTable.php");

   	 		}
   	 	}
   }

} else {
	header("Location: signup.php");
	exit();
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
      }

      header {
        text-align: center;
        height: 80px;
        background: rgb(134, 126, 121);
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
        background: #ddd;
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

      button {
        width: 50px;
        height: 30px;
        font-size: 14px;
        background: rgb(255, 102, 0);
        border: 0;
        border-radius: 4px;
      }

      button:hover {
        cursor: pointer;
        background: rgb(128, 51, 0);
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
              <button type="button" name="signupbutton">Submit</button>
            </form>
          </div>
        </div>
      </div>

  </body>
</html>
