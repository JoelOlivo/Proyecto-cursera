$(document).ready(function(){
    cargarImagen();
    listarProducto();
    listarCategorias();
    $("#vaciarCarrito").click(vaciarCarrito);
    $("#btnAgregarCarrito").click(agregarCarrito);
    $.ajax({
        type: "post",
        url: "../Ajax/CursoPrevioAjax.php?op=cargarDivCarrito",
        // dataType: "json", 
        success: function (r) {
            $("#divCarrito").html(r);
            // console.log(r);           
        } 
    });
    verCarrito();
    $("#btnComprar").click(comprarProducto);


});

function cargarImagen() {
    var id = $("#idProducto").val();
    $.post("../Ajax/CursoPrevioAjax.php?op=cargarImagen", {id: id}, function (r) {
        // console.log(r);
        $("#divImagen").html(r);
    });
}

function listarProducto() {
    var id = $("#idProducto").val();
    $.post("../Ajax/CursoPrevioAjax.php?op=listarProducto", {id: id}, function (r) {
        // console.log(r);
        $("#divDescripcion").html(r);
    });
}

function listarCategorias() {
    $.post("../Ajax/IndexAjax.php?op=listarCategoria", function (r) {
        // console.log(r);
        $("#divCategorias").html(r);
    });
}

function agregarCarrito() {
    var idProducto = $("#idProducto").val();
    var nombreCurso = $("#nombreCurso").val();
    var precioCurso = $("#precioCurso").val();
    var fotoCurso = $("#fotoCurso").val();
    var cantidad = '+';
    $.ajax({
        type: "post",
        url: "../Ajax/CursoPrevioAjax.php?op=agregarCarrito",
        data: {idProducto: idProducto, nombreCurso: nombreCurso, precioCurso: precioCurso, fotoCurso: fotoCurso},
        // dataType: "json", 
        success: function (r) {
            $("#badgeProducto").text(cantidad);
            $("#divCarrito").html(r);
            console.log(r);
        }
    });

}

function vaciarCarrito() {
    $.ajax({
        type: "post",
        url: "../Ajax/CursoPrevioAjax.php?op=vaciarCarrito",
        // dataType: "json",
        success: function (r) {
            // carrito(r);
            $("#badgeProducto").text('');
            $("#divCarrito").html(r);
            // console.log(r);
        }
    });
}

function verCarrito() {
    $.ajax({
        type: "post",
        url: "../Ajax/CursoPrevioAjax.php?op=cargarCarrito",
        // dataType: "json",
        success: function (r) {
            // console.log(r);
            $("#tblCarrito").html(r); 
        }
    });
}

function borrarProductoCarrito(id) {
    $.ajax({
        type: "post",
        url: "../Ajax/CursoPrevioAjax.php?op=borrarProductoCarrito",
        data: {id: id},
        // dataType: "json",
        success: function (r) {
            // console.log(r);
            $("#tblCarrito").html(r); 
        }
    });
}

function comprarProducto() {
   
    $.ajax({
        type: "post",
        url: "../Ajax/CursoPrevioAjax.php?op=comprarProducto",
        // dataType: "json",
        success: function (r) {
            console.log(r);
            if (r == 'ok') {    
                Swal.fire(
                    'Mensaje del sistema',
                    'Curso comprado correctamente',
                    'success'
                  );
                  vaciarCarrito();
                //   listarCurso();
                //   window.location.href = '../View/Curso.php';
            }else{
                Swal.fire(
                    'Mensaje del sistema',
                    'No se pudo eliminar el curso',
                    'error'
                  );
            }       
        }
    });
}



