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
  		<a href="profile.php">Profile</a>
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
  		<div class="grid-item">
  		<h3>Comedy</h3>
  		<img src="yesDay.jpeg" class="logo" alt="Joker Movie Poster" width="215" height=300">
  		<button class="all"><a href = "comedy.php" > See All </a></button>
  		</div>
 		<div class="grid-item">
 		<h3>Action</h3>
 	 	<img src="godzillaKong.jpeg" class="logo" alt="Joker Movie Poster" width="215" height=300">
  		<button class="all"><a href = "action.php" > See All </a></button>
 		</div>
  		<div class="grid-item">
  		<h3>Thriller</h3>
 		<img src="parasite.jpg" class="logo" alt="Parasite Movie Poster" width="215" height=300">
  		<button class="all"> <a href = "thriller.php" > See All </a></button>
  		</div>  
  		<div class="grid-item">
  		<h3>Animated</h3>
 		<img src="mulan.jpg" class="logo" alt="Mulan Movie Poster" width="220" height=300">
  		<button class="all"><a href = "animated.php" > See All </a></button>
  		</div>
  		<div class="grid-item">
  		<h3>Documentary</h3>
 		<img src="kissGround.jpg" class="logo" alt="Kiss The Ground Movie Poster" width="215" height=300">
  		<button class="all"> <a href = "documentary.php" > See All </a></button>
  		</div>
  		<div class="grid-item">
  		<h3>Sci-Fi</h3>
 		<img src="palm.jpg" class="logo" alt="Palm Springs Movie Poster" width="220" height=300">
  		<button class="all"> <a href = "scifi.php" > See All </a></button>
  		</div>  
  		<div class="grid-item">
  		<h3>Horror</h3>
 		<img src="empty.jpg" class="logo" alt="Empty Man Movie Poster" width="220" height=300">
  		<button class="all"> <a href = "horror.php" > See All </a></button>
  		</div>  
  		<div class="grid-item">
  		<h3>Romance</h3>
 		<img src="allTheBoys.jpg" class="logo" alt="To All The Boys Movie Poster" width="210" height=300">
  		<button class="all"> <a href = "romance.php" > See All </a></button>
  		</div>
  		<div class="grid-item">
  		<h3>Mystery</h3>
 		<img src="enola.jpg" class="logo" alt="Enola Holmes Movie Poster" width="220" height=300">
  		<button class="all"> <a href = "mystery.php" > See All </a></button>
  		</div>
</div>
			
</div>
	
<footer>

</footer>
</body>
</html>
