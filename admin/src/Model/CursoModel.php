<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'Conexion.php';

class Curso{

    public static function mostrarCurso(){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();
        
        $query = $conexion->query("SELECT 
        C.id_curso,
        C.nombre, 
        C.descripcion,
        C.precio,
        C.duracion,
        CONCAT(U.primer_nombre, ' ', U.primer_apellido) as instructor
        FROM CURSO C
        INNER JOIN USUARIO U 
        ON C.id_usuario= U.id_usuario");
        $row = $query->fetch_all(MYSQLI_ASSOC);
        $conexion->close();

        return $row;
    }

    public static function guardarCurso($datos){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $nombre = $datos['Nombre'];
        $descripcion = $datos['Descripcion'];
        $precio = $datos['Precio'];
        $duracion = $datos['Duracion'];
        $fechaRegistro = date("Y-m-d h:i:s");
        $idInstructor =  $_SESSION['id_usuario'];
        $miniatura = $datos['Miniatura'];
        // var_dump($idInstructor);
        $query = $conexion->prepare("INSERT INTO CURSO (nombre, descripcion, precio, duracion, fecha_registro, id_usuario, foto) VALUES (?,?,?,?,?,?,?)");

        $query->bind_param('ssdssis',$nombre,$descripcion,$precio,$duracion,$fechaRegistro,$idInstructor,$miniatura);
        $query->execute();

        if ($query) {
            echo "ok";
        }else {
            echo "error";
        }

        $conexion->close();
    }

    public static function cargarCurso($id){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $query = "SELECT * FROM CURSO WHERE id_curso = '$id'";
        $sql = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($sql);
        $conexion->close();
        return $row;
        // var_dump($row);
    }

    public static function editarCurso($datos, $id){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $nombre = $datos['Nombre'];
        $descripcion = $datos['Descripcion'];
        $precio = $datos['Precio'];
        $duracion = $datos['Duracion'];
        $fechaModificacion = date("Y-m-d h:i:s");
        $idUsuario = $_SESSION['id_usuario'];
        $miniatura = $datos['Miniatura'];

        if ($miniatura == '../Img/') {
            $query = "UPDATE CURSO SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', duracion = '$duracion', fecha_modificacion = '$fechaModificacion', id_usuario = '$idUsuario'
            WHERE id_curso = $id";
        } else {
            $query = "UPDATE CURSO SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', duracion = '$duracion', fecha_modificacion = '$fechaModificacion', id_usuario = '$idUsuario', foto = '$miniatura'
            WHERE id_curso = $id";
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

    public static function eliminarCurso($id){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $query = "DELETE FROM CURSO WHERE id_curso = '$id'";
        $sql = mysqli_query($conexion, $query);

        if ($sql) {
            echo "ok";
        }else {
            echo "error";
        }

        $conexion->close();
    }
}

?>