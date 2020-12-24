<?php
session_start();

if(!$_SESSION['IS_ADMIN']){
    $_SESSION['login_error'] = "Please LogIn First to Continue";
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title> FIFA 2020 | ADMIN </title>
    <style type="text/css">
        body {
            color: white;
            background-image: url(images/admin_bg.jpg);
            background-attachment:fixed;
             /* background-size: 300px 100px; */
        }
        table, th, td {
            border: 1px solid white;
        }
    </style>
    <link rel="stylesheet" href="css/home_styles.css" type="text/css" />
</head>

<body>
<div class="header">
	<div class="container">
		<!-- <div class="logo">
			<a href="home_page.php"><img src="images/logo2-cutout.png" alt="" vspace=20></a>
		</div> -->
		<div class="log-out">
			<a href="logout.php"><img src="images/logout-32.png" alt="" vspace=20></a>
		</div>
		<div class="navigation">
			<ul class="navig cl-effect-3" >
				<li><a href="admin_home.php">Home</a></li>
				<li><a href="accounts_admin.php">Accounts</a></li>
				<li><a href="admin_card.php">Cards</a></li>
				<li><a href="admin_events.php">Events</a></li>
				<li><a href="club_admin.php">Clubs</a></li>
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
