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
		
			$com = $_POST["comment"];
			$title = $_POST["title"];
			$reviewer = $_POST["reviewer"];
			$uname = $_POST["uname"];
			$rdate = date("m-d-Y");
	
	}
      $sql = "INSERT INTO comment (`reviewer`, `title`, `username`, `comments`, `datePosted`) VALUES ('$reviewer','$title','$uname','$com',now())";
      $results = mysqli_query($connection, $sql);
      header( 'Location: http://localhost/Project/home.php' );			
		
	

    
    mysqli_close($connection);
}
  
  
  ?>
  
  
  
</html>