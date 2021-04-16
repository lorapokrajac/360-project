

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
		<a href="search.php">Search</a>
	</div>
</div>

<div class="main">
    <?php
    $host = "localhost";
    $database = "360_project";
    $user = "webuser";
    $password = "P@ssw0rd"; 
    
    $connection = mysqli_connect($host, $user, $password, $database);
    $wanted=$_SESSION['finduser'];
        $query1="UPDATE users SET disabled=true WHERE username='$wanted'";
        $results = mysqli_query($connection, $query1);
        // echo ("<scipt>alert('Successful')</script>");
        $query2="SELECT firstName, lastName, username, email, profilePicture FROM users WHERE username='$wanted'";
        $results2 = mysqli_query($connection, $query2);
		while($row = mysqli_fetch_assoc($results2)){
            $fn=$row['firstName'];
			$ln = $row['lastName']; 
			$usern = $row['username'];
			$email = $row['email'];
			$pp  = $row['profilePicture'];
        echo ("<br>
		<div class='users' style='position:relative;margin: top 10px;'>
        <fieldset>
        <legend>$usern(Disabled)</legend>");
        //<label>Profile picture: <img src='data:jpeg;base64,' . $pp . '' /></label><br>
        echo("<label>First name: $fn</label><br>
        <label>Last name: $ln</label><br>
        <label>email: $email</label><br>
        <a href='enableUser.php' >Enable</a>
        <a href='disableUser.php'>Disable</a>
        </fieldset>
        <br>
		</div>");
        }
    mysqli_close($connection);
        ?>
</div>
	
<footer>
</footer>
</body>
</html>









