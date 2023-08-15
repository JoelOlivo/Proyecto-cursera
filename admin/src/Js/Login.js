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
            $.toast({
                heading: 'Error',
                text: 'Credenciales incorrectas, intenta nuevamente.',
                showHideTransition: 'fade',
                position: 'top-right',
                icon: 'error'
            });
        }
    });  
    // alert(datos);
}

function cerrarSesion() {

    $.post("../Ajax/LoginAjax.php?op=cerrarSesion", {cerrarSesion: true}, function (r) {
        // console.log(r);
        if (r == 'ok') {
            window.location.href = '../View/Login.php';
        } else {
            $.toast({
                heading: 'Error',
                text: 'No se pudo cerrar la sesión',
                showHideTransition: 'fade',
                position: 'top-right',
                icon: 'error'
            });
        }
    });
}