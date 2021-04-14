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
  		<a href="home.php" class="active">Main Page</a>
  		<a href="recentMovies.php">Recent Movies</a>
  		<a href="genre.php">Genre</a>
		<?php 
		if ($login) {
    		echo "<a href='profile.php'>Profile</a>";
   		}
		echo "</div>";
		if ($login) {
    			echo "<b> Welcome, " . $_SESSION['username'] . "!";  
   		}
	?>
	</div>
	<div class="breadcrumb">
	<a href="home.php">Home</a>
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
     			$sql2 = "SELECT r.username, rating, reviews, blogTitle, r.rid,r.title, poster FROM review r, likes l, movie m  WHERE r.rid = l.rid AND m.title = r.title LIMIT 3;";
			$results2 = mysqli_query($connection, $sql2);
     			echo "<div class='col-left'>";
			echo "<div class='card'>";
			echo "<h1>Top Blog Post</h1>";
     			echo "</div>";
			while($row2 = mysqli_fetch_assoc($results2)){
				$blogTitle = $row2['blogTitle'];
				$uname = $row2['username'];
				$rating = $row2['rating'];
				$review = $row2['reviews'];
				$rid   = $row2['rid'];
				$poster = $row2['poster'];
				$title = $row2['title'];
				echo "<div class='card'>";
				echo "<h2>$blogTitle </h2>";
			 	echo "<h3>$uname</h3>";
				echo "<div class='content'>";
				echo "<p>$review</p>";
				echo "</div>";
      				
  			       echo "<img src=$poster class='logo' alt=$title width='215' height=300>";
          
				echo "<h5>User's Rating: $rating</h5>";
				if($login){
					echo "<p>";
					echo "<form action = 'like.php' method = 'POST' id = $rid.'like'>";
					echo "<input type='hidden' value='$rid' name='rid' />";
					echo "<input type='hidden' value='$uname'.'like' name='uname' />";
					echo "<input type='hidden' value='like' name='like' />";
					echo "</form>";
					echo "<button type='submit' form= $rid.'like' value='Submit'>Like</button>";
					echo "<form action = 'like.php' method = 'POST' id = $rid.'save'>";
					echo "<input type='hidden' value='$rid' name='rid' />";
					echo "<input type='hidden' value='$uname' name='uname' />";
					echo "<input type='hidden' value='save' name='like' />";
					echo "</form>";
					echo "<button type='submit' form= $rid.'save' value='Submit'>Save</button>";
					echo "</p>";
				}
				echo "</div>";
			}
			echo "</div>";
			echo "<div class='col-right'>";
	
		
		echo "<div class='card'>";
		echo "<h2>Top Box Office Movies</h2>";
		$sql = "SELECT title, poster, boxScore FROM movie ORDER BY boxScore DESC LIMIT 2;";
   		$results = mysqli_query($connection, $sql);
		while ($row = mysqli_fetch_assoc($results)){
			$poster = $row['poster'];
			$title = $row['title'];
			$boxScore = $row['boxScore'];
			echo "<img src=$poster class='logo' alt='$title' width='175' height=250>";
			if($boxScore < 1){
				$boxScore = $boxScore*1000;
				echo "<p> Box Score: $boxScore Thousand </p>";
			}else if($boxScore < 1000){
				echo "<p> Box Score: $boxScore Million </p>";
			}
			else{
				$boxScore = $boxScore/1000;
				echo "<p> Box Score: $boxScore Billion </p>";
			}
			
		}

  		mysqli_free_result($results);
    		mysqli_close($connection);
		}

		?>
		</div>
		<div class="card">
			<div class="adfakeimg">Advertisements</div><br>
			<div class="adfakeimg">Advertisements</div><br>
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
