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
<div class='col-left'>
	<div class='card'>
		<?php echo "<h1>$title</h1>"; ?>
     	</div>
<div class = 'card'>
	<form action = 'writeReview.php' method = 'POST' id = 'Review'>
		<h2> Write a Review </h2>
		Title: <input type="text" name = 'blogTitle'><br><br>
		Rating: <input type="number" min="0" max="10" name = 'rating'>
		<?php
		if($login){
		$uname = $_SESSION['username'];
		echo "<input type='hidden' value='$title' name='title' />";
		echo "<input type='hidden' value= '$uname' name='uname' />";
		}
		?>

	</form>
	<br>
	<textarea name="review" form="Review"> </textarea><br>
	<?php
		if($login){
			echo "<button type='submit' form= 'Review' value='Submit'>Submit</button>";
		}else{
			echo "<p> Login to write a review </p>";
			echo "<button class='login-button'><a href = 'login.html'>Login</a></button>"; 
		}
	?>
</div>
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
      $sql = "SELECT director, actors, description, awards, boxScore, rdate, poster FROM movie WHERE title = '$title'";
	    $results = mysqli_query($connection, $sql);
		  while($row = mysqli_fetch_assoc($results)){
			  $director = $row['director'];
			  $actors = $row['actors'];
			  $awards = $row['awards'];
     		$date = $row['rdate'];
			  $description = $row['description'];
			  $boxScore = $row['boxScore'];
        $poster = $row['poster'];
      }
			$sql2 = "SELECT username, rating, reviews, blogTitle, rid, datePosted, numLikes, numSaves FROM review WHERE title = '$title' ORDER BY datePosted DESC;";
			$results2 = mysqli_query($connection, $sql2);
			while($row2 = mysqli_fetch_assoc($results2)){
				$blogTitle = $row2['blogTitle'];
				$uname = $row2['username'];
				$rating = $row2['rating'];
				$review = $row2['reviews'];
				$rid   = $row2['rid'];
				$dp = $row2['datePosted'];
				$numLike  = $row2['numLikes'];
				$numSave = $row2['numSaves'];
				echo "<div class='card'>";
				echo "<h2>$blogTitle </h2>";
			 	echo "<h3>$uname</h3>";
				echo "<div class='content'>";
				echo "<p>$review</p>";
				echo "</div>";
      				
  			        echo "<img src=$poster class='logo' alt=$title width='215' height=300>";
          
				echo "<h5>Date posted: $dp </h5>";
				echo "<h5>User's Rating: $rating</h5>";
				echo "<h5>Total Likes: $numLike     Total Saves: $numSave</h5>";
				if($login){
					
					echo "<form action = 'like.php' method = 'POST' id = $rid.'like'>";
					echo "<input type='hidden' value='$rid' name='rid' />";
					echo "<input type='hidden' value='$uname'.'like' name='uname' />";
					echo "<input type='hidden' value='like' name='like' />";
					echo "</form>";
					echo "<button class = 'save' type='submit' form= $rid.'like' value='Submit'>Like</button>";
					
					echo "<form action = 'like.php' method = 'POST' id = $rid.'save'>";
					echo "<input type='hidden' value='$rid' name='rid' />";
					echo "<input type='hidden' value='$uname' name='uname' />";
					echo "<input type='hidden' value='save' name='like' />";
					echo "</form>";
					echo "<button class = 'save' type='submit' form= $rid.'save' value='Submit'>Save</button>";
					
				}
				echo "</div>";
			}
			echo "</div>";
			echo "<div class='col-right'>";
	
			echo "<div class='card'>";
			echo   "<form action = 'watchlist.php' method = 'post' id= $title.'save'>";
			echo    "<input type='hidden' value='$title' name='title' />";
			echo    "</form>";
			echo    "<button class = 'save' type='submit' form= $title.'save' value='Submit'>Add to watchlist</button>";
			
			echo "</div>";
		  echo "<div class='card'>";
		
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
