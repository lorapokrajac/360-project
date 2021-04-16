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
			$rdate = date("Y-m-d");
      $blogTitle = $_POST["blogTitle"];
	
	}
      $sql = "SELECT rid FROM review ORDER BY  rid DESC LIMIT 1";
      $rid = $row["rid"];
      $results = mysqli_query($connection, $sql);
	
      while($row = mysqli_fetch_assoc($results)){
          $rcount = $row['rid'] + 1;
	  break;
          
      }
      $rid = $rcount+1;
	
      $sql = "INSERT INTO `review` (`rid`, `username`, `reviews`, `title`, `rating`, `blogTitle`, `datePosted`) VALUES ('$rid', '$uname', '$review', '$title', '$rating','$blogTitle', '$rdate')";
      $results = mysqli_query($connection, $sql);
      header( 'Location: http://localhost/Project/movie.php' );			
		
	

    
    mysqli_close($connection);
}
  
  
  ?>
  
  
  
</html>