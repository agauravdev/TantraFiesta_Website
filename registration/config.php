<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("959446778857-s3mri220bgt51fn06imioc4io7cs3oct.apps.googleusercontent.com");
	$gClient->setClientSecret("RHeRSrowzozdmYd0RiskpRfn");
	$gClient->setApplicationName("Tantrafiesta");
	$gClient->setRedirectUri("https://tantrafiesta.in/registration/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
