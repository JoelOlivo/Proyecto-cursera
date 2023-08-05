$(document).ready(function(){
    prueba();
    //código a ejecutar cuando el DOM está listo para recibir instrucciones.
});

function prueba() {
    // alert("jeje");

    $.post("../Ajax/pruebaAjax.php?op=listar", function (r) {
        console.log(r);
        $("#prueba").html(r);
    });
}