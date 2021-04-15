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
else
{
    $username = $_POST["username"];
    $password = $_POST["oldpassword"];
    $newpassword = $_POST["newpassword"];

    $sql = "SELECT username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 's',$username);
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($results);
 	if (mysqli_num_rows($results) > 0) {
 		if($_SERVER["REQUEST_METHOD"] == "POST"){
 			if($row['password'] == md5($password)){
        		$_SESSION['username'] = $username;
				$sql = "UPDATE users set password='$newpassword' WHERE username='$username'";
                $result = mysqli_query($connection,$sql);
                echo "user's password has been updated";

 			}else {
    			echo "Usernamer and/or password are invalid";
    		}
 		}
 	} 

}    

?>

</html>