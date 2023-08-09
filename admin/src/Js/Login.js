$(document).ready(function() {
    $("#btnlogin").click(iniciarSesion);
    $("#btnCerrarSesion").click(cerrarSesion);
    
});

function iniciarSesion() {

    var datos = $("#frmLogin").serialize();
    // console.log(datos);

    $.post("../Ajax/LoginAjax.php?op=iniciarSesion", datos, function (r) {
        if (r == 'ok') {    
            window.location = 'index.php';
        }else{
            alert('contraseña o correo incorrecto bobo hpta');
        }
    });  
    // alert(datos);
}

function cerrarSesion() {

    $.post("../Ajax/LoginAjax.php?op=cerrarSesion", {cerrarSesion: true}, function (r) {
        console.log(r);
        if (r == 'ok') {
            console.log("sesion cerrada capo");
            window.location.href = '../View/Login.php';
        } else {
            console.log("sesion no cerrada capo :(");
        }
    });
    // console.log("holixd");

    // cerrarSesion
}