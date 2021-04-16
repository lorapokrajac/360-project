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
  		<a href="recentMovies.php">Recent Movies</a>
  		<a href="genre.php">Genre</a>
  		<a href="profile.php">Profile</a>
	</div>
	<div class="breadcrumb">
		<a href="home.php">Home</a> >
		<a href="genre.php">Genres</a> >
		<a href="comedy.php">Comedies</a> >
		<a href="yesDay.php">Yes Day</a>
		
	</div>
</div>

<div class="main">
	<div class="col-left">
		<div class="card">
			<h1>Yes Day</h1>
			</div>
			<div class="card">
			<h2>Blog Post Title</h2>
			<h3>User Name</h3>
			<h5>How many reviews?</h5>
			<div class="content">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu ac tortor dignissim convallis. In egestas erat imperdiet sed euismod nisi porta lorem. Neque ornare aenean euismod elementum nisi. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Donec adipiscing tristique risus nec feugiat in fermentum posuere. Nisi est sit amet facilisis magna etiam tempor. Tristique senectus et netus et malesuada fames ac turpis. Ornare arcu dui vivamus arcu felis bibendum ut. Velit scelerisque in dictum non consectetur a erat nam at. Leo vel fringilla est ullamcorper eget nulla facilisi.</p>
			</div>
  			<img src="yesDay.jpeg" class="logo" alt="Yes Day Movie Poster" width="215" height=300">
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
  			<img src="yesDay.jpeg" class="logo" alt="Yes Day Movie Poster" width="215" height=300">
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
			<h3>Directed By:</h3><p> Miquel Arteta</p>
			<h3>Actors:</h3><p>Jennifer Garner, Edgar Ramírez, Jenna Ortega </p>
		</div>
		<div class="card">
			<h3>Description</h3><p>A mom and dad who usually say no to their kids decide to have a "yes day" where they say yes to their kids' wildest requests for one day.</p>
		</div>
		<div class="card">
		<h3>Release date:</h3><p> March 12, 2021</p>
		<h3>Netflix</h3>
		</div>
		<div class="card">
		<button class="return-top">Back to Top</button> 
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