<?php require('db_connection.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="src/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="login">
            <h1>LOGIN</h1>
            <form method="post" id="login">
                <input type="email" name="email" placeholder="Enter Your Email">
                <br>
                <input type="password" name="password" placeholder="Enter Your Password">
                <br>
                <input type="submit" name="submit" value="LOGIN">
                <span><p id="form_msg"></p></span>
            </form>
            <a href="signup.php">Sign Up</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="src/script.js"></script>
</body>
</html>