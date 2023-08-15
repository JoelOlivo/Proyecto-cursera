$(document).ready(function(){
    //código a ejecutar cuando el DOM está listo para recibir instrucciones.
    listarUsuario();
    $("#btnCrear").click(guardarUsuario);
    $("#btnEditar").click(editarUsuario);
    

}); 

function listarUsuario() {

    $.post("../Ajax/UsuarioAjax.php?op=listar", function (r) {
        // console.log(r);
        $("#tblUsuarios").html(r);
    });
}

function guardarUsuario() {

    var nombre = $("#txtNombreUno").val();
    var apellido = $("#txtApellidoUno").val();
    var email = $("#txtEmail").val();
    var contrasenia = $("#txtContrasenia").val();
    var rol = $("#slRol").val();
    var datos = new FormData($("#frmCrearUsuario")[0]);


    if (nombre.trim() == '' || apellido.trim() == '' || email.trim() == '' || contrasenia.trim() == '' || rol == 0) {
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
            url: '../Ajax/UsuarioAjax.php?op=guardarUsuario',
            data: datos,
            cache: false,
            processData: false,
            contentType: false,
            success: (e)=>{
                if (e == 'ok') {
                Swal.fire(
                    'Mensaje del sistema',
                    'Usuario creado correctamente',
                    'success'
                );
                limpiarFormulario();
                }else{
                    Swal.fire(
                        'Mensaje del sistema',
                        'No se pudo crear el usuario',
                        'error'
                    );
                }
                // console.log(e);
            }
        });
    }
}

function editarUsuario() {

    var datos = new FormData($("#frmEditarUsuario")[0]);
    var idUsuario = $("#idUsuario").val();
    var nombre = $("#txtNombreUno").val();
    var apellido = $("#txtApellidoUno").val();
    var email = $("#txtEmail").val();
    var contrasenia = $("#txtContrasenia").val();
    var rol = $("#slRol").val();

    // $("#fileFoto").change(function() {
    //     var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; // Extensiones permitidas: jpg, jpeg, png, gif
    //     var fileInput = $(this)[0];
    //     var selectedFile = fileInput.files[0];
    //     if (!allowedExtensions.exec(selectedFile.name)) {
    //         alert('Solo se permiten archivos de imagen con extensiones .jpg, .jpeg, .png, .gif');
    //         $(this).val(""); // Vaciar el campo para que el usuario seleccione un archivo válido
    //     }
    // });
    

    datos.append('idUsuario', idUsuario);

    if (nombre.trim() == '' || apellido.trim() == '' || email.trim() == '' || contrasenia.trim() == '' || rol == 0) {
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
            url: '../Ajax/UsuarioAjax.php?op=editarUsuario',
            data: datos,
            cache: false,
            processData: false,
            contentType: false,
            success: (e)=>{
                if (e == 'ok') {
                Swal.fire(
                    'Mensaje del sistema',
                    'Usuario actualizado correctamente',
                    'success'
                );
                limpiarFormulario();
                }else{
                    Swal.fire(
                        'Mensaje del sistema',
                        'No se pudo actualizar el usuario',
                        'error'
                    );
                }
                console.log(e);
            }
        });
    }
}

function eliminarUsuario(idUsuario) {

    Swal.fire({
        title: '¿Quieres eliminar este usuario?',
        text: "Esta acción no se puede revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../Ajax/UsuarioAjax.php?op=eliminarUsuario", {idUsuario: idUsuario}, function (r) {
                if (r == 'ok') {    
                    Swal.fire(
                        'Mensaje del sistema',
                        'Usuario eliminado correctamente',
                        'success'
                      );
                      listarUsuario();
                    //   window.location.href = '../View/Usuario.php';
                }else{
                    Swal.fire(
                        'Mensaje del sistema',
                        'No se pudo eliminar el usuario',
                        'error'
                      );
                }
                // console.log(r);
            });
        }
      })
    // console.log(idUsuario1);
}

function limpiarFormulario() {
    $(".form-control").val("");
    $("#slRol").val('0');
}

