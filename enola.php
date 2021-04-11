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
		echo "<button class='logout-button'><a href = 'logout.html'>Logout</a></button>";
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
  		<a href="recentMovies.html">Recent Movies</a>
  		<a href="genre.php">Genre</a>
  		<a href="profile.php">Profile</a>
	</div>
	<div class="breadcrumb">
		<a href="home.php">Home</a> >
		<a href="genre.php">Genre</a> >
		<a href="mystery.html">Mystery</a> >
		<a href="enola.php">Enola Holmes</a>
	</div>
</div>

<div class="main">
	<div class="col-left">
		<div class="card">
			<h1>Enola Holmes</h1>
			</div>
			<div class="card">
			<h2>Blog Post Title</h2>
			<h3>User Name</h3>
			<h5>How many reviews?</h5>
			<div class="content">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu ac tortor dignissim convallis. In egestas erat imperdiet sed euismod nisi porta lorem. Neque ornare aenean euismod elementum nisi. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Donec adipiscing tristique risus nec feugiat in fermentum posuere. Nisi est sit amet facilisis magna etiam tempor. Tristique senectus et netus et malesuada fames ac turpis. Ornare arcu dui vivamus arcu felis bibendum ut. Velit scelerisque in dictum non consectetur a erat nam at. Leo vel fringilla est ullamcorper eget nulla facilisi.</p>
			</div>
  			<img src="enola.jpg" class="logo" alt="Enola Holmes Movie Poster" width="215" height=300">
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
  			<img src="enola.jpg" class="logo" alt="Enola Holmes Movie Poster" width="215" height=300">
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
		<div class="card">
			<u><h2>Movie Facts</h2></u>
			<h3>Directed By:</h3><p> Harry Bradbeer</p>
			<h3>Actors:</h3><p>Millie Bobby Brown, Louis Partridge, Henry Cavill, Sam Claflin</p>
		</div>
		<div class="card">
			<h3>Description</h3><p>While looking for her mother, Enola Holmes outsmarts her older brother, Sherlock, to help a runaway lord.</p>
		</div>
		<div class="card">
		<h3>Release date:</h3><p>September 23, 2020</p>
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
