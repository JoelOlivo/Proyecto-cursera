<?php

require 'Conexion.php';

class Usuario{

    public static function mostrarUsuarios(){
        $link = new Conexion;
        $link = $link->conectar();
        $sql = $link->query("SELECT * FROM USUARIO");
        $row = $sql->fetch_all(MYSQLI_ASSOC);
        $link->close();

        return $row;
    }
}

?>