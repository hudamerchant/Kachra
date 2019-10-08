<?php require('db_connection.php'); ?>
<?php require('db_tables.php'); ?>
<?php

    if(isset($_REQUEST['task']))
    {
        $index = $_REQUEST['task'];

        $id = $list[$index]['id'];
    
        $query = " UPDATE tasks 
                SET     task_status = 2
                WHERE   id          = '$id' " ;

        $result_set = mysqli_query( $mysqli_connection , $query );
        if($result_set)
        {
            header('Location: index.php');
        }
        else
        {
            echo 'Error: ' . mysqli_error($mysqli_connection) ;
            die;
        }
    }