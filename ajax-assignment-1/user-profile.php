<?php require('db_connection.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="src/style.css">
    <title>User Profile</title>
</head>
<body>
    <?php
    $id = $_SESSION['user_id'];

    $query = "SELECT * FROM  user_posts 
            WHERE user_id = '$id' ORDER BY id DESC"; 

    $result_set = mysqli_query($conn,$query);
    if(!$result_set)
    {
        echo 'ERROR:';
    }
    else
    {
        $user_posts  = mysqli_fetch_all($result_set,MYSQLI_ASSOC);
    }

//getting user information
    $query = "SELECT * FROM  registered_users 
                WHERE id = '$id'"; 

    $result_set = mysqli_query($conn,$query);
    if(!$result_set)
    {
        echo 'ERROR:'.mysqli_error($conn);
    }
    else
    {
        $user  = mysqli_fetch_assoc($result_set);
    }
    ?>
    <div class="container">
        <div class="header">
            <nav>
                <a href="dashboard.php">HOME</a>
                <a href="php/logout.php">LOG OUT</a>
            </nav>
            <h1>WELCOME <?php echo $_SESSION['user_name'] ?>  !</h1>
            <table>
                <tbody>
                    <tr>
                        <td>NAME:</td>
                        <td><?php echo $user['name']; ?></td>
                    </tr>
                    <tr>
                        <td>EMAIL:</td>
                        <td><?php echo $user['email']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="post_list">
            <?php 
                foreach( $user_posts as $user_post )
                {
                    $_SESSION['post_id'] = $user_post['id'];
                    ?>
                    <div>
                        <p><?php echo $user_post['post'];?></p>
                    </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="src/script.js"></script>
</body>
</html>