<?php
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

?>
<html>
	<head>
		<title>Basic Login Script</title>
	</head>
	<body>
		<p>
			User <?php echo $_SESSION['username']; ?> Logged in
		</p>
		<p>
			<a href=logout.php>Log out</a>
		</p>
	</body>
</html>
