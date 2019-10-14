<?php
// error_reporting()
// Database connnection PDO
class DB{
    private static function connect(){
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=metrobee;charaset=utf8', 'root', '');
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return $pdo;
    }

    // Query DB
    public static function query($query, $params = array()){
        $statement = self::connect()->prepare($query);
        $statement -> execute($params);

        // For SELECT 
        if(explode(' ', $query)[0] == 'SELECT'){
            $data = $statement->fetchAll();
            return $data;
        }
    }
}