<?php
session_start();
include('db.php');
if(isset($_SESSION["username"])){
	$username = $_SESSION["username"];
	$query = "SELECT * FROM `users` WHERE UserName='$username'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$row = mysqli_fetch_assoc($result); 
			//printf ("%s (%s)\n", $row["ID"], $row["FirstName"], $row["lastName"], $row["UserName"]);
	$_SESSION["ID"] = $row["ID"];
	$_SESSION['FirstName'] = $row['FirstName'];
	$_SESSION['Color'] = $row['Color'];		
}else{
header("Location: login.php");
exit(); }
?>