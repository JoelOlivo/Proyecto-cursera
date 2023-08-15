<?php
require '../Model/CursoModel.php';

$obj = new Curso;
$op = $_GET["op"];

switch ($op) {
  case 'cargarImagen':

    $id = $_POST['id'];

    $row = $obj->cargarCurso($id);

    echo ' 
          <div class="col-12">
            <img id="imagenCurso" src="' . $row['foto'] . '" class="product-image" alt="Product Image">
          </div>
        ';
    break;

  case 'listarProducto':

    $id = $_POST['id'];

    $row = $obj->cargarCurso($id);

    echo ' 
          <h3 class="my-3">' . $row['nombre'] . '</h3>
          <p>Descripción: ' . $row['descripcion'] . '</p>
          <div class="bg-gray py-2 px-3 mt-4">
            <h2 class="mb-0">Precio: ' . $row['precio'] . ' $</h2>
            <h4 class="mt-0">
              <small>Duración: ' . $row['duracion'] . ' horas</small>
            </h4>
            <input type="hidden" id="nombreCurso" value="' . $row['nombre'] . '">
            <input type="hidden" id="precioCurso" value="' . $row['precio'] . '">
            <input type="hidden" id="fotoCurso" value="' . $row['foto'] . '">
          </div>

        
        ';

    break;

  case 'agregarCarrito':

    $productos = unserialize($_COOKIE['productos'] ?? '');
    if (is_array($productos) == false) $productos = array();
    $existe = false;
    foreach ($productos as $key => $value) {
      if ($value['id'] == $_POST['idProducto']) {
        $existe = true;
      }
    }

    if ($existe == false) {
      $nuevoProducto = array(
        'id' => $_POST['idProducto'],
        'nombre' => $_POST['nombreCurso'],
        'precio' => $_POST['precioCurso'],
        'foto' => $_POST['fotoCurso'],
      );
      array_push($productos, $nuevoProducto);
    }

    setcookie('productos', serialize($productos));

    foreach ($productos as $key => $value) {
      echo '<a href="../View/CursoPrevio.php?id=' . $value['id'] . '" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
              <img src="' . $value['foto'] . '" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                  <h3 class="dropdown-item-title">
                  ' . $value['nombre'] . '
                    <span class="float-right text-sm text-primary"><i class="fas fa-eye"></i></span>
                  </h3>
              </div>
          </div>
          <!-- Message End -->
      </a>
      <div class="dropdown-divider"></div>';
    }

    break;

  case 'cargarCarrito':

    $productos = unserialize($_COOKIE['productos'] ?? '');
    if (is_array($productos) == false) $productos = array();
    $precio = 0;
    $table = '';
    foreach ($productos as $key => $value) {
      $precio = $precio + $value['precio'];
      $table .= '<tr>
      <td><img src="' . $value['foto'] . '" alt="User Avatar" class="img-size-50 mr-3 img-circle"></td>
      <td>' . $value['nombre'] . '</td>
      <td>' . $value['precio'] . ' $</td>
      <td>
      <button type="button" class="btn btn-danger" onclick = "borrarProductoCarrito(' . $value['id'] . ');"><i class="fas fa-trash"></i> Eliminar</button>
      </td>
      </tr>';
    }

    $table .= ' 
        <tr>
        <td colspan="2" align="right"><strong>TOTAL</strong></td>
        <td>' . $precio . ' $</td>
        </tr>
        <input type="hidden" id="totalCompra" value="' . $precio . '">
        ';

    echo $table;
    break;

  case 'vaciarCarrito':

    setcookie('productos', "");
    $data = array();

    foreach ($data as $key => $value) {
      echo '<a href="../View/CursoPrevio.php?id=' . $value['id'] . '" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
            <img src="' . $value['foto'] . '" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
                <h3 class="dropdown-item-title">
                ' . $value['nombre'] . '
                  <span class="float-right text-sm text-primary"><i class="fas fa-eye"></i></span>
                </h3>
            </div>
        </div>
        <!-- Message End -->
    </a>
    <div class="dropdown-divider"></div>';
    }
    // echo json_encode($data);
    break;

  case 'borrarProductoCarrito':

    $productos = unserialize($_COOKIE['productos'] ?? '');
    foreach ($productos as $key => $value) {
      if ($value['id'] == $_POST['id']) {
        unset($productos[$key]);
      }
    }
    $productos = array_values($productos);
    setcookie('productos', serialize($productos));

    $precio = 0;
    $table = '';
    foreach ($productos as $key => $value) {
      $precio = $precio + $value['precio'];
      $table .= '<tr>
      <td><img src="' . $value['foto'] . '" alt="User Avatar" class="img-size-50 mr-3 img-circle"></td>
      <td>' . $value['nombre'] . '</td>
      <td>' . $value['precio'] . ' $</td>
      <td>
      <button type="button" class="btn btn-danger" onclick = "borrarProductoCarrito(' . $value['id'] . ');"><i class="fas fa-trash"></i> Eliminar</button>
      </td>
      </tr>';
    }

    $table .= ' 
        <tr>totalCompra
        <td colspan="2" align="right">TOTAL</td>
        <td id="totalCompra">' . $precio . ' $</td>
        <input type="hidden" id="totalCompra" value="' . $precio . '">
    </tr>';

    echo $table;
    break;

    case 'cargarDivCarrito':

      $productos = unserialize($_COOKIE['productos'] ?? '');
      setcookie('productos', serialize($productos));
      if (is_array($productos) == false) $productos = array();

      foreach ($productos as $key => $value) {
        echo '<a href="../View/CursoPrevio.php?id=' . $value['id'] . '" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <img src="' . $value['foto'] . '" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                    ' . $value['nombre'] . '
                      <span class="float-right text-sm text-primary"><i class="fas fa-eye"></i></span>
                    </h3>
                </div>
            </div>
            <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>';
      }
      break;

    case 'cargarDivCarrito':

      $productos = unserialize($_COOKIE['productos'] ?? '');
      setcookie('productos', serialize($productos));
      if (is_array($productos) == false) $productos = array();

      foreach ($productos as $key => $value) {
        echo '<a href="../View/CursoPrevio.php?id=' . $value['id'] . '" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <img src="' . $value['foto'] . '" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                    ' . $value['nombre'] . '
                      <span class="float-right text-sm text-primary"><i class="fas fa-eye"></i></span>
                    </h3>
                </div>
            </div>
            <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>';
      }
        break;

    case 'comprarProducto':
      $productos = unserialize($_COOKIE['productos'] ?? '');
      // setcookie('productos', serialize($productos));
      if (is_array($productos) == false) $productos = array();

      $idProductos = array();
      $total = 0;
      foreach ($productos as $key => $value) {
        $total = $total + $value['precio'];
        $idProductos[] = $value['id']; 
      }
      $row = $obj->comprarProducto($idProductos, $total);


      // echo json_encode($idProductos);
      break;
}
