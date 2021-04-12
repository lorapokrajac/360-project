<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="home.css">
<script type="text/javascript" src="button.js"></script>

</head>
<body>

<div class="header">	
	<img src="logo.jpg" class="logo" alt="Movie Logo" width="70" height="70">
	<?php 
	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    	echo "<div class='login-register'>";
		echo "<button class='logout-button'><a href = 'logout.php'>Logout</a></button>";
		echo "</div>";
	}
	else {
    	echo "<div class='login-register'>";
		echo "<button class='login-button'><a href = 'login.html'>Login</a></button>"; 
		echo "<button class='register-button'><a href = 'register.html' > Register </a></button>";
		echo "</div>";
	}
	?>
	<div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search" name="search">
      <button type="submit" class="search-button">Submit</button>
    </form>
  </div> 
	
	<div class="top-nav">
  		<a href="home.php">Main Page</a>
  		<a href="recentMovies.php" >Recent Movies</a>
  		<a href="genre.php" class="active">Genre</a>	
  		<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			echo "<a href='profile.php'>Profile</a>";
		}
		?>
		</div>
	<div class="breadcrumb">
		<a href="home.php">Home</a> >
		<a href="genre.php">Genre</a>
		
	</div>
</div>

<div class="main">
		<div class="card">
			<h2>Genres</h2>
		</div>
		<div class="grid-container">
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
    		$sql = "SELECT DISTINCT(genre) FROM movie;";
	        $results = mysqli_query($connection, $sql);
   		while ($row = mysqli_fetch_assoc($results)){
			$genre = $row['genre'];
			$sql2 = "SELECT title, poster FROM movie WHERE genre = '$genre';";
			$results2 = mysqli_query($connection, $sql2);
			echo "<div class='grid-item'>";
			echo "<form action = 'genreSeeMore.php' method= 'post' id='$genre'>";
  			echo "<h3>$genre</h3>";
			while ($row2 = mysqli_fetch_assoc($results2)){
				$poster = $row2['poster'];
				$title = $row2['title'];
  				echo "<img src= '$poster' class='logo' alt= '$title' width='215' height=300>";
				break;
			}
			echo "<input type='hidden' value='$genre' name='genre' />";
			echo "</form>";
			echo "<button type='submit' form='$genre' value='Submit'>See more</button>";
			echo "</div>";
			
		}

  		mysqli_free_result($results);
    		mysqli_close($connection);
		}

		?>
</div>
			
</div>
	
<footer>

</footer>
</body>
</html>
