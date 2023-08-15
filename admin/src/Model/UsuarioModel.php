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
        ON U.id_rol = R.id_rol
        ORDER BY R.id_rol ASC");
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
        $foto = $datos['Foto'];

        $query = $conexion->prepare("INSERT INTO USUARIO 
        (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cedula, email, 
        contrasenia, celular, pais, ciudad, codigo_postal, direccion, fecha_registro, id_rol, foto) 
        VALUES
        (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $query->bind_param('sssssssssssssis',$primerNombre,$segundoNombre,$primerApellido,$segundoApellido,$cedula,$email,$contrasenia,$celular, $pais,$ciudad,$codigoPostal,$direccion,$fechaRegistro,$rol,$foto);

        $query->execute();

        // var_dump($query);
        if ($query) {
            echo "ok";
        }else {
            echo "error";
        }

        // var_dump($foto);
        $conexion->close();
    }

    public static function cargarUsuario($id){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $query = "SELECT * FROM USUARIO WHERE id_usuario = '$id'";
        $sql = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($sql);
        $conexion->close();
        return $row;
        // var_dump($row);

    }

    public static function editarUsuario($datos, $id){
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
        $fechaModificacion = date("Y-m-d h:i:s");
        $rol = $datos['Rol'];
        $foto = $datos['Foto'];

        if ($foto == '../Img/') {
            $query = "UPDATE USUARIO SET primer_nombre = '$primerNombre', segundo_nombre = '$segundoNombre', primer_apellido = '$primerApellido',segundo_apellido = '$segundoApellido', cedula = '$cedula', email = '$email', contrasenia = '$contrasenia', celular = '$celular', pais = '$pais', ciudad = '$ciudad', codigo_postal = '$codigoPostal', direccion = '$direccion', fecha_modificacion = '$fechaModificacion', id_rol = '$rol' WHERE id_usuario = $id";
        } else {
            $query = "UPDATE USUARIO SET primer_nombre = '$primerNombre', segundo_nombre = '$segundoNombre', primer_apellido = '$primerApellido',segundo_apellido = '$segundoApellido', cedula = '$cedula', email = '$email', contrasenia = '$contrasenia', celular = '$celular', pais = '$pais', ciudad = '$ciudad', codigo_postal = '$codigoPostal', direccion = '$direccion', fecha_modificacion = '$fechaModificacion', id_rol = '$rol', foto = '$foto' WHERE id_usuario = $id";    
        }
        
        $sql = mysqli_query($conexion, $query);

        if ($sql) {
            echo "ok";
        }else {
            echo "error";
        }

        $conexion->close();

        // var_dump($datos, $id);
    }

    public static function eliminarUsuario($id){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $query = "DELETE FROM USUARIO WHERE id_usuario = '$id'";
        $sql = mysqli_query($conexion, $query);

        if ($sql) {
            echo "ok";
        }else {
            echo "error";
        }

        $conexion->close();
    }

    public static function registrarUsuario($datos){
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
        $rol = 3;
        $foto = $datos['Foto'];

        $query = $conexion->prepare("INSERT INTO USUARIO 
        (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cedula, email, 
        contrasenia, celular, pais, ciudad, codigo_postal, direccion, fecha_registro, id_rol, foto) 
        VALUES
        (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $query->bind_param('sssssssssssssis',$primerNombre,$segundoNombre,$primerApellido,$segundoApellido,$cedula,$email,$contrasenia,$celular, $pais,$ciudad,$codigoPostal,$direccion,$fechaRegistro,$rol,$foto);

        $query->execute();

        // var_dump($query);
        if ($query) {
            echo "ok";
        }else {
            echo "error";
        }

        // var_dump($foto);
        $conexion->close();
    }
}

?>