<?php
require '../classes/DB.php';
require '../classes/Session.php';

if ($_POST) {
    # code...
    $value = DB::query('SELECT id, username, password FROM users WHERE username =:username AND password =:password', array(':username'=>$_POST['username'], ':password'=>$_POST['password']));

        
    if (count($value) > 0) {
            Session::init();
            Session::set('isLoggedIn', true);
            Session::set('user', $value[0]['id']);
           exit();
        
    }else{
        echo 'Invalid username or password';
        return false;
    }
}




?>