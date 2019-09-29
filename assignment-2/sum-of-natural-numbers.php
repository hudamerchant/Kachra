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
    <h3>Sum of First 10 Natutral Numbers with For Loop</h3>

    <?php
    // 1+2+3+4+5+6+7+8+9+10 = 55
    
        $answer = 0 ;

        for( $i = 1 ; $i <= 10 ; $i++ )
        {
            $answer += $i ;
        }

        echo 'Sum =' . $answer ;
    ?>

<h3>Sum of First 10 Natutral Numbers with While Loop</h3>

<?php
    $answer = 0 ;

    $i = 1 ;

    while( $i <= 10 )
    {
        $answer += $i ;
        $i++ ;
    }

    echo 'Sum =' . $answer ;
?>
</body>
</html>