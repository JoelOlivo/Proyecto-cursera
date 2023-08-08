<?php

require 'Conexion.php';

class Usuario{

    public static function mostrarUsuario(){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();
        $query = $conexion->query("SELECT 
        U.id_usuario,
        CONCAT(U.primer_nombre, ' ', U.primer_apellido) AS nombre_completo,
        U.email,
        R.nombre
        FROM USUARIO U 
        INNER JOIN ROL R
        ON U.id_rol = R.id_rol");
        $row = $query->fetch_all(MYSQLI_ASSOC);
        $conexion->close();

        return $row;
    }

    public static function guardarUsuario($datos){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $primerNombre = $datos['NombreUno'];
        $segundoNombre = $datos['NombreDos'];
        $primerApellido = $datos['ApellidoUno'];
        $segundoApellido = $datos['ApellidoDos'];
        $email = $datos['Email'];
        $contrasenia = $datos['Contrasenia'];
        $cedula = $datos['Cedula'];
        $celular = $datos['Celular'];
        $pais = $datos['Pais'];
        $ciudad = $datos['Ciudad'];
        $codigoPostal = $datos['CodigoPostal'];
        $direccion = $datos['Direccion'];
        $fechaRegistro = date("Y-m-d h:i:s");
        $rol = $datos['Rol'];

        $query = $conexion->prepare("INSERT INTO USUARIO 
        (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cedula, email, 
        contrasenia, celular, pais, ciudad, codigo_postal, direccion, fecha_registro, id_rol) 
        VALUES
        (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $query->bind_param('sssssssssssssi',$primerNombre,$segundoNombre,$primerApellido,$segundoApellido,$cedula,$email,$contrasenia,$celular, $pais,$ciudad,$codigoPostal,$direccion,$fechaRegistro,$rol);

        $query->execute();

        if ($query) {
            echo "ok";
        }else {
            echo "error";
        }

        $conexion->close();
    }
}

?>