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
            <div class="card  border-primar h-100">
                <img class="" src="' . $value['foto'] . '" alt="producto" height="200px" >
                <div class="card-body">
                    <h4 class="card-title"><strong>' . $value['nombre_curso'] . '</strong></h4>
                    <div class="card-text"><strong>Precio: </strong>' . $value['precio'] . ' $</div>
                    <div class="card-text"><strong>Duración: </strong>' . $value['duracion'] . ' horas</div>
                    <a href="../View/CursoPrevio.php?id=' . $value['id_curso'] .'" class="btn btn-primary">Ver</a>
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
            <h1 align="center">Explora Nuestros Cursos</h1>
            <br>
            <h5>Explora nuestros cursos y sumérgete en el emocionante mundo de la tecnología. Desde programación hasta inteligencia artificial, nuestros cursos te brindan las habilidades que necesitas para prosperar en la era digital. Aprende a tu ritmo y conviértete en un experto con Cursera.</h5>
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
