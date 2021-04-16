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
	$login = false;
    $admin=false;
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
	if($_SESSION['admin']==true){
		$admin=true;
	}
	?>
	<div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search" name="search">
      <?php
	  if($admin==true){
	  echo "<input type='checkbox' id='user' name='user' value='user'>
  	<label for='user'>User</label>";
	}
	?>
	  <input type="checkbox" id="post" name="post" value="post">
  	<label for="post">Post</label>
      <button type="submit" class="search-button">Submit</button>
    </form>
  </div> 
	
	<div class="top-nav">
  		<a href="home.php">Main Page</a>
  		<a href="recentMovies.php" class="active">Recent Movies</a>
  		<a href="genre.php">Genre</a>
  		<?php 
			if($login){
  				echo "<a href='profile.php'>Profile</a>";
			}
		?>
	</div>
	<div class="breadcrumb">
		<a href="home.php">Home</a> >
		<a href="recentMovies.php">Recent Movies</a>
		
	</div>
</div>

<div class="main">
		<div class="card">
			<h2>Recent Movies</h2>
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
    		$sql = "SELECT title, poster, mid FROM movie ORDER BY mid DESC LIMIT 9";
	        $results = mysqli_query($connection, $sql);
		$count = 0;
		while($row = mysqli_fetch_assoc($results)){
  			$title = $row['title'];
			$poster = $row['poster'];
			echo   "<div class='grid-item'>";
			echo   "<form action = 'movie.php' method = 'post' id='$title'>";
  			echo	"<h3>$title</h3>";
			if($count < 2)
				{
  				echo	"<img src='$poster' class='logo' alt= $title.'Poster' width='215' height=300>";
  			}
			else
			{
				echo	"<img src='$poster' class='logo' alt= $title.'Poster' width='220' height=300>";
				$count = 0;
			}
			echo    "<input type='hidden' value='$title' name='title' />";
			echo    "</form>";
			echo    "<button class = 'save' type='submit' form='$title' value='Submit'>See more</button>";
			if($login){
				echo   "<form action = 'watchlist.php' method = 'post' id= $title.'save'>";
				echo    "<input type='hidden' value='$title' name='title' />";
				echo    "</form>";
				echo    "<button class = 'save' type='submit' form= $title.'save' value='Submit'>Add to watchlist</button>";
			}
			echo    "</div>";
			$count++;     
		}
    		mysqli_free_result($results);
    		mysqli_close($connection);
		}
		?>
  		
</div>
			
</div>
	
<footer>
</div>
		<a href="#top" class="return-top">Top</a>
	</div>	
</footer>
</body>
</html>
