<?php

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

<h3>Your Current Selections:</h3>

<?php

$id = $_SESSION['ID'];

$mysqli = new mysqli("sulley.cah.ucf.edu", "co297720", "3KblNsL0azpFkGj8", "co297720");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT users.ID, users.FirstName, users.LastName, users.UserName, users.Email, users.Password, users.color, users.avatar, users.user_since, GameInfo.Game_ID, GameInfo.Game_Name, GameInfo.Game_Image, GameInfo.Game_Console, GameInfo.Game_Link, GameInfo.Game_Played, GameInfo.Game_Current, GameInfo.Game_Want FROM users INNER JOIN GameInfo ON users.ID = GameInfo.User_ID WHERE user.ID = ".$id." ";
$result = $mysqli->query($query);

/* numeric array */
$row = $result->fetch_array(MYSQLI_NUM);
printf ("%s (%s)\n", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16]);

/* associative array 
$row = $result->fetch_array(MYSQLI_ASSOC);
printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);*/

/* associative and numeric array 
$row = $result->fetch_array(MYSQLI_BOTH);
printf ("%s (%s)\n", $row[0], $row["CountryCode"]);*/

/* free result set */
$result->free();

/* close connection */
$mysqli->close();
?>
<p><a href="index.php">Home</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>