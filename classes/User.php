<?php
//User class 
class User{
public function data(){
    $data = DB::query('SELECT * FROM users WHERE id =:id', array(':id'=>$_SESSION['user']))[0];
		return json_encode($data);
}
public function update($id){
    
}
};

?>