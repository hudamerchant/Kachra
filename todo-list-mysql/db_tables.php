<?php require('db_connection.php'); ?>

<?php
//  **  Creating table: task in database: todo_list  **  //
    $query = "CREATE TABLE IF NOT EXISTS tasks 
        (
            id          INT PRIMARY KEY AUTO_INCREMENT ,
            task_name   VARCHAR(100) NOT NULL ,
            task_status INT(1) NOT NULL DEFAULT 1    
        ) " ;

    $result_set = mysqli_query( $mysqli_connection , $query );
    if(!$result_set)
    {
        echo 'Error: ' . mysqli_error($mysqli_connection) ;
        die;
    }

//  **  Insert records in table: task  **  //
    if(isset($_REQUEST['task_name']))
    {
        if(!empty(trim($_REQUEST['task_name'])))
        {
            $task_name = $_REQUEST['task_name'];
        }
    }
    if(isset($task_name))
    {
        $query = "INSERT INTO tasks ( task_name )
        VALUES ('$task_name') " ;

        $result_set = mysqli_query( $mysqli_connection , $query );
        if(!$result_set)
        {
        echo 'Error: ' . mysqli_error($mysqli_connection) ;
        die;
        }
    }

    $query = " SELECT * FROM tasks " ;

    $result_set = mysqli_query( $mysqli_connection , $query );
    if(!$result_set)
        {
            echo 'Error: ' . mysqli_error($mysqli_connection) ;
            die;
        }

    $list = mysqli_fetch_all( $result_set , MYSQLI_ASSOC );

    

