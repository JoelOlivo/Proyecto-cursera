<?php
include '../Includes/HeadHome.php';
?>

<body>
    <?php
    $id = $_GET['id'];
    ?>
    <div class="row">
        <input type="hidden" id="idCategoria" value="<?php echo $id; ?>">
        <div class="col-12">
        <?php
        include '../Includes/NavbarHome.php';
        ?>
        </div>
    </div>
    <div id="divtitulo">
    </div>
    <div class="row mt-1" id="divProductos">
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">Cursera</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- SCRIPT -->
    <script src="../Js/ProductoCategoria.js"></script>
</body>

</html>