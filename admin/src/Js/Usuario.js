$(document).ready(function(){
    cargarUsuarios();
    //código a ejecutar cuando el DOM está listo para recibir instrucciones.
});

function cargarUsuarios() {

    $.post("../Ajax/UsuarioAjax.php?op=listar", function (r) {
        console.log(r);
        $("#tblUsuarios").html(r);
    });
}