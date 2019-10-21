<?php require('db_connection.php') ?>
<?php session_start(); ?>
<?php
if (isset($_POST['id']))
{
    $data = [];
    
    $post_id                  = $_POST['id'];
    $_SESSION['edit_post_id'] = $_POST['id'];
    $query = " SELECT *  FROM user_posts where id = '$post_id'";
    
    $result_set = mysqli_query($conn,$query);
    if(!$result_set)
    {
        echo 'ERROR:';
    }
    else
    {
        $user_post  = mysqli_fetch_assoc($result_set);
        $_SESSION['updatted_post'] = $user_post['post'];
        $post = $user_post['post'];
        

        $data['id'] = $post_id;
        $data['post'] = $post;
    } 
    echo json_encode($data);
}