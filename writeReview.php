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
      if($_SERVER["REQUEST_METHOD"] == "POST"){
		
			$rating = $_POST["rating"];
			$title = $_POST["title"];
			$review = $_POST["review"];
			$uname = $_POST["uname"];
      $blogTitle = $_POST["blogTitle"];
	
	}
      $sql = "SELECT `rid` FROM `review` ORDER BY `rid` DESC LIMIT 1";
      $results = mysqli_query($connection, $sql);
      while($row = mysqli_num_rows($results)){
          $rid = $row["rid"];
          break;
      }
	
	$rid = $rid + 1;
      $sql = "INSERT INTO `review` (`rid`, `username`, `reviews`, `title`, `rating`, `blogTitle`) VALUES ('$rid', '$uname', '$review', '$title', '$rating','$blogTitle')";
      $results = mysqli_query($connection, $sql);
      header( 'Location: http://localhost/Project/movie.php' );			
		
	

    
    mysqli_close($connection);
}
  
  
  ?>
  
  
  
</html>
