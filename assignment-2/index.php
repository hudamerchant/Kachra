<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Conditional Statements</h1>
    <h3>Marksheet using if, else if and else</h3>

    <?php
        $name = 'abc xyz';
        $Eng = 75 ;
        $Math = 80 ;
        $Sci = 92 ;
        $His = 78 ;
        $Geo = 65 ;

        $max_marks = 500 ;
        $marks_obt = $Eng + $Math + $Sci + $His + $Geo ;

        $percentage = ( $marks_obt / $max_marks ) * 100 . '%';

        echo 'Name : ' . $name . '</br>';
        echo 'Marks Obt. : ' . $marks_obt . '</br>';
        echo 'Max Marks : ' . $max_marks . '</br>';
        echo 'Percentage : ' . $percentage . '</br>';

        if ( $percentage >= 80 && $percentage <= 100 )
        {
            echo 'Grade : A+' ;
        }
        else if ( $percentage >= 70 && $percentage < 80)
        {
            echo 'Grade : A' ;
        }
        else if ( $percentage >= 60 && $percentage < 70)
        {
            echo 'Grade : B';
        }
        else if ( $percentage >= 50 && $percentage < 60)
        {
            echo 'Grade : C';
        }
        else if ( $percentage >= 40 && $percentage < 50)
        {
            echo 'Grade : D';
        }
        else
        {
            echo 'Grade : F';
        }
    ?>

<h3>Marksheet using Switch-Case</h3>
    
    <?php
        echo 'Name : ' . $name . '</br>';
        echo 'Marks Obt. : ' . $marks_obt . '</br>';
        echo 'Max Marks : ' . $max_marks . '</br>';
        echo 'Percentage : ' . $percentage . '</br>';
        
        switch( $percentage )
        {
            case $percentage >= 80 && $percentage <= 100 :
                echo 'Grade : A+';
                break;

            case $percentage >= 70 && $percentage < 80 :
                echo 'Grade : A';
                break;

            case $percentage >= 60 && $percentage < 70 :
                echo 'Grade : B';
                break;

            case $percentage >= 50 && $percentage < 60 :
                echo 'Grade : C';
                break;

            case $percentage >= 40 && $percentage < 50 :
                echo 'Grade : D';
                break;
            
            default :
                echo 'Grade : F';
        }
    ?>
</body>
</html>