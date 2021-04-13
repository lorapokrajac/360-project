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
  		<a href="recentMovies.php" class="active">Recent Movies</a>
  		<a href="genre.php">Genre</a>
  		<a href="profile.php">Profile</a>
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
  		<div class="grid-item">
  		<h3>The Joker</h3>
  		<img src="joker.jpeg" class="logo" alt="Joker Movie Poster" width="220" height=300">
  		<button class="save">Save</button>
  		<button class="posts"> <a href = "joker.php" > See Posts </a></button>
  		</div>
 		<div class="grid-item">
 		<h3>Parasite</h3>
 		<img src="parasite.jpg" class="logo" alt="Parasite Movie Poster" width="220" height=300">
 		<button class="save">Save</button>
  		<button class="posts"> <a href = "parasite.php" > See Posts </a></button>
 		</div>
  		<div class="grid-item">
  		<h3>Yes Day</h3>
 		<img src="yesDay.jpeg" class="logo" alt="Yes Day Movie Poster" width="215" height=300">
 		<button class="save">Save</button>
  		<button class="posts"><a href = "yesDay.php" > See Posts </a></button>
  		</div>  
  		<div class="grid-item">
  		<h3>I Care A Lot</h3>
 		<img src="care.jpg" class="logo" alt="I Care A Lot Movie Poster" width="215" height=300">
 		<button class="save">Save</button>
  		<button class="posts"><a href = "iCareALot.php" > See Posts </a></button>
  		</div>
  		<div class="grid-item">
  		<h3>Kiss The Ground</h3>
 		<img src="kissGround.jpg" class="logo" alt="Kiss The Ground Movie Poster" width="215" height=300">
 		<button class="save">Save</button>
  		<button class="posts"> <a href = "kissTheGround.php" > See Posts </a></button>
  		</div>
  		<div class="grid-item">
  		<h3>Soul</h3>
 		<img src="soul.jpeg" class="logo" alt="Soul Movie Poster" width="220" height=300">
 		<button class="save">Save</button>
  		<button class="posts"> <a href = "soul.php" > See Posts </a></button>
  		</div>  
  		<div class="grid-item">
  		<h3>Mulan</h3>
 		<img src="mulan.jpg" class="logo" alt="Mulan Movie Poster" width="220" height=300">
 		<button class="save">Save</button>
  		<button class="posts"> <a href = "mulan.php" > See Posts </a></button>
  		</div>  
  		<div class="grid-item">
  		<h3>Godzilla Vs. Kong</h3>
 		<img src="godzillaKong.jpeg" class="logo" alt="Godzilla vs Kong Movie Poster" width="215" height=300">
 		<button class="save">Save</button>
  		<button class="posts"> <a href = "godzillaKong.php" > See Posts </a></button>
  		</div>
  		<div class="grid-item">
  		<h3>Enola Holmes</h3>
 		<img src="enola.jpg" class="logo" alt="Enola Holmes Movie Poster" width="220" height=300">
 		<button class="save">Save</button>
  		<button class="posts"> <a href = "enola.php" > See Posts </a></button>
  		</div>
</div>
			
</div>
	
<footer>

</footer>
</body>
</html>