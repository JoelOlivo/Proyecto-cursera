$(document).ready(function(){
    listarProducto();
});

function listarProducto() {
    $.post("../Ajax/CursoAjax.php?op=listarMisCursos", function (r) {
        // console.log(r);
        $("#divProductos").html(r);
    });
}