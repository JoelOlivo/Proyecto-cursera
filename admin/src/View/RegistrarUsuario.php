<?php include '../Includes/HeadHome.php'; ?>
<title>Cursera | Crear Usuario</title>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>¡Regístrate!</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- form start -->
              <form id="frmCrearUsuario">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtNombreUno">Primer Nombre *</label>
                                <input name="NombreUno" type="text" class="form-control" id="txtNombreUno" placeholder="Ingresa un nombre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtNombreDos">Segundo Nombre</label>
                                <input name="NombreDos" type="text" class="form-control" id="txtNombreDos" placeholder="Ingresa un nombre">
                            </div>
                        </div>
                 
                  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtApellidoUno">Primer Apellido *</label>
                                <input name="ApellidoUno" type="text" class="form-control" id="txtApellidoUno" placeholder="Ingresa un apellido">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtApellidoDos">Segundo Apellido</label>
                                <input name="ApellidoDos" type="text" class="form-control" id="txtApellidoDos" placeholder="Ingresa un apellido">
                            </div>
                        </div>
                
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txtEmail">Email *</label>
                                <input name="Email" type="email" class="form-control" id="txtEmail" placeholder="Ingresa un email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txtContrasenia">Contraseña *</label>
                                <input name="Contrasenia" type="password" class="form-control" id="txtContrasenia" placeholder="*****************">
                            </div>
                        </div>
                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCedula">Cédula</label>
                                <input name="Cedula" type="text" class="form-control" id="txtCedula" placeholder="Ingresa un número de cédula">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCelular">Celular</label>
                                <input name="Celular" type="text" class="form-control" id="txtCelular" placeholder="Ingresa un número de celular">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtPais">País</label>
                                <input name="Pais" type="text" class="form-control" id="txtPais" placeholder="Ingresa un país">
                            </div>
                        </div>
                 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCiudad">Ciudad</label>
                                <input name="Ciudad" type="text" class="form-control" id="txtCiudad" placeholder="Ingresa una ciudad">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCodigoPostal">Código Postal</label>
                                <input name="CodigoPostal" type="text" class="form-control" id="txtCodigoPostal" placeholder="Ingresa un código postal">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtDireccion">Dirección</label>
                                <input name="Direccion" type="text" class="form-control" id="txtDireccion" placeholder="Ingresa una dirección">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fileFoto">Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="fileFoto" name="Foto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" class="btn btn-primary" id="btnCrear">Crear</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- </div> -->
  <!-- /.content-wrapper -->

<script src="../Js/RegistrarUsuario.js"></script>
<!-- footer -->
<?php include '../Includes/FooterHome.php'; ?>
<!-- footer -->


