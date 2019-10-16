<?php require('db_connection.php'); ?>
<?php require('constant.php'); ?>

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
                $query = "INSERT INTO registered_users(name,email,password,phone_num) 
                          VALUES ('$name','$email','$password', $number)";

                $result_set = mysqli_query($conn,$query);

                if( !$result_set)
                {
                    echo "ERROR :".mysqli_error($conn);
                    $error = true;
                }
                else{
                    $_SESSION['user_name'] = $name  ;
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

