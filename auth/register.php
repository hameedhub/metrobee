<?php
require '../classes/DB.php';

if ($_POST) {
    # query the database to submit form...
    if (empty(DB::query('SELECT username FROM users WHERE username =:username', array(':username'=>$_POST['username']))[0])) {  
    if (empty(DB::query('SELECT email FROM users WHERE email =:email', array(':email'=>$_POST['email']))[0])) {
       
        DB::query('INSERT INTO `users`(`first_name`, `last_name`, `email`, `phone`, `gender`, `state_of_origin`, `contact`, `username`,`password`) 
        VALUES (:first_name,:last_name,:email,:phone,:gender,:state_of_origin, :contact,:username,:password)',
         array(':first_name'=>$_POST['first_name'], ':last_name'=>$_POST['last_name'], ':email'=>$_POST['email'], ':phone'=>$_POST['phone'], ':gender'=>$_POST['gender'],
         ':state_of_origin'=>$_POST['state_of_origin'], ':contact'=>$_POST['contact'], ':username'=>$_POST['username'], ':password'=> password_hash($_POST['password'], PASSWORD_DEFAULT)));

    }else{
        echo "Email address already exist";
        return false;
    }
    }else{
        echo "Username already exist";
        return false;
    }
    echo "Registration was successful, Login to access your account";
        return false;
}  

?>
