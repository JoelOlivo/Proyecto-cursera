<?php
require '../Model/LoginModel.php';

$obj = new Login;

$datos =[
'email' => $_POST["txtemail"],
'password' => $_POST["txtpassword"]
];

$row = $obj->iniciarSesion($datos);

?>