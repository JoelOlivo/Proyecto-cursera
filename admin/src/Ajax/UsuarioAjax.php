<?php
require '../Model/UsuarioModel.php';

$obj = new Usuario;
$op = $_GET["op"];

switch ($op) {
    case 'listar':
        $row = $obj->mostrarUsuarios();
    
        foreach ($row as $key => $value) {
            echo ' 
            <tr style="border: black;">
                <td >'. $value['nombre'] .'</td>
                <td>'. $value['nombre_completo'] .'</td>
                <td>'. $value['email'] .'</td>
                <td>
                    <button type="button" class="btn btn-primary"><a style="text-decoration:none; color: white;" href="../View/EditarUsuario.php?id='. $value['id_usuario'] .'"><i class="fas fa-edit"></i> Editar</a></button>
                    <button type="button" class="btn btn-danger btnEliminar"><i class="fas fa-trash"></i> Eliminar</button>
                </td>
            </tr>';
        }

        break;
}



?>
