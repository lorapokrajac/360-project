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
	        session_start();
                $uname = $_SESSION['username'];
                $title = $_POST['title'];
	        $sql = "SELECT * FROM watchlist WHERE title = '$title'";
		$results = mysqli_query($connection, $sql);
		if (mysqli_num_rows($results) > 0) {
			mysqli_free_result($results);
		}else{
		    $sql = "INSERT INTO `watchlist` (`username`, `title`) VALUES ('$uname','$title')";
		    $results = mysqli_query($connection, $sql);
			echo "$title   $uname";
		}
    mysqli_close($connection);
    $_SESSION['title'] = $title;
    header("Location: http://localhost/Project/movie.php");
    exit();
    }
  
 ?>    

</html>