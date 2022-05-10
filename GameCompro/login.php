<?php
    session_start();
    include('server.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico" type="/css/images">
</head>
<body>
    <div class ="login-form">
            <h2>Login</h2>
        <form action="login_db.php" method="post">
            <div class="input-group">           
                <input type="text" name="username" required>
                <span></span>
                <label for="username">Username</label> 
            </div>
            <div class="input-group">       
                <input type="password" name="password" required>
                <span></span>
                <label for="password">Password</label>
            </div>
                <input type="submit" name="login_user" class="btn" value="Login">
        </form>
    </div> 
</body>
</html>