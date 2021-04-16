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
		$_SESSION['title'] = $_POST['title'];
               $rid = $_POST['rid'];
               $insert = $_POST['like'];
	       $sql = "SELECT numLikes, numSaves FROM review WHERE rid = '$rid'";
	       $results = mysqli_query($connection, $sql);
		while($row = mysqli_fetch_assoc($results)){
			$numLike = $row['numLike'];
			$numSave = $row['numSave'];
		}
		if($insert == 'like'){
    			$sql = "SELECT * FROM `likes` WHERE `username` = '$uname' AND `rid` = '$rid' ";
    			$results = mysqli_query($connection, $sql);
			    if (mysqli_num_rows($results) > 0) {
				    mysqli_free_result($results);
			    } else {  
				    if($_SERVER["REQUEST_METHOD"] == "POST"){
			    	  $sql = "INSERT INTO `likes` (`rid`, `username`) VALUES ('$rid', '$uname')";
			    	  $results = mysqli_query($connection, $sql);
				  $numLike = $numLike + 1;
				  $sql = "UPDATE `review` SET numLikes = '$numLike' WHERE rid = '$rid'";
				  $results = mysqli_query($connection, $sql);
			      } 
		      }
      }
    else if($insert == 'save'){
			$sql = "SELECT * FROM `saves` WHERE `username` = '$uname' AND `rid` = '$rid' ";
    			$results = mysqli_query($connection, $sql);
			if (mysqli_num_rows($results) > 0) {
				mysqli_free_result($results);
			} else {  
				if($_SERVER["REQUEST_METHOD"] == "POST"){
				$sql = "INSERT INTO `saves` (`rid`, `username`) VALUES ('$rid', '$uname')";
				$results = mysqli_query($connection, $sql);
				$numSave = $numSave + 1;
				$sql = "UPDATE `review` SET numSaves = '$numSave' WHERE rid = '$rid'";
				$results = mysqli_query($connection, $sql);
			  }
      }
		}
			
	
    mysqli_close($connection);
    header("Location: movie.php");
    exit();
    }
  
 ?>    

</html>