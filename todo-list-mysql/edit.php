<?php require('db_connection.php'); ?>
<?php require('db_tables.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="src/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<?php 
    if(isset($_REQUEST['task']))
    {
        $index = $_REQUEST['task'];
        
        if(isset($_REQUEST['edit_task']))
        {
            $editted_task = $_REQUEST['editted_task_name'] ; 
            $id           = $_REQUEST['id'];

            $query = " UPDATE tasks 
                SET     task_name   = '$editted_task'
                WHERE   id          = '$id' " ;

            $result_set = mysqli_query( $mysqli_connection , $query );
            if($result_set)
            {
                header('Location: index.php');
            }
            else
            {
                echo 'Error: ' . mysqli_error($mysqli_connection) ;
                die;
            }
        }
    }
?>
<div class="container">
    <form method='post' >
        <input type="text" name="editted_task_name" placeholder="To do ..." 
        value="<?php echo $list[$index]['task_name'] ?>" >

        <input type="hidden" name="id" placeholder="To do ..." 
        value="<?php echo $list[$index]['id'] ?>" >

        <input type="submit" name="edit_task" value="EDIT TASK" >
    
    </form>
</div>
</body>
</html>