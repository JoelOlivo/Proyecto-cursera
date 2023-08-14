<?php
require '../Model/CursoModel.php';

$obj = new Curso;
$op = $_GET["op"];

switch ($op) {
    case 'listarProducto':

        $id = $_POST['id'];
        // var_dump($id);
        if ($id == '' || $id == null || empty($id)) {
            $row = $obj->listarTodosProductoCategoria($id);
        }else {
            $row = $obj->listarProductoCategoria($id);            
        }

        foreach ($row as $key => $value) {
            echo ' 
            <div class="col-3">
                <div class="card  border-primary">
                    <img class=" img-thumbnail" src="' . $value['foto'] . '" alt="producto">
                    <div class="card-body">
                        <h4 class="card-title"><strong>' . $value['nombre_curso'] . '</strong></h4>
                        <p class="card-text"><strong>Precio:</strong>' . $value['precio'] . '</p>
                        <p class="card-text"><strong>Descripcion:</strong>' . $value['descripcion_curso'] . '</p>
                        <a href="../View/CursoPrevio.php?id=' . $value['id_curso'] . '" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>';
        }

        break;

    case 'cargarTitulo':

        $id = $_POST['id'];
        $row = $obj->cargarTitulo($id);

        if ($id == '' || $id == null || empty($id)) {
            echo ' 
            <h1 align="center">Todos nuestros cursos</h1>
            <br>
            <h5>bla bla lbasdsadsad</h5>
            <hr>';
        }else {

            foreach ($row as $key => $value) {
                echo ' 
                <h1 align="center">'. $value['nombre'] .'</h1>
                <br>
                <h5>' . $value['descripcion'] .'</h5>
                <hr>';
            }        
        }


        break;
    


}
