<?php
require_once "config.php";
require_once "server.php";
if (isset($_SESSION['access_token']))
	$gClient->setAccessToken($_SESSION['access_token']);
else if (isset($_GET['code'])) {
	$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
	$_SESSION['access_token'] = $token;
} else {
	header('Location: login.php');
	exit();
}

$oAuth = new Google_Service_Oauth2($gClient);
$userData = $oAuth->userinfo_v2_me->get();

$_SESSION['id'] = $userData['id'];
$_SESSION['email'] = $userData['email'];
$_SESSION['picture'] = $userData['picture'];
$_SESSION['lname'] = $userData['familyName'];
$_SESSION['fname'] = $userData['givenName'];

$sql = "SELECT email FROM users WHERE email='".$_SESSION['email']."';";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
	header('Location: index.php');
}
else
{
	
	$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, completed) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss", $firstname, $lastname, $email, $complete);
	$firstname = $_SESSION['fname'];
	$lastname = $_SESSION['lname'];
	$email = $_SESSION['email'];
	$complete = "N";
	$stmt->execute();
}
header('Location: index.php');
exit();
?>