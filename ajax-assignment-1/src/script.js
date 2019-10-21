$(document).ready(function(){
    //sign up
    $("#signup").on('submit' , function(e){
        e.preventDefault();
        formData = {};
        $(this).find("input").each(function(){
            formData[$(this).attr("name")] = $(this).val();
        })

        $.ajax({
            url:"php/signup_data.php",
            type:"post",
            data:formData,
            dataType:"html",
            cache:false,
            success:function(response){
                if(response == "Success")
                {
                    swal("", "Account created successfully! Please Login to continue", "success")
                    .then(function(e){
                        $("#signup").trigger("reset");
                        window.location.replace('index.php');
                    });
                }
                else
                {
                    $('#form_msg').html(response);
                    $('input[type="password"]').val("");
                }
            }
        })
    })
     //login
    $("#login").on('submit' , function(e){
        e.preventDefault();
        formData = {};
        $(this).find("input").each(function(){
            formData[$(this).attr("name")] = $(this).val();
        })

        $.ajax({
            url:"php/login_data.php",
            type:"post",
            data:formData,
            dataType:"html",
            cache:false,
            success:function(response){
                if(response == "Success")
                {
                    $("#login").trigger("reset");
                    window.location.replace('dashboard.php');
                }
                else
                {
                    $('#form_msg').html(response);
                    $("#login").trigger("reset");
                }
            }
        })
    })
    $("#dashboard_form").on('submit' , function(e){
        e.preventDefault();

        //dashboard
        formData = {
            submit: "submit" ,
            user_post : $("textarea").val()
        };

        $.ajax({
            url:"php/dashboard_data.php",
            type:"post",
            data:formData,
            dataType:"html",
            cache:false,
            success:function(response){
            // edditting the post through id
                if($("#post_list div").attr("id") == $('input[type="hidden"]').val())
                {   
                    var id = $("#post_list div").attr("id");
                    $("#post_list div").each(function(i,v){
                        if($(this).attr("id") == id){
                            $(this).replaceWith(response);
                        }
                    })
                    
                    $('input[type="hidden"]').val("");
                }
                else
                {
                 // inserting new post
                    $("#post_list").prepend(response);
                }
                $("#dashboard_form").trigger("reset");
            }
        })
    })
    //edit user post
    $(".edit_post").on('click',function(e){
        e.preventDefault();
        formData = {
            id:$(this).attr("id")
        
        }
        $.ajax({
            url:"edit_post.php",
            type:"POST",
            data:formData,
            dataType:"json",
            cache:false,
            success:function(response){
                $("textarea").val(response.post);
                $('input[type="hidden"]').val(response.id);
            }
        })
    })
    //delete user post
    $(".delete_post").on('click',function(e){
        e.preventDefault();
        formData = {
            id:$(this).attr("id")
        
        }
        $.ajax({
            url:"delete_post.php",
            type:"POST",
            data:formData,
            dataType:"json",
            cache:false,
            success:function(response){
                $("#post_list div").each(function(i,v){
                    if($(this).attr("id") == response.id){
                        $(this).remove();
                    }
                })
            }
        })
    })
})