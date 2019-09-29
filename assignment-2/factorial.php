<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Looping Statements</h1>
    <h3>Factorial with For loop</h3>

    <?php
    // 5! = 5*4*3*2*1 = 120

    $num = 5 ;
    echo "$num! =";

    for( $i = $num-1 ; $i >= 1 ; $i --)
    {
        $num *= $i;
    }

    echo $num ;
    ?>

    <h3>Factorial with While loop</h3>

    <?php

    $num = 5 ;
    echo "$num! =" ;

    $j = $num - 1 ;

    while ($j >= 1) 
    {
        $num *= $j ; 

        $j-- ; 
    }

    echo $num ;
    ?>
</body>
</html>