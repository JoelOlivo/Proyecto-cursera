$(document).ready(function(){
    //código a ejecutar cuando el DOM está listo para recibir instrucciones.
    listarCurso();
    $("#btnCrear").click(guardarCurso);
    $("#btnEditar").click(editarCurso);
    

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

    if (nombre.trim() == '' || descripcion.trim() == '' || precio.trim() == '' || foto == '') {
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
                if (e == 'ok') {
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
                // console.log(e);
            }
        });  
    }
}

function editarCurso() {

    var idCurso = $("#idCurso").val();
    var nombre = $("#txtNombre").val();
    var descripcion = $("#txtDescripcion").val();
    var precio = $("#txtPrecio").val();
    var foto = $("#fileFoto").val();
    var datos = new FormData($("#frmCrearCurso")[0]);

    datos.append('idCurso', idCurso);
    
    if (nombre.trim() == '' || descripcion.trim() == '' || precio.trim() == '') {
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
                if (e == 'ok') {
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
                // console.log(e);
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
                if (r == 'ok') {    
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
            });
        }
      })
    // console.log(idUsuario1);
}

function limpiarFormulario() {
    $(".form-control").val("");
    $("#idCurso").val("");
}

