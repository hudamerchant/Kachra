$(document).ready(function(){

    $('.send').on('click',function(){         
        formData = {
            message : $('input[name=message]').val()
        }
        $.ajax({
            url  : SITE_URL+"/Chatbox/addChat",
            type : 'post',
            data : formData 
        })
    });
    setInterval(function(){
        offset = $('.chatbox-listing > li').length;
        data = {offset:offset}
        $.ajax({
            url:SITE_URL+"/Chatbox/getChat",
            type : 'post',
            data:data,
            success:function(response){
                $('.chatbox-listing').append(response);
            }
        })
     }, 5000);
})