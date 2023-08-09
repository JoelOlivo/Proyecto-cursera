$(document).ready(function() {
    $("#btnlogin").click(iniciarSesion);
    $("#btnCerrarSesion").click(cerrarSesion);
    
});

function iniciarSesion() {

    var datos = $("#frmLogin").serialize();
    // console.log(datos);

    $.post("../Ajax/LoginAjax.php", datos, function (r) {
        if (r == 'ok') {    
            window.location = 'index.php';
        }else{
            alert('contraseña o correo incorrecto bobo hpta');
        }
    });  
    // alert(datos);
}

function cerrarSesion() {
    console.log("holixd");
}