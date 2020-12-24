<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>FIFA Mobile 2020 | Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Gaming Login Form Widget Tab Form,Login Forms,Sign up Forms,Registration Forms,News letter Forms,Elements"/>
	<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<div class="padding-all">
		<div class="header">
			<h1><img src="images/5.png" alt=" "> FIFA Mobile 2020 <img src="images/5.png" alt=" "></h1>
		</div>

		<div class="design-w3l">
			<div class="mail-form-agile">
				<form action="login_check.php" method="post">
					<input type="text" name="IGN" placeholder= "In Game Name"/>
					<input type="password"  name="pwd" class="padding" placeholder="Password"/>
					<input type="submit" name="submit" value="Log In">
				</form>
			</div>

			<div class="clear"> </div>
		</div>
	</div>
	<?php
	if(isset($_SESSION['login_error']))
		echo "<center>".$_SESSION['login_error']."</center>";
	?>
</body>
</html>
