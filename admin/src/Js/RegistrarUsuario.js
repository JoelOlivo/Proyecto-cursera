$(document).ready(function(){
    $("#btnCrear").click(guardarUsuario);
}); 

function guardarUsuario() {

    var nombre = $("#txtNombreUno").val();
    var apellido = $("#txtApellidoUno").val();
    var email = $("#txtEmail").val();
    var contrasenia = $("#txtContrasenia").val();
    var datos = new FormData($("#frmCrearUsuario")[0]);


    if (nombre.trim() == '' || apellido.trim() == '' || email.trim() == '' || contrasenia.trim() == '') {
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
            url: '../Ajax/UsuarioAjax.php?op=registrarUsuario',
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

function limpiarFormulario() {
    $(".form-control").val("");
}

