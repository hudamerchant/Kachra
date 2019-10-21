<?php require('php/constant.php'); ?>
<?php
    $hostname = HOST ;
    $username = DB_USERNAME ; 
    $password = DB_PASSWORD ;
    $database = DB_NAME ;

    $conn = mysqli_connect( $hostname , $username , $password , $database );
    if(!$conn)
    {
        echo "ERROR:".mysqli_connect_errno();
        echo "ERROR:".mysqli_connect_error();
    }