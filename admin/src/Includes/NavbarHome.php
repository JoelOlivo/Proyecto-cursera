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
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" >
                            <div id="divCarrito">

                            </div>
                            <div>
                                <div class="dropdown-divider"></div>
                                <a id="vaciarCarrito" href="#" class="dropdown-item dropdown-footer text-danger">Vaciar Carrito <i class="fa    fa-trash"></i></a>
                                <div class="dropdown-divider"></div>
                                <a id="verCarrito" href="../View/VerCarrito.php" class="dropdown-item dropdown-footer text-primary">Ver Carrito <i class="fa fa-cart-plus"></i></a>
                            </div>
                            <!-- <a href="#" class="dropdown-item"> -->
                                <!-- Message Start -->
                                <!-- <div class="media">
                                    <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">Call me whenever you can...</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div> -->
                                <!-- Message End -->
                            <!-- </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"> -->
                                <!-- Message Start -->
                                <!-- <div class="media">
                                    <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">I got your message bro</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div> -->
                                <!-- Message End -->
                            <!-- </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"> -->
                                <!-- Message Start -->
                                <!-- <div class="media">
                                    <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">The subject goes here</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div> -->
                                <!-- Message End -->
                            <!-- </a> -->
                            <!-- <div class="dropdown-divider"></div> -->
                            
                        </div>
                    </li>

                    <!-- Configuration Dropdown Menu -->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>

                    <!-- Configuration Dropdown Menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php" role="button">
                            <i class="fas fa-user"> Iniciar Sesion</i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->