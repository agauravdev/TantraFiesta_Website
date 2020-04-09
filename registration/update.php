<?php
	session_start();
	require_once "server.php";

	if (!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}

	$sql = "UPDATE users SET username = '".$_GET['form_username']."' , institute = '".$_GET['institute']."', phone = '".$_GET['number']."', completed = 'Y' WHERE email = '".$_SESSION['email']."';";
	$conn->query($sql);
	header('Location: index.php');
	exit();
?>
