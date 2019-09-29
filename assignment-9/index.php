<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $arr = ['Apple' , 'ognaM' , 'Banana' , 'elppA' ] ;

        $str = '' ;
        $count = 0;

        foreach ($arr as $value) 
        {
            if( $count % 2 )
            {
                $value = strrev($value) ;                
            }
            
            $str .= $value . ' , ' ;
            $count ++ ;   
        }
        
        //substr ($str , 'start' , ' -length (negative bcz want to remove word from the last)' )
        if( substr_count( $str , 'Apple') > 0 ) 
        {
            $position = strpos( $str , ' Apple ' , 6 ) ;
            
            $length = strlen( $str ) ;
            
            $str = substr( $str , 0 , $position - $length - 1 ) ;
            
        }
        
        echo $str ; 
    ?>
</body>
</html>