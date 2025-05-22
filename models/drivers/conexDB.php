<?php
namespace MonoApp\Models\Drivers;

use mysqli;

class ConexDB {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dataBase = 'proyecto_2_db';

    private $conex = null;

    public function __construct(){
        $this->conex = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->dataBase
        );
    }

    public function close(){
        $this->conex->close();
    }

    public function exeSQL($sql){
        return $this->conex->query($sql);
    }

    public function lastInsertId() {
        return $this->conex->insert_id;
    }
}



