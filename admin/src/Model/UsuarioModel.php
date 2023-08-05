<?php

require 'Conexion.php';

class Usuario{

    public static function mostrarUsuarios(){
        $link = new Conexion;
        $link = $link->conectar();
        $sql = $link->query("SELECT 
        U.id_usuario,
        CONCAT(U.primer_nombre, ' ', U.primer_apellido) AS nombre_completo,
        U.email,
        R.nombre
        FROM USUARIO U 
        INNER JOIN ROL R
        ON U.id_rol = R.id_rol");
        $row = $sql->fetch_all(MYSQLI_ASSOC);
        $link->close();

        return $row;
    }
}

?>