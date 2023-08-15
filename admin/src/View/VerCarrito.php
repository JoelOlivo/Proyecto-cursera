<?php
include '../Includes/HeadHome.php';
?>

<body>
    <div class="wrapper">
        <div class="row">
            <div class="col-12">
                <?php
                include '../Includes/NavbarHome.php';
                ?>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">

                        <div>
                            <h1 align="center">Carrito</h1>
                            <hr>
                        </div>
                        <div class="row mt-1">
                            <table class="table table-bordered table-hover">
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
                        <div align="right">
                            <a class="btn btn-info" href="../View/Compra.php"><i class="fas fa-cart-plus"></i> Comprar</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>
    <!-- SCRIPT -->
    <script src="../Js/CursoPrevio.js"></script>
    <!-- footer -->
    <?php include '../Includes/Footer.php'; ?>
    <!-- footer -->
</body>
</html>