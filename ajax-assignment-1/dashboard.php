<?php require('db_connection.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="src/style.css">
    <title>Dashboard</title>
</head>
<body>
<?php
//for listing of posts

    $query = " SELECT *  FROM user_posts ORDER BY id DESC";
                
    $result_set = mysqli_query($conn,$query);
    if(!$result_set)
    {
        echo 'ERROR:';
    }
    else
    {
        $user_posts  = mysqli_fetch_all($result_set,MYSQLI_ASSOC);
    }
?>
<!-- display actual dashboard -->
    <div class="container">
        <div class="header">  
            <nav>
                <a href="user-profile.php">PROFILE</a>
                <a href="php/logout.php">LOG OUT</a>
            </nav>
        </div>
        <div class="textarea">
            <form method="post" id="dashboard_form">
                <label>Create Post:</label><br>
                <textarea name="user_post" rows="10" cols="30" placeholder=" What's on your mind?"></textarea><br>
                <input type="hidden" name="edit_id"> 
                <input type="submit" name="submit" value="post">
            </form>
        </div>
        <!-- listing all post -->
        <div id="post_list">
        <?php 
            foreach( $user_posts as $user_post )
            {?>
                <div id="<?php echo $user_post['id']?>">
                    <p><?php echo $user_post['post'];?></p>
                    <a href="edit_post.php" id="<?php echo $user_post['id'];?>" class="edit_post">EDIT POST</a>
                    <a href="delete_post.php" id="<?php echo $user_post['id'];?>" class="delete_post">DELETE POST</a>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="src/script.js"></script>
</body>
</html>
