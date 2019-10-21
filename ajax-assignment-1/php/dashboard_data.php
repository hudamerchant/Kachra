<?php require('../db_connection.php') ?>
<?php session_start(); ?>
<?php
    if(isset($_POST['submit']))
    {
        if(!isset($_SESSION['edit_post_id']))
        {
            $post = $_POST['user_post'];
            $id   = $_SESSION['user_id'];

            $query = "INSERT INTO user_posts(post , user_id) 
                        VALUES ('$post' , '$id')";
        
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

                $post = $user_post['post'];
                $id   = $user_post['id'];

                $html = "<div id=".$id.">" ;
                $html .= "<p>".$post."</p>";
                $html .= '<a href="edit_post.php" id='.$id.' class="edit_post" >EDIT POST</a>  ';
                $html .= '<a href="delete_post.php" id='.$id.' class="delete_post">DELETE POST</a>';
                $html .= "</div>" ;
                echo $html;  
            }

        }
        else
        {
            $updated_post = $_POST['user_post'];
            $id           = $_SESSION['edit_post_id'];

            $query = "UPDATE user_posts SET post = '$updated_post' 
                    WHERE id = '$id'";

            $result_set = mysqli_query($conn,$query);
               
            if(!$result_set)
            {
                echo "ERROR :".mysqli_error($conn);
            }
            else
            {
                $query = " SELECT *  FROM user_posts where id =  $id";
                
                $result_set = mysqli_query($conn,$query);
                $user_post  = mysqli_fetch_assoc($result_set);

                $post = $user_post['post'];
                
                $html = "<div id=".$id.">" ;
                $html .= "<p>".$post."</p>";
                $html .= '<a href="edit_post.php" id='.$id.' class="edit_post" >EDIT POST</a>  ';
                $html .= '<a href="delete_post.php" id='.$id.' class="delete_post">DELETE POST</a>';
                $html .= "</div>" ;
                echo $html;  

            }
            unset($_SESSION['edit_post_id']);
        }
        
        
    }