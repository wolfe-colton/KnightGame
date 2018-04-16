<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php
require('db.php');
session_start();
// if form  is submitted, insert values into the database
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$salt = "rcevrevr56456464"; //sets salt value to a random string
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$color = stripslashes($_REQUEST['color']);
	$color = mysqli_real_escape_string($con,$color);
	$firstName = stripslashes($_REQUEST['firstName']);
	$firstName = mysqli_real_escape_string($con,$firstName);
	$lastName = stripslashes($_REQUEST['lastName']);
	$lastName = mysqli_real_escape_string($con,$lastName);
	$date = date('Y-m-d');
	//$trn_date = date("Y-m-d H:i:s");
	//Table for password 
        $query = "INSERT into `users` (firstName, lastName, username, password, email, color, user_since)
VALUES ('$firstName', '$lastName', '$username', '".sha1($password)."', '$email', '$color', '$date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>Congrats! You are now registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
	<div class="form">
		<h1>Registration</h1>
			<form name="registration" action="" method="post">
				<input type="text" name="username" placeholder="Username" required />
				<input type="text" name="firstName" placeholder="FirstName" required />
				<input type="text" name="lastName" placeholder="LastName" required />
				<input type="email" name="email" placeholder="Email" required />
				<input type="password" name="password" placeholder="Password" required />
				<select placeholder="Color" name="color" required>
				  <option value="blue">Blue</option>
				  <option value="red">Red</option>
				  <option value="green">Green</option>
				  <option value="silver">Silver</option>
				</select>
				<!--<input type="text" name="color" placeholder="Color" required />-->
				<input type="submit" name="submit" value="Register" />
			</form>
	</div>
<?php } ?>
</body>
</html>