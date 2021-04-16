<?php
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);
$_SESSION['admin']=false;
header("Location:home.php");
?>
