<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN AJAX</title>
</head>
<body>
    <div class="container">
        <div class="login">
            <h1>Login form</h1>
            <form method="post">

                <input type="email" name="email" placeholder="Email" required><br>
                
                <input type="password" name="passowrd" placeholder="Password" required><br>
                <!-- <span>
                    <?php //echo isset($_SESSION['credentials_error'])? $_SESSION['credentials_error']:'' ?>
                </span><br> -->
                <input type="submit" value="LOG IN" name="submit">
            </form>
            <a href="signup.php">Sign Up</a>
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
                url:"php/login.php",
                type:"POST",
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