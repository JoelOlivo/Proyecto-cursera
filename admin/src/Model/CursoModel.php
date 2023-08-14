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
        $categorias = $datos['Categorias'];

        $query = $conexion->prepare("INSERT INTO CURSO (nombre, descripcion, precio, duracion, fecha_registro, id_usuario, foto) VALUES (?,?,?,?,?,?,?)");

        $query->bind_param('ssdssis',$nombre,$descripcion,$precio,$duracion,$fechaRegistro,$idInstructor,$miniatura);
        $query->execute();

        $ultimoId = mysqli_insert_id($conexion);
        if ($query) {
            foreach ($categorias as $categoria) {
                $queryCategoria = $conexion->prepare("INSERT INTO CURSO_CATEGORIA (id_curso, id_categoria) VALUES (?,?)");    
                $queryCategoria->bind_param('ii',$ultimoId,$categoria);
                $queryCategoria->execute();
                // var_dump($categoria);
            }
            echo "ok";
        }else {
            echo "error";
        }
        // var_dump($categorias);
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

    public static function cargarCategorias($id){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $query = $conexion->query("SELECT 
        CC.id_curso, CC.id_Categoria,
        C.nombre AS nombre_categoria 
        FROM CURSO_CATEGORIA CC
        INNER JOIN CATEGORIA C ON CC.id_categoria = C.id_categoria
        WHERE CC.id_curso = $id");
        $rowCategoria = $query->fetch_all(MYSQLI_ASSOC);
        $conexion->close();
        return $rowCategoria;
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
        $categorias = $datos['Categorias'];

        if ($miniatura == '../Img/') {
            $query = "UPDATE CURSO SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', duracion = '$duracion', fecha_modificacion = '$fechaModificacion', id_usuario = '$idUsuario'
            WHERE id_curso = $id";
        } else {
            $query = "UPDATE CURSO SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', duracion = '$duracion', fecha_modificacion = '$fechaModificacion', id_usuario = '$idUsuario', foto = '$miniatura'
            WHERE id_curso = $id";
        }

        $sql = mysqli_query($conexion, $query);

        if ($sql) {

            $queryDelete = "DELETE FROM curso_categoria WHERE id_curso = $id";
            $sqlDelete = mysqli_query($conexion, $queryDelete);

            if ($sqlDelete) {
                foreach ($categorias as $categoria) {
                    $queryCategoria = $conexion->prepare("INSERT INTO CURSO_CATEGORIA (id_curso, id_categoria) VALUES (?,?)");    
                    $queryCategoria->bind_param('ii',$id,$categoria);
                    $queryCategoria->execute();
                }
                echo "ok";
            } else {
                echo "error";
            }
        }else {
            echo "error";
        }
        
        $conexion->close();
        // var_dump($datos, $id);
    }

    public static function eliminarCurso($id){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $queryDelete = "DELETE FROM CURSO_CATEGORIA WHERE id_curso = '$id'";
        $sqlDelete = mysqli_query($conexion, $queryDelete);

        if ($sqlDelete) {
            $query = "DELETE FROM CURSO WHERE id_curso = '$id'";
            $sql = mysqli_query($conexion, $query);

            if ($sql) {
                echo "ok";
            }else {
                echo "error";
            }
        }else {
            echo "error";
        }

        $conexion->close();
    }

    public static function listarCategorias(){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $query = $conexion->query("SELECT * FROM CATEGORIA");
        $row = $query->fetch_all(MYSQLI_ASSOC);
        $conexion->close();
        return $row;
    }

    public static function listarProducto(){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $query = $conexion->query("SELECT * FROM CURSO ORDER BY id_curso DESC LIMIT 16");
        $row = $query->fetch_all(MYSQLI_ASSOC);
        $conexion->close();
        return $row;    
    }

    public static function listarProductoCategoria($id){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $query = $conexion->query("SELECT 
        CU.id_curso,
        CU.nombre AS nombre_curso,
        CU.descripcion AS descripcion_curso,
        CU.precio,
        CU.duracion,
        CU.foto 
        FROM CURSO_CATEGORIA CC
        INNER JOIN CURSO CU ON CC.id_curso = CU.id_curso
        INNER JOIN CATEGORIA CA ON CC.id_categoria = CA.id_categoria 
        WHERE CC.id_categoria = '$id'
        GROUP BY CC.id_curso");
        $row = $query->fetch_all(MYSQLI_ASSOC);
        $conexion->close();
        return $row;    
    }

    public static function listarTodosProductoCategoria(){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $query = $conexion->query("SELECT 
        CU.id_curso,
        CU.nombre as nombre_curso,
        CU.descripcion AS descripcion_curso,
        CU.precio,
        CU.duracion,
        CU.foto 
        FROM CURSO_CATEGORIA CC
        INNER JOIN CURSO CU ON CC.id_curso = CU.id_curso
        INNER JOIN CATEGORIA CA ON CC.id_categoria = CA.id_categoria 
        GROUP BY CC.id_curso");
        $row = $query->fetch_all(MYSQLI_ASSOC);
        $conexion->close();
        return $row;    
    }


    public static function cargarTitulo($id){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $query = $conexion->query("SELECT 
        id_categoria,
        nombre,
        descripcion
        FROM CATEGORIA
        WHERE id_categoria = '$id'");
        $row = $query->fetch_all(MYSQLI_ASSOC);
        $conexion->close();
        return $row;    
    }

    public static function cargarCursoTutor($id){
        $conexion = new Conexion;
        $conexion = $conexion->conectar();

        $query = "SELECT * FROM CURSO WHERE id_curso = '$id'";
        $sql = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($sql);
        $conexion->close();
        return $row;
        // var_dump($row);
    }


}

?>