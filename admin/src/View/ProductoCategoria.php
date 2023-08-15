<?php
include '../Includes/HeadHome.php';
?>
<body class="hold-transition sidebar-mini">
    <?php
    $id = $_GET['id'];
    ?>
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        include '../Includes/NavbarHome.php';
        ?>
        <!-- /.navbar -->
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <input type="hidden" id="idCategoria" value="<?php echo $id; ?>">
                    <div id="divtitulo">
                    </div>
                    <div class="row mt-1" id="divProductos">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- SCRIPT -->
    <script src="../Js/ProductoCategoria.js"></script>
    <!-- footer -->
    <?php include '../Includes/FooterHome.php'; ?>
    <!-- footer -->