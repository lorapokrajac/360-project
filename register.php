<!DOCTYPE html>
<html>

<?php

$host = "localhost";
$database = "360_project";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}
else
{
    //good connection, so do you thing
    if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["profilePic"]) && isset($_POST["password"])){
			$firstname = $_POST["firstname"];
			$lastname = $_POST["lastname"];
			$username = $_POST["username"];
			$email = $_POST["email"];
			$profilepic = $_POST["profilePic"];
			$password = $_POST["password"];
		}
	}

    $sql = "SELECT username, email FROM users WHERE username = '$username' AND email = '$email' ";
    $results = mysqli_query($connection, $sql);

	if (mysqli_num_rows($results) > 0) {
		echo "User already exists with this name and/or email";
		echo "<a href = 'lab9-1.html'> Return to user entry </a>";
		mysqli_free_result($results);
	} else {
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$sql = "INSERT INTO users (username, firstname, lastname, email, profilePic, password) VALUES ('$username', '$firstname', '$lastname', '$email', '$profilePic', md5('$password'))";
			$results = mysqli_query($connection, $sql);
			echo "An account for the user ".$firstname." has been created";
		}
	}

    
    mysqli_close($connection);
}
?>
</html>
