<?php require_once('db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<!-- retrieving data from database to display list of registered users -->
<?php
    $query ="SELECT * FROM users";

    $result_set = mysqli_query($conn,$query);
    if(!$result_set)
    {
        $message = "ERROR : ". mysqli_error($conn);
        die;
    }
    else
    {
        $users = mysqli_fetch_all($result_set,MYSQLI_ASSOC);
    }
?>
<!-- form for user input -->
    <div class="container">
        <form class="user_input">
            <input type="text" name="first_name" placeholder="First Name">
            <input type="text" name="last_name" placeholder="Last Name">
            <input type="number" name="age" placeholder="Age">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Add User">
            <span><p id="form_msg"></p></span>
        </form>

<!-- display record list -->
        <div class="user_list">
            <table>
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="check_all" class="check_all" value="check_all" >Select All
                        </th>
                        <th>No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot style="display: table-header-group !important;">
                    <tr>
                        <th></th>
                        <th></th>
                        <th>
                        <input type="text" name="first_name" class="find_fname search_all" placeholder="First Name">
                        </th>
                        <th>
                        <input type="text" name="last_name" class="find_lname search_all" placeholder="Last Name"></th>
                        <th><input type="number" name="age" class="find_age search_all" placeholder="Age"></th>
                        <th><input type="email" name="email" class="find_email search_all" placeholder="Email"></th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach($users as $user){?>
                    <tr id="<?php echo $user['id'] ?>" >
                        <td>
                            <input type="checkbox" name="delete_checkbox[]" class="delete_checkbox" value="<?php echo $user['id'] ?>" >
                        </td> 
                        <td><?php echo $user['id'] ?></td>
                        <td id="fname" ><?php echo $user['first_name'] ?></td>
                        <td id="lname" ><?php echo $user['last_name'] ?></td>
                        <td id="age"><?php echo $user['age'] ?></td>
                        <td id="email"><?php echo $user['email'] ?></td>
                        <td>
                            <a href="#" id="<?php echo $user['id'] ?>" class="update">UPDATE</a>
                            <a href="#" id="<?php echo $user['id'] ?>" class="delete">DELETE</a>
                        </td>
                    </tr>    
                <?php } ?>
                </tbody>
            </table>
            <input type="submit" name="delete" id="delete_btn" value="delete">
        </div>

<!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <input type="hidden" name="id" id="modal_id">
                            <label>First Name:</label><br>
                            <input type="text" name="first_name" id="modal_fname">
                            <br>
                            <label>Last Name:</label><br>
                            <input type="text" name="last_name" id="modal_lname">
                            <br>
                            <label>Age:</label><br>
                            <input type="number" name="age" id="modal_age">
                            <br>
                            <label>Email:</label><br>
                            <input type="email" name="email" id="modal_email">
                            <br>
                            <label>Current Password:</label><br>
                            <input type="password" name="password" id="old_password">
                            <br>
                            <label>New Password:</label><br>
                            <input type="password" name="password" id="new_password">
                            <br>
                            <span><p id="modal_msg"></p></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="update_btn" name="update" value="UPDATE" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="assets/JS/script.js?v1"></script>
</body>
</html>