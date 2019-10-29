<?php require_once('db_connection.php'); ?>
<?php

    if($_POST['search'] == 'search_all')
    {
        $first_name = $_POST['first_name'];
        $last_name  = $_POST['last_name'];
        $age        = $_POST['age'];
        $email      = $_POST['email'];

        $fname_cond         = "" ;
        $lname_cond         = "" ;
        $age_cond           = "" ;
        $email_cond         = "" ;
        $condition_count    = 0 ;
        $where              = "" ;
        $and                = "";

        if(!empty(trim($first_name)))
        {
            if($condition_count)
            {
                $and = " AND ";
            }
            $fname_cond  = $and." first_name LIKE  '%$first_name%' ";
            $condition_count++;
        } 
        if(!empty(trim($last_name)))
        {
            if($condition_count)
            {
                $and = " AND ";
            }
            $lname_cond  = $and." last_name LIKE  '%$last_name%' ";
            $condition_count++;
        }
        if(!empty(trim($age)))
        {
            if($condition_count)
            {
                $and = " AND ";
            }
            $age_cond  = $and." age LIKE  '$age%' ";
            $condition_count++;
        }
        if(!empty(trim($email)))
        {
            if($condition_count)
            {
                $and = " AND ";
            }
            $email_cond  = $and." email LIKE '%$email%' ";
            $condition_count++;
        }
        if($condition_count)
        {
            $where = " WHERE ";
        }
        $query = "SELECT * FROM users".$where.$fname_cond.$lname_cond.$age_cond.$email_cond;
        $result_set = mysqli_query($conn,$query);
        if(!$result_set)
        {
            echo 'ERROR : '.mysqli_error($conn);
        }
        else
        {
            $users = mysqli_fetch_all($result_set,MYSQLI_ASSOC);
            
            foreach ($users as $user)
            {
                $response[] = $user;
                

            }
            echo json_encode($response);
        }
    }
