<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
session_start();
// if form is submitted, insert values into the database
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checks if the user already exists in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".sha1($password)."'"; //sha1 encryption on password
		
	/*$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
			while ($info = mysqli_fetch_assoc($result)) {
			//printf ("%s (%s)\n", $row["ID"], $row["FirstName"], $row["lastName"], $row["UserName"]);
			$_SESSION['ID'] = $info["ID"];
			$_SESSION['firstName'] = $info["firstName"];
		}	
	    	//$_SESSION['username'] = $username;
            // Redirects the user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{*/
	
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
			//$ID = $rows[0];
			//$_SESSION['ID'] = $ID;
	    	$_SESSION['username'] = $username;
            // Redirects the user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
	<div class="form">
		<h1>Log In</h1>
		<form action="" method="post" name="login">
		<input type="text" name="username" placeholder="Username" required />
		<input type="password" name="password" placeholder="Password" required />
		<input name="submit" type="submit" value="Login" />
		</form>
		<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
	</div>
<?php } ?>
</body>
</html>