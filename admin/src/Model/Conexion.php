<?php

class Conexion{

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "cursera";
    
    public function conectar(){
        $mysqli = new mysqli($this->host, $this->user, $this->password, $this->db);
        if ($mysqli->connect_errno) {
            die("Error Connection: ". $mysqli->connect_errno);
        }

        return $mysqli;
    }
}

?>