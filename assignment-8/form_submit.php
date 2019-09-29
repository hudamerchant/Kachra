<?php session_start(); ?>
<?php require_once('data.php'); ?>
<?php require_once('constant.php'); ?>
<?php


session_unset();

    //validating email and password and getting user id using email 
        if(isset($_REQUEST['submit']))
        {
            if( !empty(trim($_REQUEST['email'])) && !empty(trim($_REQUEST['password'])))
            {
                foreach( $user_credentials as $user_info )
                { 
                    if( $user_info["email"] == $_REQUEST["email"] && $user_info["password"] == $_REQUEST["password"])
                    {
                        //saving the data in session
                        $user_id = $user_info["user_information_id"];
                        $_SESSION['user_id'] = $user_id; 

                        $_SESSION['email'] = $user_info["email"];
                        $_SESSION['password'] = $user_info["password"];

                        break;
                    }
                    // validations
                    if($user_info["email"] !== $_REQUEST["email"])
                    {
                        $_SESSION['error'] = ERROR ; 
                        header("Location: index.php");

                    }
                    elseif($user_info["password"] !== $_REQUEST["password"])
                    {
                        $_SESSION['password_error'] = PASSWORD_ERROR ;
                        header("Location: index.php");
                    }
                    else
                    {

                    }
                }
            }
            //fetching user info through user id 
            if( isset($user_id) )
            {
                foreach( $user_information as $value )
                {
                    if( $value["unique_id"] == $user_id )
                    {
                        $_SESSION['name'] = $value["name"];
                        $_SESSION['age'] = $value["age"];
                        $_SESSION['phone_num'] = $value["phone_num"];
                        header("Location: user_profile.php");
                    }
                }
            }
        }

?>