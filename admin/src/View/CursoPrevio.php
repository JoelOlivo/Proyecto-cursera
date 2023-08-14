<?php include '../Includes/HeadHome.php'; ?>
<title>AdminLTE 3 | E-commerce</title>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <?php
    $id = $_GET['id'];
    ?>
    <input type="hidden" id="idProducto" value="<?php echo $id ?>">

    <!-- Navbar -->
    <?php
      include '../Includes/NavbarHome.php';
    ?>
    <!-- /.navbar -->

    <!-- <div class="content-wrapper"> -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6" id="divImagen">
              <div class="col-12">
                <!-- <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image"> -->
              </div>

            </div>
            <div class="col-12 col-sm-6">
              <div id="divDescripcion">

              </div>
              <div class="mt-4">
                <button type="button" id="btnAgregarCarrito" class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Add to Cart
                </button>
              </div>
            </div>
          </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- </div> -->
    <!-- /.content-wrapper -->
    <script>
      $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
          var $image_element = $(this).find('img')
          $('.product-image').prop('src', $image_element.attr('src'))
          $('.product-image-thumb.active').removeClass('active')
          $(this).addClass('active')
        })
      })
    </script>
    <script src="../Js/CursoPrevio.js"></script>
    <!-- footer -->
    <?php include '../Includes/Footer.php'; ?>
    <!-- footer -->