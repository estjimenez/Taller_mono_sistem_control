<?php
class Database {
    public static function connect() {
        $host = 'localhost';
        $db = 'proyecto_2_db';
        $user = 'root';
        $pass = '';
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        
        return new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, $options);
    }
}
?>