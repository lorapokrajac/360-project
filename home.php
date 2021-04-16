<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="home.css">
</head>
<body>
<a name = "top"></a>
<div class="header">	
<img src="logo.jpg" class="logo" alt="Movie Logo" width="70" height="70">
<?php 
session_start();
	$login = false;
	$admin=false;
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
  		<a href="home.php" class="active">Main Page</a>
  		<a href="recentMovies.php">Recent Movies</a>
  		<a href="genre.php">Genre</a>
		<?php 
		if ($login) {
    		echo "<a href='profile.php'>Profile</a>";
   		}
		echo "</div>";
		if ($login) {
		echo "<p style= 'text-align: center; font-weight: bold;'> Hello, " . $_SESSION['username'] . "!</p>"; 
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
     			$sql2 = "SELECT r.username, rating, reviews, blogTitle, r.rid,r.title, poster, datePosted, numLikes, numSaves FROM review r, movie m  WHERE  m.title = r.title ORDER BY (numLikes + numSaves) DESC LIMIT 3;";
			$results2 = mysqli_query($connection, $sql2);
     			echo "<div class='col-left'>";
			echo "<div class='card'>";
			echo "<h1>Top Blog Posts</h1>";
     			echo "</div>";
			while($row2 = mysqli_fetch_assoc($results2)){
				$blogTitle = $row2['blogTitle'];
				$uname = $row2['username'];
				$rating = $row2['rating'];
				$review = $row2['reviews'];
				$rid   = $row2['rid'];
				$poster = $row2['poster'];
				$title = $row2['title'];
				$dp = $row2['datePosted'];
				$numLike = $row2['numLikes'];
				$numSave = $row2['numSaves'];
				echo "<div class='card'>";
				echo "<h2>$blogTitle </h2>";
				if($admin==true){
				echo "<form action='editPost.php' method='post'>
				<input type='hidden' name='uname' value='$uname' />
				<input type='hidden' name='review' value='$review' />
				<button>Edit</button>
				</form>";
				echo "<form action='deletePost.php' method='post'>
				<input type='hidden' name='uname' value='$uname' />
				<input type='hidden' name='review' value='$review' />
				<button>Delete</button>
				</form>";
				}
			 	echo "<h3>$uname</h3>";
				echo "<div class='content'>";
				echo "<p>$review</p>";
				echo "</div>";
      				
  			    echo "<img src=$poster class='logo' alt=$title width='215' height=300>";
				  $sql3="SELECT * FROM comment WHERE reviewer='$uname' AND title='$title'";
				  $results3 = mysqli_query($connection, $sql3);
				  echo "<h3>Comments:</h3>";
				  while($row3 = mysqli_fetch_assoc($results3)){
					  $commenter=$row3['username'];
					  $comment=$row3['comments'];
					  $date=$row3['datePosted'];
					  echo ("<div>
						  <p>$commenter: $comment on $date</p>
					  </div><hr>");
				  }
          		echo "<h5>Date posted: $dp </h5>";
				echo "<h5>User's Rating: $rating</h5>";
				echo "<h5>Total Likes: $numLike     Total Saves: $numSave</h5>";
				if($login){
					echo "<p>";
					echo "<form action = 'like.php' method = 'POST' id = $rid.'like'>";
					echo "<input type='hidden' value='$rid' name='rid' />";
					echo "<input type='hidden' value='$uname'.'like' name='uname' />";
					echo "<input type='hidden' value='$title' name='title' />";
					echo "<input type='hidden' value='like' name='like' />";
					echo "</form>";
					echo "<button class ='save' type='submit' form= $rid.'like' value='Submit'>Like</button>";
					echo "<form action = 'like.php' method = 'POST' id = $rid.'save'>";
					echo "<input type='hidden' value='$rid' name='rid' />";
					echo "<input type='hidden' value='$uname' name='uname' />";
					echo "<input type='hidden' value='$title' name='title' />";
					echo "<input type='hidden' value='save' name='like' />";
					echo "</form>";
					echo "<button class = 'save' type='submit' form= $rid.'save' value='Submit'>Save</button>";
					echo "<form action = 'comment.php' method = 'POST' id ='commentForm'>";
					echo "<input type='hidden' value='$rid' name='rid' />";
					echo "<input type='hidden' value='$uname'.'like' name='uname' />";
					echo "<input type='hidden' value='$title' name='title' />";
					echo "</form>";
					echo "<button class = 'save' type='submit' form= 'commentForm' value='Submit'>Comment</button>";
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
		echo "</div>";
	
  		mysqli_free_result($results);
  		
  		echo "<div class='card'>";
		echo "<h2>Advertisements</h2>";
		$sql = "SELECT link, image FROM ads LIMIT 2;";
   		$results3 = mysqli_query($connection, $sql);
		while ($row3 = mysqli_fetch_assoc($results3)){
			$link = $row3['link'];
			$image = $row3['image'];
			
			
			echo "<a href= '$link' target='_blank' onClick='window.location.href='$link'>";
			echo "<img src=$image class='ad' alt='$link' width='175' height=250>";
			echo "</a>";
			
		}
  		
  			mysqli_free_result($results3);
    		mysqli_close($connection);
		}

		?>
</div>
	
<footer>
	<div class="card">
		</div>
			<a href="#top" class="return-top">Top</a>
		</div>	
	</div>	
</footer>
</body>
</html>
