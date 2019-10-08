<?php 

$hostname = 'localhost' ;
$username = 'root' ;
$password = '' ;
$db       = 'todo_list' ;

$mysqli_connection = mysqli_connect( $hostname , $username , $password , $db) ; 
if(!$mysqli_connection)
{
    echo 'Error: ' . mysqli_connect_errno();
    echo 'Error: ' . mysqli_connect_error();
    die;
}