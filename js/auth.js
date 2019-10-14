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
    // User login
    $('#login').submit(function(e){
       e.preventDefault();

        var data = $(this).serialize();
        var url = $(this).attr('action');

        $.post(url, data, function(e){
           if(e){
            $('#message').empty();
            $('#message').append(e);
           }else{
               window.location.href="../pages/dashboard.html"
           }
        })
        
    })
});