<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Assignment 4 ('User Defined Functions')</h1>
    <h3>1. sum:</h3>
    <?php
        //sum
        function sum( $num_1 , $num_2 )
        {
            $answer = $num_1 + $num_2;
            return $answer ;
        }

        echo sum( 2 , 3 );
        echo '<br>';
    ?>

    <h3>2. is_array:</h3>
    <?php       
        //is_array
        function isThisArray ( $array )
        {
            $data_type = gettype( $array );
            ($data_type == 'array' ? $x = true : $x =  false);

            return $x ;
        }
        
        $__ = 2;
        $arr= [ 
                'J.K. Rowling'      => 'Harry Potter', 
                'Suzanne Collins'   => 'The Hunger Games',
                'Charles Dickens'   => 'Great Expectations',
                'John Green'        => 'The Fault in Our Stars',
                'Veronica Roth'     => 'Divergent'
            ];

        echo isThisArray($__);
        echo '<br>';

        echo isThisArray ($arr);
        echo '<br>';
    ?>

    <h3>3. array_keys:</h3>
    <?php
        //array_keys
        function keysInArray ($array)
        {
            $keys = [];
            foreach ( $array as $k => $val )
            {
                $keys[] = $k;
            }

            return $keys;
        }

        var_dump (keysInArray($arr));
    ?>

    <h3>4. array_values:</h3>
    <?php
        //array_values
        function valuesInArray ($array)
        {
            $values = [];
            foreach ( $array as $k => $val )
            {
                $values[] = $val;
            }

            return $values;
        }

        var_dump (valuesInArray($arr));
    ?>

    <h3>5. array_key_exists:</h3>
    <?php
        //array_key_exist
        function keyExistsInArray ( $key , $array )
        {
            if( isset($array[$key]) || $array[$key] == null )
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        $a = [ 'name' => 'Ali',
               'age'  => 14 ,
               'dob'  => null ];
        
        echo keyExistsInArray( 'name' , $a );
        echo '<br>' ;
        
        echo keyExistsInArray( 'dob' , $a );
    ?>
</body>
</html>