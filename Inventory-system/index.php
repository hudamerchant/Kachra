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
<body>
    <?php require("connection_db.php"); ?>
    <?php require("constant.php"); ?>
    
    <div class="container">
    
    <?php 
        if(isset($_POST['submit']))
        {
            $email      = $_POST['email'];    
            $passowrd   = $_POST['passowrd']; 
            
            $query      = "SELECT id FROM USERS WHERE EMAIL = '$email' AND PASSWORD = '$passowrd' "; 
            $result_set = mysqli_query($con,$query);
             
            if( mysqli_num_rows($result_set) > 0  )
            {
                
              $user_id = mysqli_fetch_assoc($result_set);
              
                $_SESSION['user_id'] = $user_id['id'];

            }else
            {
                $_SESSION['credentials_error'] = ERROR ;
            }
        }

    if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id']) )
    { 
        
    ?>
    <div class="login">
    <h1>Login form</h1>
    <form method="post">

        <input type="email" name="email" placeholder="Email" required><br>
        
        <input type="password" name="passowrd" placeholder="Password" required><br>
        <span>
            <?php echo isset($_SESSION['credentials_error'])? $_SESSION['credentials_error']:'' ?>
        </span><br>
        <input type="submit" value="LOG IN" name="submit">
    </form>
    <a href="signup.php">Sign Up</a>
    </div>
    <?php 
    }
    else
    {
        header("Location: products.php");
    }  ?>

    </div>
</body>
</html>