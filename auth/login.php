<?php
require '../classes/DB.php';
require '../classes/Session.php';

if ($_POST) {
    # code...
    $value = DB::query('SELECT id, username, password FROM users WHERE username =:username', array(':username'=>$_POST['username']));
    if (password_verify($_POST['password'], $value[0]['password'])) {
            Session::init();
            Session::set('isLoggedIn', true);
            Session::set('user', $value[0]['id']);
           exit();
    }else{
       
    }
    echo 'Invalid username or password';
    return false;
}




?>