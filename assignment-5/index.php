<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Document</title>
</head>
<body>
    <?php

        $user_information = [
            [
                "unique_id" => 001 ,
                "name"      => "Ali",
                "age"       => 19,
                "phone_num" => '03331234567',
            ],
            [
                "unique_id" => 002 ,
                "name"      => "Hassan",
                "age"       => 19,
                "phone_num" => '03007894561'
            ],
            [
                "unique_id" => 003 ,
                "name"      => "Ammar",
                "age"       => 20,
                "phone_num" => '03325561238'
            ],
            [
                "unique_id" => 004 ,
                "name"      => "Mustafa",
                "age"       => 20,
                "phone_num" => '21331237895'
            ],
            [
                "unique_id" => 005 ,
                "name"      => "Murtaza",
                "age"       => 20,
                "phone_num" => '02034568219'
            ]
        ];

        $user_credentials = [
            //user_info is the child array
            [
                "unique_id"           => 001 ,
                "email"               => 'ali@example.com',
                "password"            => 'abc123',
                "user_information_id" => 001
            ],
            [
                "unique_id"           => 002 ,
                "email"               => 'hassan@example.com',
                "password"            => 'a1b2c3',
                "user_information_id" => 002
            ],
            [
                "unique_id"           => 003 ,
                "email"               => 'ammar@example.com',
                "password"            => 'xyz123',
                "user_information_id" => 003
            ],
            [
                "unique_id"           => 004 ,
                "email"               => 'mustafa@example.com',
                "password"            => '123abc',
                "user_information_id" => 004
            ],
            [
                "unique_id"           => 005 ,
                "email"               => 'murtaza@example.com',
                "password"            => 'abcxyz',
                "user_information_id" => 005
            ]
           
        ];

        if( isset($_POST['submit']) )
        {

            //getting user id using email
            if( !empty($_POST['email']) )
            {
                foreach( $user_credentials as $user_info )
                {
                   foreach ($user_info as $key => $val)
                    { 
                        if( $user_info["email"] == $_POST["email"] && $user_info["password"] == $_POST["password"])
                        {
                            $user_id = $user_info["user_information_id"];
                        }
                        
                    }
                }
            }
  
            //matching the fetched user id in the main array i.e. $user_information
            
            if( isset($user_id) )
            {
                foreach( $user_information as $value )
                {
                    if( $value["unique_id"] == $user_id )
                    {
                       $name      = $value["name"];
                       $age       = $value["age"];
                       $phone_num = $value["phone_num"];
                    }
                
                }
                ?>
                <div class="output">
                    <h3>NAME : <?php echo $name ?></h3>
                    <h3>AGE : <?php echo $age ?></h3>
                    <h3>PHONE NO. : <?php echo $phone_num ?></h3>
                </div>
                <?php
            }

            //if !isset($user_id)
            else
            {?>
                <div class="output">
                <h3><?php echo 'Invalid Email Or Password!'; ?></h3>
            </div>
            <?php
            }
        }
        else
        {?>
            <div class = "container">
            <h1>LOGIN</h1>
            <form method="post" >
                <input name="email" type="email" placeholder="Enter Email" required/><br>
                <input name="password" type="password" placeholder="Enter password" required/><br>
                <input name="submit" type="submit" value="LOGIN" />
            </form>
            </div>  <?php
        }     
    ?>

   
</body>
</html>