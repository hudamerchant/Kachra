<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="src/style.css" />
    <title>Document</title>
</head>
<body>
    <?php require_once('data.php'); ?>

    
    <div class='profile'>
    <?php
//setting cookie
        $task = [
            'done' => 1 ,
            'name' => '',
        ] ;
        $list = [] ;
//on submit
        if(isset($_REQUEST['submit']))
        {
            $task['name'] = $_REQUEST['task'] ;
//if cookie already exist push form values to it
            if(isset($_COOKIE['todo_list']) && !empty($_COOKIE['todo_list']))
            {
                $decrypt = base64_decode($_COOKIE['todo_list']) ;
                $list = unserialize($decrypt) ;

                $list[] = $task ; //normal array
            ?>
            <div class="list">
            <ul>
            <?php
                foreach ($list as $index => $task)
                {?>
                    <li>
                    <?php echo $task['name'] ; ?>
                    <a href="view.php?done" 
                    class="<?php echo ($task['done'] == 2) ? 'done': '' ?>"> Done </a>
                    <a href="#" class="edit"><i class="fa fa-edit"></i></a>
                    <a href="#" class="remove"><i class="fa fa-window-close"></i></a>
                    </li>
                <?php
                }
                $encrypt = serialize($list) ;
                $encrypt = base64_encode($encrypt) ;
            }
            else
            {
                $list[] = $task ; //normal array
                
                foreach ($list as $index => $task)
                {?>
                    <li>
                    <?php echo $task['name'] ; ?>
                    <a href="view.php?done" 
                    class="<?php echo ($task['done'] == 2) ? 'done': '' ?>"> Done </a>
                    <a href="#" class="edit"><i class="fa fa-edit"></i></a>
                    <a href="#" class="remove"><i class="fa fa-window-close"></i></a>
                    </li>
                <?php
                }
                ?>
            </ul>
            </div>
            <?php
                $encrypt = serialize($list) ;
                $encrypt = base64_encode($encrypt) ;
            } 
        }          
//else set cookie (encrypted string)
        if(isset($encrypt))
        {
            setcookie( 'todo_list' , $encrypt , time()+3600 , '/' );
        }

    ?>

    <?php
    ?>

        <form method='post'>
            <input type='text' name='task' placeholder='To do ...'>
            <input type='submit' name='submit'value = "ADD" >
        </form>

    <a href='logout.php'>LOG OUT</a>
    </div>

    <?php
var_dump($list);
//done
    if(isset($_GET['done']))
    {
        $task['done'] = 2;
        //header("Location:user_profile.php");
    }
    ?>

</body>
</html>