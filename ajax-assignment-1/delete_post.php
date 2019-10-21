<?php require('db_connection.php') ?>
<?php session_start(); ?>
<?php
if (isset($_POST['id']))
{   $data = [];
    $post_id = $_POST['id'];
    
    $query = " DELETE FROM user_posts where id = '$post_id'";
    
    $result_set = mysqli_query($conn,$query);
    if(!$result_set)
    {
        echo 'ERROR:';
    }
    else
    {
        $data['id'] = $post_id;
        $data['status'] = "Post Deleted";
    }
echo json_encode($data);
}