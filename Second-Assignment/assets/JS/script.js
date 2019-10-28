$(document).ready(function(){
//--- inserting data ---//
    $(document).on('submit','.user_input',function(e){
        e.preventDefault();
        formData = {};
        $(this).find('input').each(function(){
            formData[$(this).attr('name')] = $(this).val();
        })
        $.ajax({
            url      : "data.php" ,
            type     : "post" ,
            data     : formData ,
            dataType : "json",
            cache    : false,
            success  :function(response){
                //validate and append into table
                if(response.msg != 'success')
                {
                    document.getElementById('form_msg').innerHTML=response.msg;
                    $('input[type="password"]').val(""); 
                    if(response.msg == 'Email Already Registerd.')
                    {
                        $('input[type="email"]').val("");
                    }
                }
                else
                {
                    $('form').trigger('reset');
                    $("table > tbody").append(response.data);
                }
            }
        })
    })
//--- on click <a> updatde modal will pop up ---//
    $(document).on('click','.update',function(e){
        e.preventDefault();

        id          = $(this).attr('id');
        first_name  = $('#'+id).children('#fname').text();
        last_name   = $('#'+id).children('#lname').text();
        age         = $('#'+id).children('#age').text();
        email       = $('#'+id).children('#email').text();
        //holding values in modal input fields
        $('#modal_id').val(id);
        $('#modal_fname').val(first_name);
        $('#modal_lname').val(last_name);
        $('#modal_age').val(age);
        $('#modal_email').val(email);
        $('#myModal').modal('toggle');  
    })
//--- update record on click modal update button ---//
    $(document).on('click','#update_btn',function(e){
        e.preventDefault();
        formData = {
            id              : $('#modal_id').val(),
            first_name      : $('#modal_fname').val(),
            last_name       : $('#modal_lname').val(),
            age             : $('#modal_age').val(),
            email           : $('#modal_email').val(),
            old_password    : $('#old_password').val(),
            new_password    : $('#new_password').val(),
            update          : $('#update_btn').val()
        };
        $.ajax({
            url      : "data_update_delete.php" ,
            type     : "post" ,
            data     : formData ,
            dataType : "json",
            cache    : false,
            success  : function(response){
                //validating through old password
                if(response.msg != 'success')
                {
                    document.getElementById('modal_msg').innerHTML=response.msg;
                    $('input[type="password"]').val("");
                    $('#old_password').focus();   
                }
                //after validation update/replace the records
                else
                {
                    $('.modal-body > .form').trigger('reset');
                    $('#myModal').modal('toggle');
                    $("table > tbody > tr").each(function(i,v){
                        if($(this).attr("id") == id){
                            $(this).replaceWith(response.data);
                        }
                    })
                }
            }
        })
    })
//--- deleteing the record on click <a> delete ---// 
    $(document).on('click','.delete',function(e){
        e.preventDefault();

        formData = {
            id      : $(this).attr('id'),
            delete  : 'delete'
        }    
        $.ajax({
            url         : 'data_update_delete.php' ,
            type        : 'post' ,
            data        : formData ,
            dataType    : 'json' ,
            cache       : false ,
            success     : function(response){
                if(response.msg == 'success')
                {
                    $("table > tbody > tr").each(function(i,v){
                        if($(this).attr("id") == response.id){
                            $(this).remove();
                        }
                    })
                }
            }
        })
    })
//--- Selecting all check boxes ---// 
    $(document).on('click','.check_all',function(){
        checkbox_value = []; //array of record ids to be deleted
        if($(this).prop("checked"))
        {
            //if select all is checked 
            //then check all checkboxes in the list
            $("table > tbody > tr ").each(function(i,v){
                $('.delete_checkbox').prop('checked' , true);
            })
            //push the id of selected checkboxes in an array to be deleted
            $("table > tbody ").each(function(i,v){
                $('.delete_checkbox:checked').each(function(){
                    checkbox_value.push($(this).val());
                }) 
            })
        }
        else
        {   
            //if select all is unchecked 
            //then uncheck all checkboxes in the list
            $("table > tbody > tr ").each(function(i,v){
                $('.delete_checkbox').prop('checked' , false);
            })
        }
    })
//--- Selecting specific check boxes ---// 
    $(document).on('click','.delete_checkbox',function(){
        checkbox_value = [];  //array of record ids to be deleted
        // pushingthe ids of checked chekboxes in array 
        $("table > tbody ").each(function(i,v){
            $('.delete_checkbox:checked').each(function(){
                checkbox_value.push($(this).val());
            }) 
        })
        // checkbox is checked and the value is pushed in the array
        // after that if user uncheck the checkbox
        // removing the id of specific unchecked checkbox from the array using $.grep()
        if($(this).prop("checked") == false )
        {
            remove_val      = $(this).val();
            checkbox_value  = $.grep(checkbox_value , function(val){
                return val != remove_val ;
            })
        }
    })
//--- deleting multiple records on click delete button ---//
    $(document).on('click','#delete_btn',function(e){
        e.preventDefault();
        checkbox_value = []; //array of record ids to be deleted
        //pushing the ids of final selected records in the array
            $("table > tbody ").each(function(i,v){
                $('.delete_checkbox:checked').each(function(){
                    checkbox_value.push($(this).val());
                }) 
            })
        if(checkbox_value.length == 0)
        {
            alert('please select any value');
        }
        else{
            //converting array into string with JSON.stringify() 
            // to send the data through ajax 
            data = JSON.stringify(checkbox_value);
            formData = {
                data : data,
                submit : $(this).val()
            }
            result = confirm('are you sure?');
            if(result == true){
                $.ajax({
                    url : 'delete_multiple.php',
                    type : 'post' ,
                    data : formData ,
                    dataType : 'json' ,
                    cache : false ,
                    success : function(response){
                        if(response.msg == 'success')
                        {
                            parsedData = JSON.parse(response.id);
                            $.each( parsedData , function(i,v){
                                $('tbody > #'+ v).remove();
                            })
                            $('.check_all').prop('checked' , false);
                        }
                    }
                })
            }   
        }
    })
//--- Search Keyup first name ---//
    $(document).on('keyup','.find_fname',function(){
        search_val = $(this).val().toLowerCase();
        //on keyup hide all records
        $('table > tbody > tr').hide();
        
        $('table > tbody > tr').find('#fname').each(function(i,v){    
            tr_value = $(this).text().toLowerCase();
            //showing only those records that contain the search value in first name
            if(tr_value.indexOf(search_val) > -1 )
            {
                $('table > tbody > tr >td:contains('+tr_value+')').parent().show();
            }
        })
    })
//--- Search Keyup Last name ---//
    $(document).on('keyup','.find_lname',function(){
        search_val = $(this).val().toLowerCase();
        $('table > tbody > tr').hide();

        $('table > tbody > tr').find('#lname').each(function(i,v){
            
            tr_value = $(this).text().toLowerCase();
            
            if(tr_value.indexOf(search_val) > -1 )
            {
                $('table > tbody > tr >td:contains('+tr_value+')').parent().show();
            }
        })
    })
//--- Search Keyup Age ---//
    $(document).on('keyup','.find_age',function(){
        search_val = $(this).val().toLowerCase();
        $('table > tbody > tr').hide();

        $('table > tbody > tr').find('#age').each(function(i,v){
            
            tr_value = $(this).text().toLowerCase();
            
            if(tr_value.indexOf(search_val) > -1 )
            {
                $('table > tbody > tr >td:contains('+tr_value+')').parent().show();
            }
        })
    })
//--- Search Keyup Email ---//
    $(document).on('keyup','.find_email',function(){
        search_val = $(this).val().toLowerCase();
        $('table > tbody > tr').hide();

        $('table > tbody > tr').find('#email').each(function(i,v){
            
            tr_value = $(this).text().toLowerCase();
            
            if(tr_value.indexOf(search_val) > -1 )
            {
                $('table > tbody > tr >td:contains('+tr_value+')').parent().show();
            }
        })
    })
})