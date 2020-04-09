<?php
	session_start();
	require_once "server.php";
	
	if (!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}
	$sql = "SELECT id,firstname,username FROM users WHERE email='".$_SESSION['email']."';";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$username_1 = $row['firstname'];
	$username_1 = substr($username_1, 0,3);
	$username_1 = strtoupper($username_1);
	$username_2 = $row['id'];
	$username = $username_1.$username_2;
?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profile | Tantrafiesta</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="tantrafiesta" />
	<meta name="keywords" content="bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="IIITN" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="../css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
<![endif]-->
<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<link rel="icon" type = "image/x-icon" href="../assets/images/white_logo.png">
<style>
	#fh5co-main{
		background-image: url("assets/images/1.jpg");

		/* Full height */
		height: 100%;

		/* Center and scale the image nicely */
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>
</head>
<body style="height: 100%">
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h1 id="fh5co-logo"><a href="../index.html">IIITN</a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li class="fh5co-active"><a href="index.php">Profile</a></li>
					<li><a href="../index.html">Home</a></li>
					<li><a href="events.html">Events</a></li>
					<li><a href="../glimpse.html">Glimpse's</a></li>
					<li><a href="../sponsorus.html">Sponsor Us</a></li>
					<li><a href="../aboutus.html">About Us</a></li>
					<li><a href="../contactus.html">Contact Us</a></li>
					<li><a href="../webd/webd.html">WebD Team</a></li>
				</ul>
			</nav>

			<div class="fh5co-footer">
				<p><small>&copy; 2019 Tantrafiesta. All Rights Reserved.</span></small></p>
				<ul>
					<li><a href="https://www.facebook.com/events/411138882869105/" target="_blank"><i class="icon-facebook2"></i></a></li>
					<li><a href="https://mobile.twitter.com/NagpurIIITN" target="_blank"><i class="icon-twitter2"></i></a></li>
					<li><a href="https://www.instagram.com/tantrafiesta/" target="_blank"><i class="icon-instagram"></i></a></li>
					<li><a href="https://www.youtube.com/channel/UCcQEXD69BdMFyU8872dU2_A/" target="_blank"><i class="icon-youtube"></i></a></li>
				</ul>
			</div>

		</aside>

		<div id="fh5co-main" style="height: 100vh; background-image: none;">
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" style="color: black;" data-animate-effect="fadeInLeft">Profile</h2>
				<div class="row row-bottom-padded-md">
					<form action="update.php" method="get">					
						<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Username:</span>
						<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $username;?>" name="form_username" readonly>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon2">Name:</span>
							<input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2" value="<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];?>" readonly>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon">Email:</span>
							<input type="text" class="form-control" value="<?php echo $_SESSION['email'];?>" readonly>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon">Institute: *</span>
							<input type="text" class="form-control" name="institute" required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon">Phone Number: *</span>
							<input type="text" class="form-control" name="number" required>
						</div>
						<br>
						<input type="submit" class="btn btn-default">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="../js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="../js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="../js/jquery.flexslider-min.js"></script>


<!-- MAIN JS -->
<script src="../js/main.js"></script>

</body>
</html>
