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
    $oldun=$_POST['oldusername'];
    $oldpw=$_POST['oldpassword'];
    $newpw=$_POST['newpassword'];
    $newun=$_POST['newusername'];
    $check=$_POST['newpassword-repeat'];
    $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $match=false;
    $query1 = "SELECT username,password FROM users;";
    $results = mysqli_query($connection, $query1);
    $oldpw=md5($oldpw);

    //and fetch requsults
    while ($row = mysqli_fetch_assoc($results))
    {
      if($row['username']===$oldun && $row['password']===$oldpw){
          $match=true;
          break;
      }
    }
    if($match===true){
        if($newpw===$check){
            $newpw=md5($newpw);
            $query2="UPDATE users SET username='$newun',password='$newpw',profilePicture='$image' WHERE username='$oldun'";
            mysqli_query($connection,$query2);
            echo "<script>
            alert('Update Successfully');
            window.location.href = 'home.php';
            </script>";
        }else{
            echo("new password does not match");
        }
    }else{
        echo("Old Username or password wrong.");
    }
    mysqli_close($connection);
}else{
    echo("Error, please use POST.");
}

}
?>
</html>
