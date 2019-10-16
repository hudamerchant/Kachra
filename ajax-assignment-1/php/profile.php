<?php session_start(); ?>
<?php require('db_connection.php'); ?>
<?php
    if(isset($_POST['submit']))
    {
        $post = $_POST['user_post'];

        // $query = "INSERT INTO user_posts(post,user_id) 
        //         VALUES ('$post',(SELECT id FROM registered_users WHERE name = 'user5' ))";

        $query = "INSERT INTO user_posts(post) 
                    VALUES ('$post')";
        $result_set = mysqli_query($conn,$query);

        if(!$result_set)
        {
            echo "ERROR :".mysqli_error($conn);
        }
        else
        {
            $id =  mysqli_insert_id($conn);
            $query = " SELECT *  FROM user_posts where id =  $id";
            
            $result_set = mysqli_query($conn,$query);
            $user_post  = mysqli_fetch_assoc($result_set);

            $html = "<div>" ;
            $html .= "<p>".$user_post['post']."</p>";
            $html .= '<a href="edit.php?id='.$user_post['id'].'">EDIT POST</a>  ';
            $html .= '<a href="delete.php?id='.$user_post['id'].'">DELETE POST</a>';
            $html .= "</div>" ;
            echo $html;  
            
        }
    }

