<?php
require 'Conexion.php';

class Login{

    public static function iniciarSesion($datos){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $email = $datos['email'];
        $password = $datos['password'];

        $query = "SELECT 
        id_usuario,
        CONCAT(primer_nombre, ' ', primer_apellido) as nombre_completo,
        email, contrasenia, id_rol
        FROM USUARIO
        WHERE email = '$email' AND
        contrasenia = '$password'";

        $sql = mysqli_query($conexion, $query); 
        $row = mysqli_fetch_assoc($sql);
        // var_dump($row);
    
        if($row) {
            session_start();
            $_SESSION['nombre'] = $row['nombre_completo'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id_usuario'] = $row['id_usuario'];
            echo "ok";
        }else {
            echo "error";
        }

        $conexion->close();
    }
}

?>