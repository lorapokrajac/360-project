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
	$admin=false;
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
	if($_SESSION['admin']==true){
		$admin=true;
	}
	?>
	
	<div class="search-container">
    <form method="post" action="search.php">
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
  		<a href="recentMovies.php" >Recent Movies</a>
  		<a href="genre.php" >Genre</a>	
  		<a href="profile.php">Profile</a>
	</div>
	<div class="breadcrumb">
		<a href="home.php">Home</a> >
		<a href="genre.php">Genre</a> >
		<a href="action.php">Action</a>
	</div>
</div>

<div class="main">
		<div class="card">
			<h1>Action</h1>
		</div>
		<div class="grid-container">
  			<div class="grid-item">
  				<h3>Mulan</h3>
  				<img src="mulan.jpg" class="logo" alt="Mulan Movie Poster" width="215" height="300">
  				<button class="posts"><a href = "mulan.php" > See Posts </a></button>
  			</div>
  			<div class="grid-item">
  				<h3>Godzilla Vs. Kong</h3>
 				<img src="godzillaKong.jpeg" class="logo" alt="Gorilla Vs Kong Movie Poster" width="220" height="300">
  				<button class="posts"> <a href = "godzillaKong.php" > See Posts </a></button>
  			</div>  
		</div>
</div>
	
<footer>
		</div>
		<a href="#top" class="return-top">Top</a>
	</div>	
</footer>
</body>
</html>