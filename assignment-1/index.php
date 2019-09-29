<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Assignment no. 1</h1>
    <h3>1. Swap the value of two variables:</h3>
    <?php
        $x = 5 ;
        $y = 12 ;
        echo ' x = ' . $x . '<br/>';    //assigned value of x
        echo ' y = ' . $y . '<br/>';    //assigned value of y

        //swapping

            $x += $y ;              //x=x+y ; x=5+12  ; x= 17
            $y = $x - $y;           //y=x-y ; y=17-12 ; y=5
            $x -= $y ;              //x=x-y ; x=17-5  ; x=12

        echo 'Values of \'x\' and \'y\' After Swapping:' . "</br>";
        echo ' x = ' . $x . '<br/>';    //assigned value of y
        echo ' y = ' . $y . '<br/>';    //assigned value of x
    ?>

    <h3>2. Add/Subtract two string type variables:</h3>
    <?php
        $foo = "100foo";   //string
        $bar = "200bar";   //string
     
        settype($foo, "integer");      //$foo is now an integer 100
        settype($bar, "integer");      //$bar is now an integer 200
     
        $c = $foo + $bar ;     //100 + 200
     
        settype($c, "string");     //$c is now a string "300"
     
        echo $c ;
    ?>
</body>
</html>