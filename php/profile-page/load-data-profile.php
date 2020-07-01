<?php
	require_once("./php/connecttoDB.php");
	$username = $_SESSION['username'];
	$sql = "SELECT ImageURL,username,email,fullname,phone,birthday,address,ImageURL,gender FROM user WHERE username='$username' ";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();



?>
		



