<?php include '../Includes/Head.php'; ?>
<title>Cursera | Editar Usuario</title>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- Navbar and Aside -->
<?php
include '../Includes/Navbar.php';
include '../Includes/Aside.php';
?>
<!-- Fin Navbar and Aside -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Editar Usuario</li>
            </ol>
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
              <?php
              require '../Model/UsuarioModel.php';
              $obj = new Usuario;
              $id = $_GET['id'];
              $row = $obj->cargarUsuario($id);
              ?>
              <form id="frmEditarUsuario">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <input type="hidden" id="idUsuario" value="<?php echo $id; ?>">
                                <label for="txtNombreUno">Primer Nombre *</label>
                                <input name="NombreUno" type="text" class="form-control" id="txtNombreUno" placeholder="Ingresa un nombre" value="<?php echo $row["primer_nombre"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtNombreDos">Segundo Nombre</label>
                                <input name="NombreDos" type="text" class="form-control" id="txtNombreDos" placeholder="Ingresa un nombre" value="<?php echo $row["segundo_nombre"]; ?>">
                            </div>
                        </div>
                  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtApellidoUno">Primer Apellido *</label>
                                <input name="ApellidoUno" type="text" class="form-control" id="txtApellidoUno" placeholder="Ingresa un apellido" value="<?php echo $row["primer_apellido"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtApellidoDos">Segundo Apellido</label>
                                <input name="ApellidoDos" type="text" class="form-control" id="txtApellidoDos" placeholder="Ingresa un apellido" value="<?php echo $row["segundo_apellido"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txtEmail">Email *</label>
                                <input name="Email" type="email" class="form-control" id="txtEmail" placeholder="Ingresa un email" value="<?php echo $row["email"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txtContrasenia">Contraseña *</label>
                                <input name="Contrasenia" type="text" class="form-control" id="txtContrasenia" placeholder="*****************" value="<?php echo $row["contrasenia"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCedula">Cédula</label>
                                <input name="Cedula" type="text" class="form-control" id="txtCedula" placeholder="Ingresa un número de cédula" value="<?php echo $row["cedula"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCelular">Celular</label>
                                <input name="Celular" type="text" class="form-control" id="txtCelular" placeholder="Ingresa un número de celular" value="<?php echo $row["celular"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtPais">País</label>
                                <input name="Pais" type="text" class="form-control" id="txtPais" placeholder="Ingresa un país" value="<?php echo $row["pais"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCiudad">Ciudad</label>
                                <input name="Ciudad" type="text" class="form-control" id="txtCiudad" placeholder="Ingresa una ciudad" value="<?php echo $row["ciudad"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCodigoPostal">Código Postal</label>
                                <input name="CodigoPostal" type="text" class="form-control" id="txtCodigoPostal" placeholder="Ingresa un código postal" value="<?php echo $row["codigo_postal"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtDireccion">Dirección</label>
                                <input name="Direccion" type="text" class="form-control" id="txtDireccion" placeholder="Ingresa una dirección" value="<?php echo $row["direccion"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slRol">Rol *</label>
                                <select name="Rol" class="custom-select" id="slRol">
                                  <option id="opRol" value="0">Escoge una opción</option>
                                  <?php
                                  if ($row["id_rol"] == 1) {
                                  ?>
                                    <option value="1" selected>Administrador</option>
                                    <option value="2">Instructor</option>
                                    <option value="3">Alumno</option>

                                  <?php
                                  }elseif ($row["id_rol"] == 2) {
                                  ?>
                                    <option value="1">Administrador</option>
                                    <option value="2" selected>Instructor</option>
                                    <option value="3">Alumno</option>
                                  <?php  
                                  }elseif ($row["id_rol"] == 3) {
                                  ?>
                                    <option value="1">Administrador</option>
                                    <option value="2">Instructor</option>
                                    <option value="3" selected>Alumno</option>
                                  <?php
                                  }
                                  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fileFoto">Actualizar Foto</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" id="fileFoto" name="Foto" >
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php 
                        if (is_null($row["foto"])) { 
                        ?>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label for="imagenPrevia">Sin Foto</label>
                          </div>
                        </div>
                        <?php
                        } else {
                        ?>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label for="imagenPrevia">Foto Actual</label>
                                  <div class="input-group">
                                        <img id="imagenPrevia" src="<?php echo $row["foto"]; ?>" alt="Imagen actual" width="150px">
                                  </div>
                              </div>
                          </div>
                        <?php
                        }
                        ?>
                      </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" class="btn btn-primary" id="btnEditar">Actualizar</button>
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
  </div>
  <!-- /.content-wrapper -->

  <script src="../Js/Usuario.js"></script>
<!-- footer -->
<?php include '../Includes/Footer.php'; ?>
<!-- footer -->


