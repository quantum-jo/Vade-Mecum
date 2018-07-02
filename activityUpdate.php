<?php 
	session_start();
	include 'connection.php';

	$uid = $_SESSION['username'];

	$q = $_GET['q'];


	$sql = "UPDATE users SET activity='$q' WHERE username='$uid';";
	$conn->query($sql);
?>