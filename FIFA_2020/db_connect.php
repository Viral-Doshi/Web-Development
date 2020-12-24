<?php
$server_name = "localhost";
$username = "root";
$pass = "";
$db = "fifa";
$conn = mysqli_connect($server_name, $username, $pass) or die("Could Not Connect to Server : ".mysqli_connect_error());

mysqli_select_db($conn, $db) or die("select db $db failed : ".mysqli_error($conn));


?>
