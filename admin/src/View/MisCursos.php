<?php include '../Includes/Head.php'; ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <!-- Navbar and Aside -->
        <?php
        include '../Includes/Navbar.php';
        include '../Includes/Aside.php';
        ?>
        <!-- Fin Navbar and Aside -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div>
                                        <h1 align="center">Mis Cursos</h1>
                                        <hr>
                                    </div>
                                    <div class="row mt-1" id="divProductos">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="../Js/MisCursos.js"></script>
    <!-- footer -->
    <?php include '../Includes/Footer.php'; ?>
    <!-- footer -->