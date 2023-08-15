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
                        <div class="col-sm-12">
                            <h1 align="center">Bienvenido A Cursera</h1><hr>
                            <p>
                                Cursera es tu puerta de acceso a la educación tecnológica en línea. Ofrecemos una variedad de cursos de vanguardia en tecnología, desde programación hasta inteligencia artificial. Nuestro compromiso es brindarte las herramientas para prosperar en el mundo digital y alcanzar tus objetivos profesionales. Aprende a tu ritmo y en cualquier lugar con Cursera.
                            </p>
                            <h5>Compra Ahora</h5>
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
                                    <div class="row mt-1" id="divProductos">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        
        <script src="../Js/Index.js"></script>
        <!-- footer -->
        <?php include '../Includes/Footer.php'; ?>
        <!-- footer -->
    </div>
</body>