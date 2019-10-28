<?php require_once('constant.php') ?>
<?php 
 $hostname = HOST_NAME ;
 $username = USER_NAME ;
 $password = PASSWORD ;
 $dbname   = "second_assignment";

 $conn     = mysqli_connect($hostname , $username , $password , $dbname);

 if(!$conn)
 {
    echo 'Error no: ' .mysqli_connect_errno();
    echo 'Error no: ' .mysqli_connect_error();
    die; 
 }
