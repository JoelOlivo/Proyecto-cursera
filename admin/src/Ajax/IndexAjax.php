<?php
require '../Model/CursoModel.php';

$obj = new Curso;
$op = $_GET["op"];

switch ($op) {
    case 'listarProducto':
        $row = $obj->listarProducto();

        foreach ($row as $key => $value) {
            echo ' 
            <div class="col-3">
                <div class="card  border-primary">
                    <img class=" img-thumbnail" src="' . $value['foto'] . '" alt="producto">
                    <div class="card-body">
                        <h4 class="card-title"><strong>' . $value['nombre'] . '</strong></h4>
                        <p class="card-text"><strong>Precio:</strong>' . $value['precio'] . '</p>
                        <p class="card-text"><strong>Descripcion:</strong>' . $value['descripcion'] . '</p>
                        <a href="../View/CursoPrevio.php?id=' . $value['id_curso'] .'" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>';
        }

        break;

    case 'listarCategoria':
        $row = $obj->listarCategorias();
        $opciones = '
            <a href="ProductoCategoria.php?id=" class="dropdown-item">Todos</a>
            <div class="dropdown-divider"></div>';
            
        foreach ($row as $key => $value) {
            $opciones .= ' 
                <a href="ProductoCategoria.php?id=' . $value['id_categoria'] .'" class="dropdown-item">' . $value['nombre'] .'</a>
                <div class="dropdown-divider"></div>';
        }

        echo $opciones;

        break;
}
