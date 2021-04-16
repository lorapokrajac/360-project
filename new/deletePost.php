<!DOCTYPE html>
<html>


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
else{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //good connection, so do you thing
   $review=$_POST['review'];
   $uname=$_POST['uname'];
    $query1 = "DELETE FROM review WHERE username='$uname' AND reviews='$review'";
    $results = mysqli_query($connection, $query1);
            echo "<script>
            alert('Deleted Successfully!');
            window.location.href = 'home.php';
            </script>";
    mysqli_close($connection);
}else{
    echo("Error, please use POST.");
}

}
?>
</html>
