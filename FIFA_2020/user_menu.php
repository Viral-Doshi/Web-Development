<?php
session_start();

if(!$_SESSION['IS_USER']){
    $_SESSION['login_error'] = "Please LogIn First to Continue";
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title> FIFA 2020 | Home </title>
    <link rel="stylesheet" href="css/home_styles.css" type="text/css" />
</head>

<body>
<div class="header">
	<div class="container">
		<div class="logo">
			<a href="home_page.php"><img src="images/logo2-cutout.png" alt="" vspace=20></a>
		</div>
		<div class="log-out">
			<a href="logout.php"><img src="images/logout-32.png" alt="" vspace=20></a>
		</div>
		<div class="navigation">
			<ul class="navig cl-effect-3" >
				<li><a href="home_page.php">Home</a></li>
				<li><a href="profile_page.php">Profile</a></li>
				<li><a href="cards_page.php">Cards</a></li>
				<li><a href="events_page.php">Events</a></li>
				<li><a href="contact_page.php">Contact</a></li>
			</ul>
			<div class="search-bar">
				<input type="text" placeholder="Search" required="" />
				<input type="submit" value="" />
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>