<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="src/style.css" />
    <title>Document</title>
</head>
<?php require("connection_db.php"); ?>
<body>
    <div class="container">
        <div class="welcome">
        <h1>WELCOME <?php echo $_SESSION['user_name'] ?>  !!!</h1>
        <a href="products.php">GET STARTED</a>
        </div>
    </div>
</body>
</html>