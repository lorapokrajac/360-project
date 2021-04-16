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
   $newreview=$_POST['editted'];
   $uname=$_POST['uname'];
   $title=$_POST['title'];
    $query1 = "UPDATE review SET reviews='$newreview' WHERE blogTitle='$title' AND username='$uname'";
    $results = mysqli_query($connection, $query1);
            echo "<script>
            alert('Updated Successfully!');
            window.location.href = 'home.php';
            </script>";
    mysqli_close($connection);
}else{
    echo("Error, please use POST.");
}

}
?>
</html>
