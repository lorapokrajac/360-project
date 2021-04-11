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
		if(isset($_POST["username"]) && isset($_POST["password"])){
			$username = $_POST["username"];
			$password = $_POST["password"];
		}
	}


	$sql = "SELECT username, password FROM users WHERE username = ?";
	$stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 's',$username);
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
 	
 	$row = mysqli_fetch_assoc($results);
 	if (mysqli_num_rows($results) > 0) {
 		if($_SERVER["REQUEST_METHOD"] == "POST"){
 			if($row['password'] == md5($password)){
				header( 'Location: home.html' );
 			}else {
    			echo "Username and/or password are invalid";
				echo "<a href =".'login.html'."></a>";
    		}
 		}
 	} else {
 		 echo "Username and/or password are invalid";
 		 echo "<a href = 'login.html'> Try again </a>";
 	}
 	
 	mysqli_free_result($results);
    mysqli_close($connection);
}
?>
</html>
