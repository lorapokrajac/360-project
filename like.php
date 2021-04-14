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
               $rid = $_POST['rid'];
               $insert = $_POST['like'];


    		$sql = "SELECT * FROM `likes` WHERE `username` = '$uname' AND `rid` = '$rid' AND `like` = '$insert' ";
    		$results = mysqli_query($connection, $sql);
	if (mysqli_num_rows($results) > 0) {
		mysqli_free_result($results);
	} else {  
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$sql = "INSERT INTO `likes` (`rid`, `username`, `like`) VALUES ('$rid', '$uname', '$insert')";
			$results = mysqli_query($connection, $sql);
		}
			
	}
    mysqli_close($connection);
    header("Location: http://localhost/Project/movie.php");
    exit();
    }
  
 ?>    

</html>
