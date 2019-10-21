<?php require('../db_connection.php') ?>
<?php session_start(); ?>
<?php
$message = "";

    if(isset($_POST['submit']))
    {
        $email      = $_POST['email'];    
        $password   = $_POST['password']; 
        
        $query = "SELECT * FROM registered_users 
                    WHERE EMAIL  = '$email' 
                    AND PASSWORD = '$password' "; 
        
        $result_set = mysqli_query($conn,$query);
        
        if( mysqli_num_rows($result_set) > 0  )
        {    
            $user = mysqli_fetch_assoc($result_set);

            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_name']  = $user['name'];
        
            $message = "Success";
        }
        else
        {
            $message = CRED_ERROR ;
        }
    }
echo $message;