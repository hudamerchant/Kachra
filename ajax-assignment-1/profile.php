<?php require('php/db_connection.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROFILE</title>
</head>
<body>
<?php
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
    <div class="container">
        <div class="header">
            <h1>WELCOME <?php echo $_SESSION['user_name'] ?></h1>
            <nav>
                <a href="Index.php">HOME</a>
                <a href="php/logout.php">LOG OUT</a>
            </nav>
        </div>
        <div class="textarea">
            <form method="post">
                <label>Create Post</label><br>
                <textarea name="user_post" rows="10" cols="30" 
                placeholder=" What's on your mind?"></textarea><br>
                <input type="submit" name="submit" value="post">
            </form>
        </div>
        <div id="display_post"><?php 
            foreach( $user_posts as $user_post )
            {?>
                <div>
                    <p><?php echo $user_post['post'];?></p>
                    <a href="edit.php?id='<?php $user_post['id'];?>'">EDIT POST</a>
                    <a href="delete.php?id='<?php $user_post['id'];?>'">DELETE POST</a>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $("form").on('submit',function(e){

            e.preventDefault();
            formData = {
                submit:("submit"),
                user_post : $("textarea").val()
            };
            
            $.ajax({
                url:"php/profile.php",
                type:"POST",
                dataType:"html",
                cache:false,
                data:formData,
                success:function(response){
                    $("#display_post").prepend(response);

                    
                } 
            })
        })
    </script> 
</body>
</html>