$(document).ready(function(){
    listarProducto();
    listarCategorias();
    $("#vaciarCarrito").click(vaciarCarrito);
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
}); 

function listarProducto() {
    $.post("../Ajax/IndexAjax.php?op=listarProducto", function (r) {
        // console.log(r);
        $("#divProductos").html(r);
    });
}

function listarCategorias() {
    $.post("../Ajax/IndexAjax.php?op=listarCategoria", function (r) {
        // console.log(r);
        $("#divCategorias").html(r);
    });
}

function vaciarCarrito(e) {
    e.preventDefault();
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
