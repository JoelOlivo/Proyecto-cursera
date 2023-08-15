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
        email, contrasenia, id_rol, foto
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
            $_SESSION['foto'] = $row['foto'];
            $_SESSION['rol'] = $row['id_rol'];
            echo "ok";
        }else {
            echo "error";
        }

        $conexion->close();
    }

    public static function cerrarSesion(){
        session_start();
        session_destroy();
    }
}

?>