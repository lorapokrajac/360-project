<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="home.css">
</head>
<body>
<div class="header">	
	<img src="logo.jpg" class="logo" alt="Movie Logo" width="70" height="70">
	<?php 
	session_start();
	if(isset($_POST['title'])){
		$title = $_POST['title'];
		$_SESSION['title'] = $title;
	}else{
		$title = $_SESSION['title'];
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
  		<a href="recentMovies.php">Recent Movies</a>
  		<a href="genre.php">Genre</a>
		<?php 
			if($login){
  				echo "<a href='profile.php'>Profile</a>";
			}
		?>
	</div>
	<div class="breadcrumb">
		<a href="home.php">Home</a> >
		<a href="genre.php">Genre</a> >
		<?php
			$genre = $_SESSION['genre'];
		     echo "<a href= 'genreSeeMore.php'> $genre </a> >";
			echo "<a href = 'movie.php'> $title </a>";
		?>
	</div>
</div>

<div class="main">
	<div class="col-left">
		<div class="card">
			<?php
			echo "<h1>$title</h1>";
			?>
			</div>
			<div class="card">
			<h2>Blog Post Title</h2>
			<h3>User Name</h3>
			<h5>How many reviews?</h5>
			<div class="content">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu ac tortor dignissim convallis. In egestas erat imperdiet sed euismod nisi porta lorem. Neque ornare aenean euismod elementum nisi. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Donec adipiscing tristique risus nec feugiat in fermentum posuere. Nisi est sit amet facilisis magna etiam tempor. Tristique senectus et netus et malesuada fames ac turpis. Ornare arcu dui vivamus arcu felis bibendum ut. Velit scelerisque in dictum non consectetur a erat nam at. Leo vel fringilla est ullamcorper eget nulla facilisi.</p>
			</div>
  			<img src="parasite.jpg" class="logo" alt="Parasite Movie Poster" width="215" height=300">
			<h5>User's Rating: </h5>
			<h5>Date Posted</h5>
			<div class="card">
				<u><h3>Comments</h3></u>
				<div class = "card">
					<div class="profilepic">profile picture</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
				</div>
			</div>
		</div>
		<div class="card">
			<h2>Blog Post Title</h2>
			<h3>User Name</h3>
			<h5>How many reviews?</h5>
			<div class="content">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu ac tortor dignissim convallis. In egestas erat imperdiet sed euismod nisi porta lorem. Neque ornare aenean euismod elementum nisi. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Donec adipiscing tristique risus nec feugiat in fermentum posuere. Nisi est sit amet facilisis magna etiam tempor. Tristique senectus et netus et malesuada fames ac turpis. Ornare arcu dui vivamus arcu felis bibendum ut. Velit scelerisque in dictum non consectetur a erat nam at. Leo vel fringilla est ullamcorper eget nulla facilisi.</p>
			</div>
  			<img src="parasite.jpg" class="logo" alt="Parasite Movie Poster" width="215" height=300">
			<h5>User's Rating: </h5>
			<h5>Date Posted</h5>
			<div class="card">
				<u><h3>Comments</h3></u>
				<div class = "card">
					<div class="profilepic">profile picture</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-right">
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
    		$sql = "SELECT director, actors, description, awards, boxScore, rdate FROM movie WHERE title = '$title'";
	        $results = mysqli_query($connection, $sql);
		while($row = mysqli_fetch_assoc($results)){
		        echo "<div class='card'>";
			$director = $row['director'];
			$actors = $row['actors'];
			$awards = $row['awards'];
     			$date = $row['rdate'];
			$description = $row['description'];
			$boxScore = $row['boxScore'];
			echo "<u><h2>Movie Facts</h2></u>";
			echo "<h3>Directed By:</h3><p>$director</p>";
			echo "<h3>Actors:</h3><p>$actors</p>";
			if($awards != NULL){
				echo "<h3>Awards:</h3><p>$awards</p>";
			}
			if($boxScore != NULL){
				if($boxScore < 1){
				$boxScore = $boxScore*1000;
					echo "<h3>Box Score: </h3><p>$boxScore Thousand</p>";
				}else if($boxScore < 1000){
					echo "<h3>Box Score: </h3><p>$boxScore Million </p>";
				}
				else{
					$boxScore = $boxScore/1000;
					echo "<h3>Box Score: </h3><p>$boxScore Billion </p>";
				}
			}
			echo "</div>";
			echo "<div class='card'>";
			echo "<h3>Description</h3><p>$description</p>";
			echo "</div>";
    			echo "<div class='card'>";
			echo "<h3>Release date:</h3><p>$date</p>";
			echo "</div>";
			break;
		}
    		mysqli_free_result($results);
    		mysqli_close($connection);
		}

	?>
		
		<div class="card">
		<button class="return-top">Back to Top</button> 
	</div>
	</div>	
</div>
	
<footer>

</footer>
</body>
</html>
