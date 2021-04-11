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
  		<a href="genre.php" >Genre</a>	
  		<a href="profile.php">Profile</a>
	</div>
	<div class="breadcrumb">
		<a href="home.php">Home</a> >
		<a href="genre.php">Genres</a> >
		<a href="thriller.php">Thrillers</a>
		
		
	</div>
</div>

<div class="main">
		<div class="card">
			<h1>Thrillers</h1>
		</div>
		<div class="grid-container">
  			<div class="grid-item">
  				<h3>Parasite</h3>
  				<img src="parasite.jpg" class="logo" alt="Parasite Movie Poster" width="215" height=300">
  				<button class="posts"><a href = "parasite.php" > See Posts </a></button>
  			</div>
  			<div class="grid-item">
  				<h3>The Empty Man</h3>
 				<img src="empty.jpg" class="logo" alt="Palm Movie Poster" width="220" height=300">
  				<button class="posts"> <a href = "empty.php" > See Posts </a></button>
  			</div>  
  			<div class="grid-item">
  				<h3>I Care A Lot</h3>
 				<img src="care.jpg" class="logo" alt="I Care A Lot Movie Poster" width="220" height=300">
  				<button class="posts"> <a href = "care.php" > See Posts </a></button>
  			</div>
  		</div>		
</div>
	
<footer>

</footer>
</body>
</html>
