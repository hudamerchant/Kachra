<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "usingAjax";

    $conn     = mysqli_connect( $hostname , $username , $password , $dbname);
    if(!$conn)
    {
        echo 'ERROR: ';
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
        die;
    }