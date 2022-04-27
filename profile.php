<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'project';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
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
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>