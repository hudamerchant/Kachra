<?php require('db_connection.php'); ?>
<?php session_start(); ?>
<?php

    if(isset($_POST['submit']))
    {
        $email      = $_POST['email'];    
        $passowrd   = $_POST['passowrd']; 
        
        $query = "SELECT * FROM registered_users 
                  WHERE EMAIL  = '$email' 
                  AND PASSWORD = '$passowrd' "; 
        
        $result_set = mysqli_query($conn,$query);
         
        if( mysqli_num_rows($result_set) > 0  )
        {
            
          $user = mysqli_fetch_assoc($result_set);

            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_name']  = $user['name'];
            
        }else
        {
            echo "Credentails is wrong.";
        }
    }