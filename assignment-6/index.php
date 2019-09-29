<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php
    require_once('errors.php');

    //form validations
        $form_visible = true ;
        $error = [] ;

        if(isset($_REQUEST['submit']))
        { 
            if( empty( trim($_REQUEST['full_name'])))
            { 
               $error['full_name'] = FN_ERROR ; 
            }
            else
            {
                $full_name = $_REQUEST['full_name'];
            }

            if( empty( trim($_REQUEST['age'])))
            { 
                $error['age'] = AGE_ERROR ; 
            }
            else
            {
                $age = $_REQUEST['age'];
            }

            if( !isset($_REQUEST['gender']))
            { 
                $error['gender'] = GENDER_ERROR ; 
            }
            else
            {
                $gender = $_REQUEST['gender'];
            }

            if( !isset($_REQUEST['skills']))
            { 
                $error['skills'] = SKILLS_ERROR ; 
            }
            else
            {
                $skills = $_REQUEST['skills'];
            }

            if( empty( trim($_REQUEST['city'])))
            { 
                $error['city'] = CITY_ERROR ; 
            }
            else
            {
                $city = $_REQUEST['city'];
            }

            if( count($error) == 0 )
            {
                $form_visible = false ;?>

                    <p>NAME : <?php echo $full_name ?></p>
                    <p>AGE : <?php echo $age ?></p>
                    <p>GENDER : <?php echo $gender ?></p>
                    <p>SKILLS :</p>
                    <ul>
                        <?php
                        foreach ($_REQUEST['skills'] as $value)
                        {
                            ?><li><?php echo $value ?></li><?php
                        }
                        ?>
                    </ul>
                    <p>CITY : <?php echo $city ?></p>

    <?php
            }
        }
    ?>
    
    <?php if($form_visible){?>
    <div class = "container">
    <form method="post">
            <label>NAME:</label> 
            <input name="full_name" type="text" value="<?php echo isset($full_name) ? $full_name : '' ?>" >
            <p><?php echo array_key_exists( 'full_name', $error ) ? $error['full_name'] : '' ?></p>

            <label>AGE:</label>
            <input name="age" type="number" value="<?php echo isset($age) ? $age : '' ?>" >
            
            <p><?php echo array_key_exists( 'age', $error ) ? $error['age'] : '' ?></p>

            <label>GENDER:</label><br>
            <input name="gender" type="radio" value="Male"
            <?php echo isset($gender) && $gender == "Male" ? 'checked' : '' ?>
            > Male<br>

            <input name="gender" type="radio" value="Female"
            <?php echo isset($gender) && $gender == "Female" ? 'checked' : '' ?>
            > Female<br>
            
            <input name="gender" type="radio" value="Other"
            <?php echo isset($gender) && $gender == "Other" ? 'checked' : '' ?>
            > Other 
            
            <p><?php echo array_key_exists( 'gender', $error ) ? $error['gender'] : '' ?></p>

            <label>SKILLS:</label><br>
            <input name="skills[]" type="checkbox" value="Programming" 
            <?php echo isset($skills) && in_array("Programming",$skills) ? 'checked' : '' ?>
            > Programming<br>
            
            <input name="skills[]" type="checkbox" value="Communication" 
            <?php echo isset($skills) && in_array("Communication",$skills) ? 'checked' : '' ?>
            > Communication<br>
            
            <input name="skills[]" type="checkbox" value="Manangement" 
            <?php echo isset($skills) &&  in_array("Manangement",$skills) ? 'checked' : '' ?>
            > Manangement
            
            <p><?php echo array_key_exists( 'skills', $error ) ? $error['skills'] : '' ?></p>
            
            <select name="city">
                <option value=""<?php echo isset($city) && $city == "" ? 'selected' : '' ?> >
                Select city
                </option>

                <option value="Karachi" <?php echo isset($city) && $city == "Karachi" ? 'selected' : '' ?> >
                Karachi
                </option>
                
                <option value="Islamabad" <?php echo isset($city) && $city == "Islamabad" ? 'selected' : '' ?> >
                Islamabad
                </option>
                
                <option value="Lahore" <?php echo isset($city) && $city == "Lahore" ? 'selected' : '' ?> >
                Lahore
                </option>
                
                <option value="Peshawar" <?php echo isset($city) && $city == "Peshawar" ? 'selected' : '' ?> >
                Peshawar
                </option>
                
                <option value="Hyderabad" <?php echo isset($city) && $city == "Hyderabad" ? 'selected' : '' ?> >
                Hyderabad
                </option>

            </select>
            <p><?php echo array_key_exists( 'city', $error ) ? $error['city'] : '' ?></p>
            <input name="submit" type="submit" value="SUBMIT"/>
    </form>
    </div>
    <?php } ?>
</body>
</html>