<?php
require '../Model/Usuario.php';

$obj = new Usuario;
$op = $_GET["op"];

switch ($op) {
    case 'listar':
        $row = $obj->mostrarUsuarios();
        
        foreach ($row as $key => $value) {
            echo ' 
            <tr style="border: black;">
                <td >'. $value['primer_nombre'].'</td>
                <td>'. $value['primer_apellido'].'</td>
                <td>'. $value['email'].'</td>
                <td>'. $value['contrasenia'].'</td>
            </tr>';
        }

        // var_dump($row);
        break;
    
    // default:
    //     # code...
    //     break;
}



?>
