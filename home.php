<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();

    $username_db=$_SESSION['username'];
    $userid_db=$_SESSION['userid'];
    $email_db=$_SESSION['email'];
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<a href="grid/clixgrid.php">Visit W3Schools.com!</a>
	<?php

		echo $username_db;
		echo $userid_db;

	?>
</body>
</html>