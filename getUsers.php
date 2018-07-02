<?php 
	session_start();
	include 'connection.php';

	$uid = $_SESSION['username'];

	$sql = "SELECT * FROM users;";
	$userlist = array();

	$result = $conn->query($sql);

	if(mysqli_num_rows($result) != 0) {
		while($row = mysqli_fetch_assoc($result)) {
			array_push($userlist, $row['username']);
		}
	}

	echo json_encode($userlist);

?>