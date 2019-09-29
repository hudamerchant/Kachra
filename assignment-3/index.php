<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h1>Student's Information ( Active / Inactive )</h1>
    <?php

        $status = 1; // 1=Active , 2= Inactive 

        $student_info = [ 
            [
                "name"      => "Ali",
                "dob"       => "Feb 2, 2000",
                "age"       => 19,
                "status"    => 2,
            ],
            [
                "name"      => "Hassan",
                "dob"       => "Dec 15, 2000",
                "age"       => 19,
                "status"    => 2,
            ],
            [
                "name"      => "Ammar",
                "dob"       => "Jan 1, 1999",
                "age"       => 20,
                "status"    => 2,
            ],
            [
                "name"      => "Mustafa",
                "dob"       => "Mar 3, 1999",
                "age"       => 20,
                "status"    => 0,
            ],
            [
                "name"      => "Murtaza",
                "dob"       => "Sept 6, 1999",
                "age"       => 20,
                "status"    => 1,
            ]
        ];
    ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>D.O.B.</th>
                <th>Age</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

    <?php foreach ($student_info as $value){?>
            
            <tr>
                <td><?php echo $value["name"]; ?></td>
                <td><?php echo $value["dob"]; ?></td>
                <td><?php echo $value["age"]; ?></td>
                <td><?php
                    if($status == 1){($value["status"] == $status ? $s = 'Active' : $s = 'Inactive' );}
                    if($status == 2){($value["status"] == $status ? $s = 'Inactive' : $s = 'Active' );}

                    if( $value["status"] !== 1 && $value["status"] !== 2)
                    {
                        $s = 'undefined';
                    }
                    
                    echo $s ;?>

                </td>
                <?php } ?>
            
            </tr>
        </tbody>
    </table>
</body>
</html>