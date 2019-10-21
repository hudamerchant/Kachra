<?php require('../db_connection.php') ?>
<?php

$message = "";

    if(isset($_POST['submit']))
    {
        $name           = $_POST['user_name'];
        $email          = $_POST['email'];
        $password       = $_POST['password'];
        $re_password    = $_POST['re_password'];

        if(!empty(trim($name)) && !empty(trim($email)) && !empty(trim($password))  )
        {
            if($password == $re_password)
            {
                $query = "INSERT INTO registered_users(name,email,password) 
                          VALUES ('$name','$email','$password')";

                $result_set = mysqli_query($conn,$query);

                if($result_set)
                {
                    $message = "Success";
                }
                else
                {
                    $message = "ERROR :".mysqli_error($con);
                }
            }
            else
            {
                $message = RE_PASSWORD_ERROR;
            }
        }
        else
        {
            $message = EMPTY_FIELDS;
        }
    }
echo $message;