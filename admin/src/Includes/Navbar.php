  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../View/index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Configuration Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo $_SESSION['nombre']; ?></span>
          <div class="dropdown-divider"></div>
          <?php
            if ($_SESSION['rol'] == 1) {
          ?>
          <a href="../View/Usuario.php" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Usuarios
          </a>
          <div class="dropdown-divider"></div>
          <?php
            }
            if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {
          ?>
          <a href="../View/Cursos.php" class="dropdown-item">
            <i class="fas fa-chalkboard mr-2"></i> Cursos
          </a>
          <div class="dropdown-divider"></div>
          <?php
            }
          ?>
          <a href="../View/MisCursos.php" class="dropdown-item">
            <i class="fas fa-chalkboard mr-2"></i> Mis Cursos
          </a>
          <div class="dropdown-divider"></div>
          <button type="button" id="btnCerrarSesion" class="dropdown-item text-danger">
            <i class="fas fa-door-closed mr-2"></i> Cerrar sesión</button>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
