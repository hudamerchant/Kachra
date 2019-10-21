<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="src/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="signup">
            <form method="post" id="signup">
                <label>Name:</label><br>
                <input type="text" name="user_name" >
                <br>
                <label>Email:</label><br>
                <input type="email" name="email" >
                <br>
                <label>Password:</label><br>
                <input type="password" name="password">
                <br>
                <label>Confirm Password:</label><br>
                <input type="password" name="re_password" >
                <br>
                <input type="submit" name="submit" value="SIGN UP">
                <br>
                <span><p id="form_msg"></p></span>
            </form>
            <p> Already a member?<a href="index.php">Login</a>here.</p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="src/script.js"></script>
</body>
</html>