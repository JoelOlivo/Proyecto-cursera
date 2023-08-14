// $(document).ready(function(){
//     // cargarImagen();
//     // listarProducto();
//     listarCategorias();
//     $("#vaciarCarrito").click(vaciarCarrito);
//     $("#btnCarrito").click(agregarCarrito);
//     $.ajax({
//         type: "post",
//         url: "../Ajax/CursoPrevioAjax.php?op=cargarCarrito",
//         dataType: "json", 
//         success: function (r) {
//             carrito(r);
           
//         } 
//     });

    
// });

// function listarCategorias() {
//     $.post("../Ajax/IndexAjax.php?op=listarCategoria", function (r) {
//         // console.log(r);
//         $("#divCategorias").html(r);
//     });
// }

// function agregarCarrito() {
//     var idProducto = $("#idProducto").val();
//     var nombreCurso = $("#nombreCurso").val();
//     var precioCurso = $("#precioCurso").val();
//     var fotoCurso = $("#fotoCurso").val();

//     $.ajax({
//         type: "post",
//         url: "../Ajax/CursoPrevioAjax.php?op=agregarCarrito",
//         data: {idProducto: idProducto, nombreCurso: nombreCurso, precioCurso: precioCurso, fotoCurso: fotoCurso},
//         dataType: "json", 
//         success: function (r) {
//             carrito(r);
//         }
//     });

// }

// function carrito(r) {
//     var cantidad = Object.keys(r).length;
//     $("#badgeProducto").text(cantidad);
//     r.forEach(element => {
//         $("#divCarrito").append(
//             `<a href="../View/CursoPrevio.php?id=${element['id']}" class="dropdown-item">
//                         <!-- Message Start -->
//                         <div class="media">
//                             <img src="${element['fotoCurso']}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
//                             <div class="media-body">
//                                 <h3 class="dropdown-item-title">
//                                 ${element['nombre']}
//                                     <span class="float-right text-sm text-primary"><i class="fas fa-eye"></i></span>
//                                 </h3>
//                                 <p class="text-sm">Call me whenever you can...</p>
//                             </div>
//                         </div>
//                         <!-- Message End -->
//                     </a>
//                     <div class="dropdown-divider"></div>`
//         );
//         // console.log(element['id']);
//     }); 
    
// }

// function vaciarCarrito(e) {
//     e.preventDefault();
//     $.ajax({
//         type: "post",
//         url: "../Ajax/CursoPrevioAjax.php?op=vaciarCarrito",
//         dataType: "json",
//         success: function (r) {
//             carrito(r);
//             // console.log(r);
//         }
//     });
// }