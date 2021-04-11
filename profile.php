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
	<div class="col-left">
		<div class="card">
			<h2>Your Posts:</h2>
			</div>
			<div class="card">
			<h2>Blog Post Title</h2>
			<h3>Your Name</h3>
			<h5>Your review</h5>
			<div class="content">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu ac tortor dignissim convallis. In egestas erat imperdiet sed euismod nisi porta lorem. Neque ornare aenean euismod elementum nisi. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Donec adipiscing tristique risus nec feugiat in fermentum posuere. Nisi est sit amet facilisis magna etiam tempor. Tristique senectus et netus et malesuada fames ac turpis. Ornare arcu dui vivamus arcu felis bibendum ut. Velit scelerisque in dictum non consectetur a erat nam at. Leo vel fringilla est ullamcorper eget nulla facilisi.</p>
			</div>
			<div class="post-movie">movie poster</div>
			<h5>Your Rating: </h5>
			<h5>Date Posted</h5>
			<button class="more">See More</button>
		</div>
		<div class="card">
			<h2>Saved Posts:</h2>
			</div>
		<div class="card">
			<h2>Blog Post Title</h2>
			<h3>User's Name</h3>
			<h5>How many reviews?</h5>
			<div class="content">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu ac tortor dignissim convallis. In egestas erat imperdiet sed euismod nisi porta lorem. Neque ornare aenean euismod elementum nisi. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Donec adipiscing tristique risus nec feugiat in fermentum posuere. Nisi est sit amet facilisis magna etiam tempor. Tristique senectus et netus et malesuada fames ac turpis. Ornare arcu dui vivamus arcu felis bibendum ut. Velit scelerisque in dictum non consectetur a erat nam at. Leo vel fringilla est ullamcorper eget nulla facilisi.</p>
			</div>
			<div class="post-movie">movie poster</div>
			<h5>User's Rating: </h5>
			<h5>Date Posted</h5>
			<button class="more">See More</button>
		</div>
		<div class="card">
			<h2>Liked Posts:</h2>
			</div>
		<div class="card">
			<h2>Blog Post Title</h2>
			<h3>User's Name</h3>
			<h5>How many reviews?</h5>
			<div class="content">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu ac tortor dignissim convallis. In egestas erat imperdiet sed euismod nisi porta lorem. Neque ornare aenean euismod elementum nisi. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Donec adipiscing tristique risus nec feugiat in fermentum posuere. Nisi est sit amet facilisis magna etiam tempor. Tristique senectus et netus et malesuada fames ac turpis. Ornare arcu dui vivamus arcu felis bibendum ut. Velit scelerisque in dictum non consectetur a erat nam at. Leo vel fringilla est ullamcorper eget nulla facilisi.</p>
			</div>
			<div class="post-movie">movie poster</div>
			<h5>User's Rating: </h5>
			<h5>Date Posted</h5>
			<button class="more">See More</button>
		</div>
	</div>
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
