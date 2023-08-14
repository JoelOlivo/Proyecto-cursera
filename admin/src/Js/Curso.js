$(document).ready(function(){
    listarCurso();
    listarCategorias();
    $("#btnCrear").click(guardarCurso);
    $("#btnEditar").click(editarCurso);

    $("#slCategoria").select2({
        tags: true, 
        tokenSeparators: [',', ' ']
    });

});

function listarCurso() {

    $.post("../Ajax/CursoAjax.php?op=listar", function (r) {
        // console.log(r);
        $("#tblCursos").html(r);
    });
}

function guardarCurso() {

    var nombre = $("#txtNombre").val();
    var descripcion = $("#txtDescripcion").val();
    var precio = $("#txtPrecio").val();
    var foto = $("#fileMiniatura").val();
    var datos = new FormData($("#frmCrearCurso")[0]);
    var categorias = $("select[name='categorias[]']").val();

    datos.append('categorias', categorias);

    if (nombre.trim() == '' || descripcion.trim() == '' || precio.trim() == '' || foto == '' || $("select[name='categorias[]']").val() == '') {
        $.toast({
            heading: 'Error',
            text: 'Llenar los campos obligatorios. (*)',
            showHideTransition: 'fade',
            position: 'top-right',
            icon: 'error'
        })
    }else{
        $.ajax({
            method: 'post',
            url: '../Ajax/CursoAjax.php?op=guardarCurso',
            data: datos,
            cache: false,
            processData: false,
            contentType: false,
            success: (e)=>{
                // console.log(e);
                var r = e.replace(/(\r\n|\n|\r)/gm, '');
                if (r == 'ok') {
                    Swal.fire(
                        'Mensaje del sistema',
                        'Curso agregado correctamente',
                        'success'
                    );
                    limpiarFormulario();
                }else{
                    Swal.fire(
                        'Mensaje del sistema',
                        'No se pudo agregar el curso',
                        'error'
                    );
                }
            }
        });  
    }
    // console.log(datos);
}

function editarCurso() {

    var idCurso = $("#idCurso").val();
    var nombre = $("#txtNombre").val();
    var descripcion = $("#txtDescripcion").val();
    var precio = $("#txtPrecio").val();
    var foto = $("#fileFoto").val();
    var categorias = $("select[name='categorias[]']").val();
    var datos = new FormData($("#frmCrearCurso")[0]);

    datos.append('categorias', categorias);
    datos.append('idCurso', idCurso);
    
    if (nombre.trim() == '' || descripcion.trim() == '' || precio.trim() == '' || $("select[name='categorias[]']").val() == '') {
        $.toast({
            heading: 'Error',
            text: 'Llenar los campos obligatorios. (*)',
            showHideTransition: 'fade',
            position: 'top-right',
            icon: 'error'
        });
    }else{
        $.ajax({
            method: 'post',
            url: '../Ajax/CursoAjax.php?op=editarCurso',
            data: datos,
            cache: false,
            processData: false,
            contentType: false,
            success: (e)=>{
                var r = e.replace(/(\r\n|\n|\r)/gm, '');
                if (r == 'ok') {
                Swal.fire(
                    'Mensaje del sistema',
                    'Curso actualizado correctamente',
                    'success'
                );
                limpiarFormulario();
                }else{
                    Swal.fire(
                        'Mensaje del sistema',
                        'No se pudo actualizar el curso',
                        'error'
                    );
                }
                console.log(r);
            }
        });
    }
}

function eliminarCurso(idCurso) {

    Swal.fire({
        title: '¿Quieres eliminar este Curso?',
        text: "Esta acción no se puede revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../Ajax/CursoAjax.php?op=eliminarCurso", {idCurso: idCurso}, function (r) {
                var e = r.replace(/(\r\n|\n|\r)/gm, '');
                if (e == 'ok') {    
                    Swal.fire(
                        'Mensaje del sistema',
                        'Curso eliminado correctamente',
                        'success'
                      );
                      listarCurso();
                    //   window.location.href = '../View/Curso.php';
                }else{
                    Swal.fire(
                        'Mensaje del sistema',
                        'No se pudo eliminar el curso',
                        'error'
                      );
                }
                // console.log(r);
            });
        }
      })
    // console.log(idUsuario1);
}

function listarCategorias() {

    $.post("../Ajax/CursoAjax.php?op=listarCategorias", function (r) {
        // console.log(r);
        $("#slCategoria").html(r);
        
    });
}

function listarCategoriasSeleccionadas() {

    var categoriasSeleccionadas = [1, 3, 5]; // Ejemplo, reemplaza con tus datos reales

    
    $("#slCategoria").select2({
        tags: true, 
        tokenSeparators: [',', ' '],
        data: categoriasSeleccionadas // Establece las opciones previamente seleccionadas
    });
}
function limpiarFormulario() {
    $(".form-control").val("");
    $("#idCurso").val("");
}

