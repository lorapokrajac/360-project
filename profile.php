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
	if(!array_key_exists('uMore', $_POST) || array_key_exists('uLess', $_POST)) {
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
			 echo "<img src=$poster class='logo' width='215' height=300>";
			echo "<h5>Your Rating: $rating</h5>";
			echo "<h5>Date posted: $dp </h5>";
			echo "<h5>Total Likes: $numLike     Total Saves: $numSave</h5>";
			echo "<form method='post'>";
       					echo "<input type='submit' name='uMore'  class='button' value='See More' />";
   			echo "</form>";
		echo "</div>";
		}

	}else{
		echo "<div class='card'>";
           			$sql = "SELECT blogTitle, reviews, poster, rating, datePosted, numLikes, numSaves FROM review r, movie m WHERE r.title = m.title AND username = '$uname' ORDER BY datePosted DESC";
				$results = mysqli_query($connection, $sql);
				while($row = mysqli_fetch_assoc($results)){
					$blogTitle = $row['blogTitle']; 
				$review = $row['reviews']; 
				$poster = $row['poster']; 
				$rating = $row['rating']; 
				$dp = $row['datePosted'];
				$numLike  = $row['numLikes'];
				$numSave = $row['numSaves'];
			
				echo "<h2>$blogTitle</h2>";
				echo "<h3><$uname></h3>";
				echo "<h5>Your review</h5>";
				echo "<div class='content'>";
				echo "<p>$review</p>";
				echo "</div>";
			 	echo "<img src=$poster class='logo' width='215' height=300>";
				echo "<h5>Your Rating: $rating</h5>";
				echo "<h5>Date posted: $dp </h5>";
				echo "<h5>Total Likes: $numLike     Total Saves: $numSave</h5><br><br>";
			
	
					
       				
				}
			 echo "<form method='post'>";
       				echo "<input type='submit' name='uLess'  class='button' value='See Less' />";
   			 echo "</form>";
			echo "</div>";
			
		}


		//saved post
		echo "<div class='card'>";
			echo "<h2>Saved Posts:</h2>";
		echo "</div>";
		if(!array_key_exists('saveMore', $_POST) || array_key_exists('saveLess', $_POST)) {
			$sql = "SELECT blogTitle, reviews, poster, rating, datePosted,numLikes, numSaves FROM movie m, review r, saves s WHERE r.title = m.title AND s.rid = r.rid AND s.username ='$uname' ORDER BY datePosted  DESC LIMIT 1";
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
		 			echo "<form method='post'>";
       						echo "<input type='submit' name='saveMore'  class='button' value='See More' />";
   					echo "</form>";
				echo "</div>";
			}
		}else {
				echo "<div class='card'>";
           			$sql = "SELECT blogTitle, reviews, poster, rating, datePosted,numLikes, numSaves FROM movie m, review r, saves s WHERE r.title = m.title AND s.rid = r.rid AND s.username ='$uname' ORDER BY datePosted  DESC";
				$results = mysqli_query($connection, $sql);
				while($row = mysqli_fetch_assoc($results)){
					$blogTitle = $row['blogTitle']; 
					$review = $row['reviews']; 
					$poster = $row['poster']; 
					$rating = $row['rating']; 
					$dp = $row['datePosted'];
					$numLike  = $row['numLikes'];
					$numSave = $row['numSaves'];
					echo "<h2>$blogTitle</h2>";
					echo "<h3><$uname></h3>";
					echo "<h5>Your review</h5>";
					echo "<div class='content'>";
					echo "<p>$review</p>";
					echo "</div>";
					echo "<img src=$poster class='logo' width='215' height=300>";
					echo "<h5>Date posted: $dp </h5>";
					echo "<h5>User's Rating: $rating</h5>";
					echo "<h5>Total Likes: $numLike     Total Saves: $numSave</h5><br><br>";
					
       				
				}
			 echo "<form method='post'>";
       				echo "<input type='submit' name='saveLess'  class='button' value='See Less' />";
   			 echo "</form>";
			echo "</div>";
			
		}
		//liked post
		echo "<div class='card'>";
			echo "<h2>Liked Posts:</h2>";
			echo "</div>";
		if(!array_key_exists('likeMore', $_POST) || array_key_exists('likeLess', $_POST)) {
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
		 			echo "<form method='post'>";
       						echo "<input type='submit' name='likeMore'  class='button' value='See More' />";
   					echo "</form>";
				echo "</div>";
			}
		}else {
				echo "<div class='card'>";
           			$sql = "SELECT blogTitle, reviews, poster, rating, datePosted,numLikes, numSaves FROM movie m, review r, likes l WHERE r.title = m.title AND l.rid = r.rid AND l.username ='$uname' ORDER BY datePosted  DESC";
				$results = mysqli_query($connection, $sql);
				while($row = mysqli_fetch_assoc($results)){
					$blogTitle = $row['blogTitle']; 
					$review = $row['reviews']; 
					$poster = $row['poster']; 
					$rating = $row['rating']; 
					$dp = $row['datePosted'];
					$numLike  = $row['numLikes'];
					$numSave = $row['numSaves'];
					echo "<h2>$blogTitle</h2>";
					echo "<h3><$uname></h3>";
					echo "<h5>Your review</h5>";
					echo "<div class='content'>";
					echo "<p>$review</p>";
					echo "</div>";
					echo "<img src=$poster class='logo' width='215' height=300>";
					echo "<h5>Date posted: $dp </h5>";
					echo "<h5>User's Rating: $rating</h5>";
					echo "<h5>Total Likes: $numLike     Total Saves: $numSave</h5><br><br>";
					
       				
				}
			 echo "<form method='post'>";
       				echo "<input type='submit' name='likeLess'  class='button' value='See Less' />";
   			 echo "</form>";
			echo "</div>";
			
		}
  			


	echo "</div>";
	echo "<div class='col-right'>";
	echo 	"<div class='card'>";
			echo "<h2> Hi, ".$uname."!</h2>";
			$sql = "SELECT * FROM users WHERE username = '$uname'";
    		$results = mysqli_query($connection, $sql);
   		 	while ($row = mysqli_fetch_assoc($results))
    		{
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profilePicture'] ).'" width="150" height="150"/>';
			}

    mysqli_free_result($results);
			
			
		echo "</div>";
		echo "<div class='card'>";
			echo "<h2>Watchlist</h2>";
		$sql = "SELECT m.title, poster FROM movie m, watchlist w WHERE m.title = w.title AND username = '$uname'";
		$results = mysqli_query($connection, $sql);
		while ($row = mysqli_fetch_assoc($results)){
			$poster = $row['poster'];
			$title = $row['title'];
			echo "<h5>$title</h5>";
			echo "<img src=$poster class='logo' alt='$title' width='175' height=250>";
		}

		echo "</div>";


		echo "<div class='card'>";
			echo "<h2>Top Rated Movies</h2>";
			$sql = "SELECT m.title, poster, rating FROM movie m, review r WHERE m.title = r.title AND username = '$uname' ORDER BY rating DESC LIMIT 2";
			$results = mysqli_query($connection, $sql);
			while ($row = mysqli_fetch_assoc($results)){
				$poster = $row['poster'];
				$title = $row['title'];
				$rating = $row['rating'];
				echo "<h5>$title</h5>";
				echo "<img src=$poster class='logo' alt='$title' width='175' height=250>";
				echo "<h5>Rating: $rating </h5>";
		}

		echo "</div>";

	}
?>

	</div>	
	
</div>
	
<footer>
<div class="card">
		<div class="top-link">
			<a href="#top">Back to Top</a>	
		</div>
	</div>
</footer>
</body>
</html>
