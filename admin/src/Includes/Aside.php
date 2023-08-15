  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../View/index.php" class="brand-link">
      <img src="../../dist/img/coursera-logo.png" alt="Cursera Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cursera</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          if ($_SESSION['foto'] == '../Img/' || $_SESSION['foto'] == null) {
          ?>
            <img src="../../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
          <?php
          }else {
          ?>
            <img src="<?php echo $_SESSION['foto']; ?>" class="img-circle elevation-2" alt="User Image">
          <?php
          }
          ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nombre']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../View/index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Comprar
              </p>
            </a>
          </li>
          <?php
            if ($_SESSION['rol'] == 1) {
          ?>
          <li class="nav-item">
            <a href="../View/Usuario.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          <?php
            }
            if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {
          ?>
          <li class="nav-item">
            <a href="../View/Cursos.php" class="nav-link">
              <i class="nav-icon fas fa-chalkboard"></i>
              <p>
                Cursos
              </p>
            </a>
          </li>
          <?php
            }
          ?>
          <li class="nav-item">
            <a href="../View/MisCursos.php" class="nav-link">
              <i class="nav-icon fas fa-chalkboard"></i>
              <p>
                Mis Cursos
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>