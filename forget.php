<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="register.css">

</head>
<body>
    <div class="breadcrumb">
        <a href="home.php">Home</a> >
        <a href="login.html">Login</a> >
        <a href="forget.php">Reset Password</a>
    </div>
    <div>
        <h1>Reset Your Password</h1>
    </div>
    <div>
    <form method="post" id="resetForm">
            <div class="container">
            <label for="username"><b>Username:</b></label>
            <input type="text" placeholder="Enter Username" name="username" id="username" class="required">
            <br>
            <br>

            <label for="psw"><b>Password:</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

    
            <hr>

            <button type="submit" class="reset">Login</button>
            </div>
    </div>
    

</body>
</html>