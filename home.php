<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<!-- FavIcon of the website(the icon in the tab of the browser)-->
	<link rel="apple-touch-icon" sizes="180x180" href="Images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="Images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="Images/favicon-16x16.png">
	<link rel="manifest" href="Images/site.webmanifest">
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- script used to hide typewriter effect-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- script to load footer and header -->
	<script>
        $(function() {
            $("#header").load("Header.html");
            $("#footer").load("Footer.html");
        });
    </script>
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>