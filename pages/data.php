<?php
require '../classes/Session.php';
require '../classes/DB.php';
require '../classes/User.php';
Session::init();
if (Session::get('isLoggedIn') == false) {
    return false;
}else{
   print_r(User::data());
}
?>