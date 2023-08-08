$(document).ready(function(){
    //código a ejecutar cuando el DOM está listo para recibir instrucciones.
    cargarUsuarios();
    $("#btnCrear").click(guardarUsuario);

});

function cargarUsuarios() {

    $.post("../Ajax/UsuarioAjax.php?op=listar", function (r) {
        // console.log(r);
        $("#tblUsuarios").html(r);
    });
}

function guardarUsuario() {
    var datos = $("#frmCrearUsuario").serialize();

    var nombre = $("#txtNombreUno").val();
    // if (nombre.trim() == '') {
    //     $.toast({
    //         heading: 'Error',
    //         text: 'Se debe completar todos los campos obligatorios (*)',
    //         showHideTransition: 'fade',
    //         position: 'top-right',
    //         icon: 'error'
    //     })
    // }else{
    //     console.log("NOmbre no vacio :D");
    // }
    console.log(datos);

    $.post("../Ajax/UsuarioAjax.php?op=guardarUsuario", datos, function (r) {
        if (r == 'ok') {    
            Swal.fire(
                'Mensaje del sistema',
                'Se ha creado el usuario',
                'success'
              );
              limpiarFormulario();
        }else{
            Swal.fire(
                'Mensaje del sistema',
                'No se ha podido crear el usuario',
                'error'
              );

        }
    });
}

function limpiarFormulario() {
    $(".form-control").val("");
    $("#slRol").val('0');
}