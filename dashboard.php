<?php
require('db.php');
include("auth.php"); //makes sure user is logged in
////session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
<style>
	html{
		background-color: <?php echo $_SESSION['Color'] ?>;
	}
</style>

</head>
<body>
<div class="form">
<p>Dashboard</p>
<p>This area is also secure</p> 
<p>Hello <?php echo $_SESSION['FirstName']; ?>, You can view your Game Info Here</p>

<p><a href="index.php">Home</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>