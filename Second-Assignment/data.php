<?php require_once('db_connection.php') ?>
<?php

if(isset($_POST['submit']))
{
//saving the data in variables recieved through ajax
    $response = [] ;
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $age        = $_POST['age'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];

//validating and inserting the data in database
    if(isset($first_name) && isset($last_name) && isset($age) && isset($email) && isset($password))
    {
        if(!empty(trim($first_name)) && !empty(trim($last_name)) && !empty(trim($age)) && !empty(trim($email)) && !empty(trim($password)))
        {
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $query      ="INSERT INTO users (first_name,last_name,age,email,password)
                            VALUES('$first_name','$last_name','$age','$email','$password')";

            $result_set = mysqli_query($conn,$query);
            if(!$result_set)
            {
                $response['msg'] = EMAIL_ERROR;
            }
            else
            {
                $id         = mysqli_insert_id($conn);
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
            $response['msg']  = EMPTY_FIELDS_ERROR;                
        }
    }
    echo json_encode($response);
}