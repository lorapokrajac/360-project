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
	if(isset($_POST['genre'])){
		$genre = $_POST['genre'];
		$_SESSION['genre'] = $genre;
	}else{
		$genre = $_SESSION['genre'];
	}
			
	$login = false;
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    		echo "<div class='login-register'>";
		echo "<button class='logout-button'><a href = 'logout.php'>Logout</a></button>";
		echo "</div>";
		$login = true;
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
  		<a href="genre.php" >Genre</a>	
  		<?php
		if ($login) {
			echo "<a href='profile.php'>Profile</a>";
		}
		?>
	</div>
	<div class="breadcrumb">
		<a href="home.php">Home</a> >
		<a href="genre.php">Genre</a> > 
		<?php
		 echo "<a href= 'genreSeeMore.php'> $genre </a>";
		?>
	</div>
</div>
<div class="main">
	<div class="card">
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
    		//69
    		$sql = "SELECT title, poster FROM movie WHERE genre = '$genre';";
	        $results = mysqli_query($connection, $sql);
		echo "<h1>$genre</h1>";
		echo "</div>";
		echo "<div class='grid-container'>";
   		while ($row = mysqli_fetch_assoc($results)){
			$title = $row['title'];
			$poster = $row['poster'];
			echo   "<div class='grid-item'>";
			echo   "<form action = 'movie.php' method = 'post' id='$title'>";
  			echo	"<h3>$title</h3>";
  			echo	"<img src='$poster' class='logo' alt='Yes Day Movie Poster' width='215' height=300>";
  			echo    "<input type='hidden' value='$title' name='title' />";
			echo    "</form>";
			echo    "<button class = 'save' type='submit' form='$title' value='Submit'>See more</button>";
			echo   "<form action = 'watchlist.php' method = 'post' id= $title.'save'>";
			echo    "<input type='hidden' value='$title' name='title' />";
			echo    "</form>";
			echo    "<button class = 'save' type='submit' form= $title.'save' value='Submit'>Add to watchlist</button>";
			
			echo    "</div>";
			
		}

    mysqli_free_result($results);
    mysqli_close($connection);
}

?>

		</div>			
</div>
</body>
</html>
