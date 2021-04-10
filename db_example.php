<!DOCTYPE html>
<html>

<p>Here are some results:</p>

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
    //good connection, so do you thing
    $sql = "SELECT * FROM users WHERE firstName = 'test';";

    $results = mysqli_query($connection, $sql);

    //and fetch requsults
    while ($row = mysqli_fetch_assoc($results))
    {
	echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profilePicture'] ).'" width="150" height="150"/>';
	}

    mysqli_free_result($results);
    mysqli_close($connection);
}
?>
</html>
