<?php include '../Includes/Head.php'; ?>
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
            <h1>Usuarios</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12" align="right">
                    <button type="button" class="btn btn-info"><a style="text-decoration:none; color: white;" href="CrearUsuario.php"><i class="fa fa-plus"></i> Agregar Usuario</a></button>
                </div><br>
                <div class="col-md-12">
                    <table id="" class="table table-bordered table-hover">
                      <thead class="table-primary">
                      <tr>
                        <th>Rol</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acción</th>
                      </tr>
                      </thead>
                      <tbody id="tblUsuarios">
                      </tbody>
                    </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="../Js/Usuario.js"></script>
<!-- footer -->
<?php include '../Includes/Footer.php'; ?>
<!-- footer -->





