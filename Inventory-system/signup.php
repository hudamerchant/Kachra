<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="src/style.css" />
    <title>Document</title>
</head>
<?php require("connection_db.php"); ?>
<?php require("constant.php"); ?>

<?php
    unset($_SESSION['password_error']);
    unset($_SESSION['empty_fields']);
?>

<?php 
    $error   = false;

    if(isset($_POST['submit']))
    {
        $name           = $_POST['name'];
        $email          = $_POST['email'];
        $password       = $_POST['password'];
        $re_password    = $_POST['re_password'];
        $number         = $_POST['number'];

        if(!empty(trim($name)) && !empty(trim($email)) && !empty(trim($password))  )
        {
            if($password == $re_password)
            {
                $query = "INSERT INTO users(name,email,password,phone_number) VALUES ('$name','$email','$password', $number)";

                $result_set = mysqli_query($con,$query);

                if( !$result_set)
                {
                    echo "ERROR :".mysqli_error($con);
                    $error = true;
                }
                else{
                    $_SESSION['user_name'] = $name  ;
                    header('Location: welcome.php');
                }
            }else
            {
                $_SESSION['password_error'] = PASSWORD_ERROR;
                $error = true;
            }

        }else
        {
            $_SESSION['empty_fields'] = EMPTY_FIELD ;
            $error = true;
        }
        
    }

?>

<body>
<div class="container">
    <div class="signup">
        <h1>Create Your Account</h1>
        <form method="post">
            <label>Name:</label><br>
            <input type="text" name="name" value="<?php echo $error && isset($_POST['name']) ? $_POST['name'] : "" ?>" required> 
            <br>

            <label>Email:</label><br>
            <input type="email" name="email" required value="<?php echo $error && isset($_POST['email']) ? $_POST['email'] : "" ?>" >
            <br>
            
            <label>Password:</label><br>
            <input type="password" name="password" required>
            <br>

            <label>Confirm Password:</label><br>
            <input type="password" name="re_password" required>
            <br>
            <span>
                <?php echo isset($_SESSION['password_error']) ?  $_SESSION['password_error'] : '' ?>
            </span><br>

            <label>Number</label><br>
            <input type="text" name="number" value="<?php echo $error && isset($_POST['number']) ? $_POST['number'] : "" ?>" >
            <br>
            
            <span>
                <?php echo isset($_SESSION['empty_fields']) ?  $_SESSION['empty_fields'] : '' ?>
            </span><br>

            <input type="submit" value="SIGN UP" name="submit">
        </form>
        <p> Already a member?<a href="index.php"> Login </a>here.</p>
    </div>
</div>
</body>
</html>