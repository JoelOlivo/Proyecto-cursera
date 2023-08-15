    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-black navbar-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="../View/Home.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">Cursos</a>
                        <div class="dropdown-menu dropdown-menu-lg" id="divCategorias">
                        </div>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">

                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-cart-plus"></i>
                            <span id="badgeProducto" class="badge badge-danger navbar-badge"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" >
                            <div id="divCarrito">

                            </div>
                            <div>
                                <a id="verCarrito" href="../View/VerCarrito.php" class="dropdown-item dropdown-footer text-primary">Ver Carrito <i class="fa fa-cart-plus"></i></a>
                                <div class="dropdown-divider"></div>
                                <a id="vaciarCarrito" href="#" class="dropdown-item dropdown-footer text-danger">Vaciar Carrito <i class="fa    fa-trash"></i></a>
                                <div class="dropdown-divider"></div>
                            </div>
                           
                            
                        </div>
                    </li>

                    <!-- Configuration Dropdown Menu -->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <?php
                        if (isset($_SESSION['id_usuario'])) {
                    ?>         
                     <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"> <?php echo ' '.$_SESSION['nombre'];?></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <button type="button" id="btnCerrarSesion" class="dropdown-item text-danger">
                            <i class="fas fa-door-closed mr-2"></i> Cerrar sesión</button>
                        </div>
                    </li>
                    <?php
                        }else {
                    ?>
                    <!-- Configuration Dropdown Menu -->
                    <li class="nav-item">
                            <a class="nav-link" href="Login.php" role="button">
                                <i class="fas fa-user"> Iniciar Sesion</i>
                            </a>
                        </li>
                            
                    <?php
                        }
                    ?>
                </ul>
            </nav>
            <!-- /.navbar -->