<?php require('db_connection.php'); ?>

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
<div class="container">
    <h1>My To Do List...</h1>
    <form method='post' >
        <input type="text" name="task_name" placeholder="To do ..." >

        <input type="submit" name="submit" value="ADD TASK" >
    
    </form>

<?php include('list.php'); ?>
</div>
</body>
</html>