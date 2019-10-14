$(function(){
    // User registration ..
    $('#register').submit(function(){
         var data = $(this).serialize();
         var url = $(this).attr('action');
         $.post(url, data, function(e){
             //console.log(e);
            $('#message').empty();
            $('#message').append(e); 
        });
        return false;
    });
});