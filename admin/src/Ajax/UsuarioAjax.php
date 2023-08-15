<?php
require '../Model/UsuarioModel.php';

$obj = new Usuario;
$op = $_GET["op"];

switch ($op) {
    case 'listar':
        $row = $obj->mostrarUsuario();
    
        foreach ($row as $key => $value) {
            echo ' 
            <tr style="border: black;">
                <td >'. $value['nombre'] .'</td>
                <td>'. $value['nombre_completo'] .'</td>
                <td>'. $value['email'] .'</td>
                <td>
                    <button type="button" class="btn btn-primary"><a style="text-decoration:none; color: white;" href="../View/EditarUsuario.php?id='. $value['id_usuario'] .'"><i class="fas fa-edit"></i> Editar</a></button>    
                    <button type="button" class="btn btn-danger btnEliminar" onclick="eliminarUsuario('. $value['id_usuario'] .');"><i class="fas fa-trash"></i> Eliminar</button>
                </td>
            </tr>';
        }

        break;

    case 'guardarUsuario':

        $nombreFoto = $_FILES['Foto']['name'];
        $temporal = $_FILES['Foto']['tmp_name'];
        $carpeta = '../Img';
        $ruta = $carpeta . '/' . $nombreFoto; 
        move_uploaded_file($temporal, $carpeta . '/' . $nombreFoto);

        // $tipo = $foto['type'];
        // $ruta = $foto['tmp_name'];
        // $carpeta = '../Imagenes';
        // $rutafin = $carpeta.$nombre;
        // $imagen = '../Imagenes'.$nombre;
        $datos = [
            'NombreUno'=> $_POST['NombreUno'],
            'NombreDos'=> $_POST['NombreDos'],
            'ApellidoUno'=> $_POST['ApellidoUno'],
            'ApellidoDos'=> $_POST['ApellidoDos'],
            'Email'=> $_POST['Email'],
            'Contrasenia'=> $_POST['Contrasenia'],
            'Cedula'=> $_POST['Cedula'],
            'Celular'=> $_POST['Celular'],
            'Pais'=> $_POST['Pais'],
            'Ciudad'=> $_POST['Ciudad'],
            'CodigoPostal'=> $_POST['CodigoPostal'],
            'Direccion'=> $_POST['Direccion'],
            'Rol'=> $_POST['Rol'],
            'Foto' => $ruta
        ];

        // echo $ruta;

        $row = $obj->guardarUsuario($datos);
        break;

        case 'cargarUsuario':
            $id = $_GET['id'];
            $row = $obj->cargarUsuario($id);
            break;

        case 'editarUsuario':

            $id = $_POST["idUsuario"];
            
            $nombreFoto = $_FILES['Foto']['name'];
            $temporal = $_FILES['Foto']['tmp_name'];
            $type = $_FILES['Foto']['type'];
            $carpeta = '../Img';
            $ruta = $carpeta . '/' . $nombreFoto; 
            move_uploaded_file($temporal, $carpeta . '/' . $nombreFoto);

            $datos = [
                'NombreUno'=> $_POST['NombreUno'],
                'NombreDos'=> $_POST['NombreDos'],
                'ApellidoUno'=> $_POST['ApellidoUno'],
                'ApellidoDos'=> $_POST['ApellidoDos'],
                'Email'=> $_POST['Email'],
                'Contrasenia'=> $_POST['Contrasenia'],
                'Cedula'=> $_POST['Cedula'],
                'Celular'=> $_POST['Celular'],
                'Pais'=> $_POST['Pais'],
                'Ciudad'=> $_POST['Ciudad'],
                'CodigoPostal'=> $_POST['CodigoPostal'],
                'Direccion'=> $_POST['Direccion'],
                'Rol'=> $_POST['Rol'],
                'Foto' => $ruta
            ];

            $row = $obj->editarUsuario($datos, $id);
            // var_dump($type);  
            break;

        case 'eliminarUsuario':
            $id = $_POST['idUsuario'];
            $row = $obj->eliminarUsuario($id);
            // var_dump($id);
            break;

        case 'registrarUsuario':

            $nombreFoto = $_FILES['Foto']['name'];
            $temporal = $_FILES['Foto']['tmp_name'];
            $carpeta = '../Img';
            $ruta = $carpeta . '/' . $nombreFoto; 
            move_uploaded_file($temporal, $carpeta . '/' . $nombreFoto);
    
            $datos = [
                'NombreUno'=> $_POST['NombreUno'],
                'NombreDos'=> $_POST['NombreDos'],
                'ApellidoUno'=> $_POST['ApellidoUno'],
                'ApellidoDos'=> $_POST['ApellidoDos'],
                'Email'=> $_POST['Email'],
                'Contrasenia'=> $_POST['Contrasenia'],
                'Cedula'=> $_POST['Cedula'],
                'Celular'=> $_POST['Celular'],
                'Pais'=> $_POST['Pais'],
                'Ciudad'=> $_POST['Ciudad'],
                'CodigoPostal'=> $_POST['CodigoPostal'],
                'Direccion'=> $_POST['Direccion'],
                'Foto' => $ruta
            ];
    
            // echo $ruta;
    
            $row = $obj->registrarUsuario($datos);
            break;
        
}



?>
