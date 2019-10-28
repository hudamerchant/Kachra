<?php require_once('db_connection.php') ?>
<?php
//updating the data
if(isset($_POST['update']))
{
    $response       = [];
    $id             = $_POST['id'];
    $first_name     = $_POST['first_name'];
    $last_name      = $_POST['last_name'];
    $age            = $_POST['age'];
    $email          = $_POST['email'];

    $password       = $_POST['old_password'];//verify password then update the values
    $new_password   = $_POST['new_password'];

    if(!empty(trim($first_name)) && !empty(trim($last_name)) && !empty(trim($age)) && !empty(trim($email)) && !empty(trim($password)))
    {
        $query      = "SELECT * FROM users WHERE id = '$id' ";
        $result_set = mysqli_query($conn,$query);
        if(!$result_set)
        {
            $response['msg'] = 'ERROR :'.mysqli_error($conn);
            die;
        }
        else
        {
            $user        = mysqli_fetch_assoc($result_set);
            $hashed_pass = $user['password'];
            $verify_pass = password_verify($password,$hashed_pass);
//if password verified update the values else show error 
            if($password == $verify_pass)
            {
                if(!empty(trim($new_password)))
                {
                    $password = password_hash($new_password, PASSWORD_DEFAULT);
                }
                else
                {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                }

                $query = "UPDATE users SET 
                            first_name = '$first_name' ,
                            last_name = '$last_name' ,
                            age = '$age' ,
                            email = '$email' ,
                            password = '$password'
                            WHERE id = '$id'";

                $result_set = mysqli_query($conn,$query);
                if(!$result_set)
                {
                    $response['msg'] = "ERROR : ". mysqli_error($conn);    
                }
                else
                {
                    $query      = " SELECT *  FROM users where id =  $id";
            
                    $result_set = mysqli_query($conn,$query);
                    $user       = mysqli_fetch_assoc($result_set);

                    $user_id    = $user['id'];

                    $html = "<tr id=".$user_id.">";
                    $html .= "<td><input type='checkbox' name='delete_checkbox[]'   class='delete_checkbox' value=".$user_id." ></td>";
                    $html .= "<td>".$user_id."</td>";
                    $html .= "<td>".$user['first_name']."</td>";
                    $html .= "<td>".$user['last_name']."</td>";
                    $html .= "<td>".$user['age']."</td>";
                    $html .= "<td>".$user['email']."</td>";
                    $html .= "<td><a href='#' id=".$user_id." class='update'>UPDATE</a>";
                    $html .= "  <a href='#' id=".$user_id." class='delete'>DELETE</a></td>";
                    $html .= "</tr>";

                    $response['msg']    = "success";
                    $response['data']   = $html;
                }
            }
            else
            {
                $response['msg'] = PASS_ERROR;
            }
            
        }
    }
    else
    {
        $response['msg'] = EMPTY_FIELDS_ERROR;
    }
    echo json_encode($response);
}

//deleting the value from database 
if(isset($_POST['delete']))
{   
    $response   = [];
    $id         = $_POST['id'];

    $query = "DELETE FROM users WHERE id ='$id' ";
    $result_set = mysqli_query($conn,$query);
    if(!$result_set)
    {
        $response['msg'] = "ERROR : ". mysqli_error($conn);
    }
    else
    {
        $response['msg'] = 'success';
        $response['id']  = $id ;
    }
    echo json_encode($response);
}