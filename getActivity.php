<?php 
	session_start();
	include 'connection.php';

	$t = $_SESSION['username'];

	$sql = "SELECT * FROM users WHERE username='$t'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
	echo json_encode($row['activity']);
	

?>