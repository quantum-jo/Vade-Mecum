<?php 
	session_start();
	include 'connection.php';

	$t = $_SESSION['username'];

	$sql = "SELECT activity FROM users WHERE username='$t';";
	$result = mysqli_query($conn, $sql);
	echo $result;

?>