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

    var datos = $("#frmCrearUsuario").serialize();
    var nombre = $("#txtNombreUno").val();
    var apellido = $("#txtApellidoUno").val();
    var email = $("#txtEmail").val();
    var contrasenia = $("#txtContrasenia").val();
    var rol = $("#slRol").val();

    if (nombre.trim() == '' || apellido.trim() == '' || email.trim() == '' || contrasenia.trim() == '' || rol == 0) {
        $.toast({
            heading: 'Error',
            text: 'Llenar los campos obligatorios. (*)',
            showHideTransition: 'fade',
            position: 'top-right',
            icon: 'error'
        })
    }else{
        $.post("../Ajax/UsuarioAjax.php?op=guardarUsuario", datos, function (r) {
            if (r == 'ok') {    
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
        });
    }
    // console.log(datos);

}

function editarUsuario() {

    var datos = $("#frmEditarUsuario").serialize();
    var idUsuario = $("#idUsuario").val();
    var nombre = $("#txtNombreUno").val();
    var apellido = $("#txtApellidoUno").val();
    var email = $("#txtEmail").val();
    var contrasenia = $("#txtContrasenia").val();
    var rol = $("#slRol").val();

    // console.log(nombre);
    if (nombre.trim() == '' || apellido.trim() == '' || email.trim() == '' || contrasenia.trim() == '' || rol == 0) {
        $.toast({
            heading: 'Error',
            text: 'Llenar los campos obligatorios. (*)',
            showHideTransition: 'fade',
            position: 'top-right',
            icon: 'error'
        })
    }else{
        $.post("../Ajax/UsuarioAjax.php?op=editarUsuario", {datos: datos, idUsuario: idUsuario}, function (r) {
            // console.log(r);
            if (r == 'ok') {    
                Swal.fire(
                    'Mensaje del sistema',
                    'Usuario actualizado correctamente',
                    'success'
                  );
                //   window.location.href = '../View/Usuario.php';
            }else{
                Swal.fire(
                    'Mensaje del sistema',
                    'No se pudo actualizar el usuario',
                    'error'
                  );
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
            });
        }
      })
    // console.log(idUsuario1);
}

function limpiarFormulario() {
    $(".form-control").val("");
    $("#slRol").val('0');
}

