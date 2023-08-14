<?php include '../Includes/Head.php'; ?>
<title>Cursera | Crear Curso</title>
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
            <h1>Crear Curso</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Crear Curso</li>
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
              <form id="frmCrearCurso">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtNombre">Nombre *</label>
                                <input name="Nombre" type="text" class="form-control" id="txtNombre" placeholder="Ingresa un nombre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtDescripcion">Descripcion *</label>
                                <textarea class="form-control" rows="3" placeholder="Ingresa una descripción" name="Descripcion" id="txtDescripcion"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txtPrecio">Precio *</label>
                                <input name="Precio" type="text" class="form-control" id="txtPrecio" placeholder="Ingresa el precio">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txtDuracion">Duracion</label>
                                <input name="Duracion" type="text" class="form-control" id="txtDuracion" placeholder="Ingresa la duracion">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slCategoria">Categoría *</label>
                                <select class="custom-select" name="categorias[]" id="slCategoria" multiple>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fileMiniatura">Miniatura *</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="fileMiniatura" name="Miniatura">
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
  </div>
  <!-- /.content-wrapper -->

<script src="../Js/Curso.js"></script>
<!-- footer -->
<?php include '../Includes/Footer.php'; ?>
<!-- footer -->


