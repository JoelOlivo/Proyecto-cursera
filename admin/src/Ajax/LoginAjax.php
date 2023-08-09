<?php
require '../Model/LoginModel.php';
$obj = new Login;
$op = $_GET['op'];

switch ($op) {
    case 'iniciarSesion':
        $datos =[
            'email' => $_POST["txtemail"],
            'password' => $_POST["txtpassword"]
            ];
            
        $row = $obj->iniciarSesion($datos);
        break;
    
    case 'cerrarSesion':
        if (isset($_POST['cerrarSesion'])) {
            $row = $obj->cerrarSesion();
            echo 'ok';
        }else {
            echo 'error';
        }
        break;
      
}



?>