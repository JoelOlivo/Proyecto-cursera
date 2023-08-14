<?php
include '../Includes/HeadHome.php';
?>

<body>
    <div class="row">
        <div class="col-12">
        <?php
        include '../Includes/NavbarHome.php';
        ?>
        </div>
    </div>
    <div>
        <h1 align="center">Carrito</h1>
        <hr>
    </div>
    <div class="row mt-1">
        <table id="" class="table table-bordered table-hover">
            <thead class="table-primary">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Total</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody id="tblCarrito">
            </tbody>
        </table>
    </div>
    <!-- SCRIPT -->
    <script src="../Js/CursoPrevio.js"></script>
     <!-- footer -->
     <?php include '../Includes/Footer.php'; ?>
    <!-- footer -->
</body>

</html>

