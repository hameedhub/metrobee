$(function(){
    // User data...
    $.get("data.php", function(e){
        if(e){ //check if there is user information...
        console.log(e); //debugging purpose
        $('#name').append(`<h1>${e['first_name']} ${e['last_name']}</h1>`);
         }else{
            window.location.href="../auth/login.html";    
        }

    }, 'json');
    // User logout...
    $('#logout').click(function(){
        $.get("logout.php", function(){
            window.location.href="../auth/login.html";
        });
    });

});