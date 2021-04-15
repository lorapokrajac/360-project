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
  		<a href="recentMovies.php">Recent Movies</a>
  		<a href="genre.php">Genre</a>
  		<a href="profile.php" class="active" >Profile</a>
	</div>
	<div class="breadcrumb">
		<a href="home.php">Home</a> >
		<a href="profile.php">Profile</a>
		
	</div>
</div>

<div class="main">


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
	echo "<div class='col-left'>";
		//you posts
		echo "<div class='card'>";
			echo "<h2>Your Posts:</h2>";
		echo "</div>";
		$uname =$_SESSION['username'];
		$sql = "SELECT blogTitle, reviews, poster, rating, datePosted, numLikes, numSaves FROM review r, movie m WHERE r.title = m.title AND username = '$uname' ORDER BY datePosted DESC LIMIT 1";
		$results = mysqli_query($connection, $sql);
		while($row = mysqli_fetch_assoc($results)){
			$blogTitle = $row['blogTitle']; 
			$review = $row['reviews']; 
			$poster = $row['poster']; 
			$rating = $row['rating']; 
			$dp = $row['datePosted'];
			$numLike  = $row['numLikes'];
			$numSave = $row['numSaves'];
		echo "<div class='card'>";
			echo "<h2>$blogTitle</h2>";
			echo "<h3><$uname></h3>";
			echo "<h5>Your review</h5>";
			echo "<div class='content'>";
				echo "<p>$review</p>";
			echo "</div>";
			 echo "<img src=$poster class='logo' alt=$title width='215' height=300>";
			echo "<h5>Your Rating: $rating</h5>";
			echo "<h5>Date posted: $dp </h5>";
			echo "<h5>Total Likes: $numLike     Total Saves: $numSave</h5>";
			
		echo "</div>";
		}
		//saved post
		echo "<div class='card'>";
			echo "<h2>Saved Posts:</h2>";
		echo "</div>";
		$sql = "SELECT blogTitle, reviews, poster, rating, datePosted, numLikes, numSaves FROM movie m, review r, saves s WHERE r.title = m.title AND s.rid = r.rid AND s.username ='$uname' ORDER BY datePosted  DESC LIMIT 1";
		$results = mysqli_query($connection, $sql);
		while($row = mysqli_fetch_assoc($results)){
			$blogTitle = $row['blogTitle']; 
			$review = $row['reviews']; 
			$poster = $row['poster']; 
			$rating = $row['rating']; 
			$dp = $row['datePosted'];
			$numLike  = $row['numLikes'];
			$numSave = $row['numSaves'];
		echo "<div class='card'>";
			echo "<h2>$blogTitle</h2>";
			echo "<h3><$uname></h3>";
			echo "<h5>Your review</h5>";
			echo "<div class='content'>";
				echo "<p>$review</p>";
			echo "</div>";
			 echo "<img src=$poster class='logo'  width='215' height=300>";
			echo "<h5>Date posted: $dp </h5>";
			echo "<h5>User's Rating: $rating</h5>";
			echo "<h5>Total Likes: $numLike     Total Saves: $numSave</h5>";
		echo "</div>";
		}
		//liked post
		echo "<div class='card'>";
			echo "<h2>Liked Posts:</h2>";
			echo "</div>";
		$sql = "SELECT blogTitle, reviews, poster, rating, datePosted,numLikes, numSaves FROM movie m, review r, likes l WHERE r.title = m.title AND l.rid = r.rid AND l.username ='$uname' ORDER BY datePosted  DESC LIMIT 1";
		$results = mysqli_query($connection, $sql);
		if($row = mysqli_fetch_assoc($results)){
			$blogTitle = $row['blogTitle']; 
			$review = $row['reviews']; 
			$poster = $row['poster']; 
			$rating = $row['rating']; 
			$dp = $row['datePosted'];
			$numLike  = $row['numLikes'];
			$numSave = $row['numSaves'];
		echo "<div class='card'>";
			echo "<h2>$blogTitle</h2>";
			echo "<h3><$uname></h3>";
			echo "<h5>Your review</h5>";
			echo "<div class='content'>";
				echo "<p>$review</p>";
			echo "</div>";
			echo "<img src=$poster class='logo' width='215' height=300>";
			echo "<h5>Date posted: $dp </h5>";
			echo "<h5>User's Rating: $rating</h5>";
			echo "<h5>Total Likes: $numLike     Total Saves: $numSave</h5>";
		echo "</div>";
		}


	echo "</div>";

	}
?>

	<div class="col-right">
		<div class="card">
			<h2>Profile Picture</h2>
			<div class="adfakeimg">profile</div><br>
		</div>
		<div class="card">
			<h2>Top Movies || Watchlist</h2>
			<div class="adfakeimg">Movie</div><br>
			<div class="adfakeimg">Movie</div><br>
			<div class="adfakeimg">Movie</div><br>
		</div>
	<div class="card">
		<button class="return-top">Back to Top</button> 
	</div>
	</div>	
	
</div>
	
<footer>
</footer>
</body>
</html>
