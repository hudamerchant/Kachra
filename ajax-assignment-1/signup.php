<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up AJAX</title>
</head>
<body>
    <div class="container">
        <div class="signup">
            <h1>Create Your Account</h1>
            <form method="post">
                <label>Name:</label><br>
                <input type="text" name="name" value="<?php echo isset($error) && isset($_POST['name']) ? $_POST['name'] : "" ?>" required> 
                <br>

                <label>Email:</label><br>
                <input type="email" name="email" required value="<?php echo isset($error) && isset($_POST['email']) ? $_POST['email'] : "" ?>" >
                <br>
                
                <label>Password:</label><br>
                <input type="password" name="password" required>
                <br>

                <label>Confirm Password:</label><br>
                <input type="password" name="re_password" required>
                <br>
                <span>
                    <?php echo isset($_SESSION['password_error']) ?  $_SESSION['password_error'] : '' ?>
                </span><br>

                <label>Number</label><br>
                <input type="text" name="number" value="<?php echo isset($error) && isset($_POST['number']) ? $_POST['number'] : "" ?>" >
                <br>
                
                <span>
                    <?php echo isset($_SESSION['empty_fields']) ?  $_SESSION['empty_fields'] : '' ?>
                </span><br>

                <input type="submit" value="SIGN UP" name="submit">
            </form>
            <p> Already a member?<a href="index.php"> Login </a>here.</p>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $("form").on('submit',function(e){

            e.preventDefault();
            formData = {};

            $(this).find("input").each(function(){ 
                formData[$(this).attr("name")] = $(this).val();
            }) ;

            $.ajax({
                url:"php/signup.php",
                type:"POST",
                dataType:"html",
                cache:false,
                data:formData,
                success:function(response){
                    window.location.href = "profile.php";
                } 
            })
        })
    </script> 
</body>
</html>