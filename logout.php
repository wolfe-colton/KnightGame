<?php
session_start();
// destroys all sessions
if(session_destroy())
{
// redirects to home page
header("Location: login.php");
}
?>