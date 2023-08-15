<?php
require '../Model/CursoModel.php';

$obj = new Curso;
$op = $_GET["op"];

switch ($op) {
    case 'listar':
        $row = $obj->mostrarCurso();
    
        foreach ($row as $key => $value) {
            echo ' 
            <tr style="border: black;">
                <td >'. $value['instructor'] .'</td>
                <td>'. $value['nombre'] .'</td>
                <td>'. $value['descripcion'] .'</td>
                <td>'. $value['precio'] .'</td>
                <td>
                    <button type="button" class="btn btn-primary"><a style="text-decoration:none; color: white;" href="../View/EditarCurso.php?id='. $value['id_curso'] .'"><i class="fas fa-edit"></i> Editar</a></button>    
                    <button type="button" class="btn btn-danger btnEliminar" onclick="eliminarCurso('. $value['id_curso'] .');"><i class="fas fa-trash"></i> Eliminar</button>
                </td>
            </tr>';
        }

        break;

    case 'guardarCurso':

        $nombreFoto = $_FILES['Miniatura']['name'];
        $temporal = $_FILES['Miniatura']['tmp_name'];
        $type = $_FILES['Miniatura']['type'];
        $carpeta = '../Img';
        $ruta = $carpeta . '/' . $nombreFoto; 
        move_uploaded_file($temporal, $carpeta . '/' . $nombreFoto);

        $categorias = explode(",", $_POST['categorias']);

        $datos = [
            'Nombre'=> $_POST['Nombre'],
            'Descripcion'=> $_POST['Descripcion'],
            'Precio'=> $_POST['Precio'],
            'Duracion'=> $_POST['Duracion'],
            'Miniatura' => $ruta,
            'Categorias' => $categorias    
           ];

        // var_dump($datos);
        $row = $obj->guardarCurso($datos);

        break;

    case 'cargarCurso':
        $id = $_GET['id'];
        $row = $obj->cargarCurso($id);
        break;

    case 'editarCurso':

        $id = $_POST["idCurso"];

        $nombreFoto = $_FILES['Miniatura']['name'];
        $temporal = $_FILES['Miniatura']['tmp_name'];
        $type = $_FILES['Miniatura']['type'];
        $carpeta = '../Img';
        $ruta = $carpeta . '/' . $nombreFoto; 
        move_uploaded_file($temporal, $carpeta . '/' . $nombreFoto);

        $categorias = explode(",", $_POST['categorias']);

        $datos = [
            'Nombre'=> $_POST['Nombre'],
            'Descripcion'=> $_POST['Descripcion'],
            'Precio'=> $_POST['Precio'],
            'Duracion'=> $_POST['Duracion'],
            'Miniatura' => $ruta,
            'Categorias' => $categorias    
        ];

        $row = $obj->editarCurso($datos, $id);

        // var_dump($id, $datos);
            
        break;

    case 'eliminarCurso':
        $id = $_POST['idCurso'];
        $row = $obj->eliminarCurso($id);
        // var_dump($id);
        break;

    case 'listarCategorias':
        $row = $obj->listarCategorias();
    
        foreach ($row as $key => $value) {
            echo '<option value="' . $value['id_categoria'] .'">' . $value['nombre'] .'</option>';
        }
        break;

    case 'listarMisCursos':
        $row = $obj->listarMisCursos();

        foreach ($row as $key => $value) {
            echo ' 
            <div class="col-3">
            <div class="card  border-primar h-100">
                <img class="" src="' . $value['miniatura'] . '" alt="producto" height="200px" >
                <div class="card-body">
                    <h4 class="card-title"><strong>' . $value['nombre_curso'] . '</strong></h4>
                    <div class="card-text"><strong>Precio: </strong>' . $value['precio_curso'] . ' $</div>
                    <div class="card-text"><strong>Duración: </strong>' . $value['duracion_curso'] . ' horas</div>
                    <a href="#' . $value['id_curso'] .'" class="btn btn-primary">Comenzar</a>
                    </div>
            </div>
        </div>';
        }

        break;

    
}



?>


