<?php require_once('db_connection.php') ?>
<?php 
if(isset($_POST['submit']))
{
    $response       = [];
    $response['id'] = $_POST['data'];
//$_POST['data'] was sent as JSON.stringify()
//decoding the data as an array
//then implde() to get a string to use in where clause 
    $id_arr         = json_decode($_POST['data']);
    $user_ids       = implode(",",$id_arr);

    $query      = "DELETE FROM users WHERE id IN ($user_ids)"; //$user_ids is like (1,2,3)etc 
    $result_set = mysqli_query($conn , $query);
    if(!$result_set)
    {
        $response['msg'] = "ERROR : ". mysqli_error($conn);
    }
    else
    {
        $response['msg'] = 'success';
    }
    echo json_encode($response);
}