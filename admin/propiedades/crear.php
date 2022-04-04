<?php

  require '../../includes/funciones.php';
  $auth = estaAutenticado();

  if(!$auth) {
    header('Location: /bienesraices/index.php');
  }

  // Base de datos
  require '../../includes/config/database.php';
  $db = conectarDB();

  // Consultar para obtener a los vendedores
  $consulta = "SELECT * FROM vendedores";
  $resultadoVendedores = mysqli_query($db, $consulta);

  // Arreglo con mensajes de errores
  $errores = [];

  $titulo = '';
  $precio = '';
  $descripcion = '';
  $habitaciones = '';
  $wc = '';
  $estacionamiento = '';
  $vendedorId = '';

  // Ejecutar el código después de que el usuario envía el formulario
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    $titulo = mysqli_real_escape_string( $db, $_POST['titulo']);
    $precio = mysqli_real_escape_string( $db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string( $db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento']);
    $creado = date('Y/m/d');
    $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor']);

    // Asignar files a una variable
    $imagen = $_FILES['imagen'];

    // Errores
    if(!$titulo) {
      $errores[] = 'Debes añadir un título';
    }

    if(!$precio) {
      $errores[] = 'El precio es obligatorio';
    }

    if( strlen($descripcion) < 50 ) {
      $errores[] = 'La descripción es obligatoria y debe ser mayor a 50 caracteres';
    }

    if(!$habitaciones) {
      $errores[] = 'El número de habitaciones es obligatorias';
    }

    if(!$wc) {
      $errores[] = 'El número de baños es obligatorios';
    }

    if(!$estacionamiento) {
      $errores[] = 'El número de lugares de estacionamiento es obligatorios';
    }

    if(!$vendedorId) {
      $errores[] = 'El vendedor es obligatorio';
    }

    if(!$imagen['name'] || $imagen['error']) {
      $errores[] = 'La imagen es obligatoria';
    }

    // Validar por tamaño (1MB máximo)

    $medida = 1000 * 1000;

    if($imagen['size'] > $medida) {
      $errores[] = 'La imagen es muy pesada';
    }

    // Revisar que el arreglo de errores esté vacio
    if(empty( $errores )) {

      /* Subir archivos */

      // Crear carpeta
      $carpetaImagenes = '../../imagenes/';
      if(!is_dir($carpetaImagenes)) {
        mkdir($carpetaImagenes);
      }

      // Generar un nombre único
      $imgName = $imagen['type'];
      $extension = explode('/', $imgName);
      $nombreImagen = md5( uniqid( rand(), true ) ) . '.' . $extension[1];

      // Subir la imagen
      move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . '/' . $nombreImagen);


      // Insertar en la base de datos
      $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";
      
      $resultadoQuery = mysqli_query($db, $query);

      if($resultadoQuery) {
        header('Location: /bienesraices/admin/index.php?resultado=1' . '&width=' . $_GET['width']);
      }
    }

  }

  incluirTemplate('header');

?>

  <main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/bienesraices/admin/index.php" class="boton-verde">Volver</a>

    <?php foreach($errores as $error) : ?>
      <div class="alerta error">
        <?php echo $error; ?>  
      </div>
    <?php endforeach; ?>

    <form action="" class="formulario" method="POST" action="/bienesraices/admin/propiedades/crear.php" enctype="multipart/form-data">

      <fieldset>
        <legend>Información General</legend>
        <div>
          <label for="titulo">Título</label>
          <input type="text" id="titulo" name="titulo" value="<?php echo $titulo ?>" placeholder="Título Propiedad">
        </div>
        <div>
          <label for="precio">Precio</label>
          <input type="number" id="precio" name="precio" value="<?php echo $precio ?>" placeholder="Precio Propiedad">
        </div>
        <div>
          <label for="imagen">Imagen</label>
          <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
        </div>
        <div>
          <label for="descripcion">Descripcion</label>
          <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
        </div>
      </fieldset>

      <fieldset>
        <legend>Información Propiedad</legend>
        <div>
          <label for="habitaciones">Habitaciones</label>
          <input type="number" id="habitaciones" name="habitaciones" value="<?php echo $habitaciones ?>" placeholder="Ej. 3" min="1" max="9">
        </div>
        <div>
          <label for="wc">Baños</label>
          <input type="number" id="wc" name="wc" value="<?php echo $wc ?>" placeholder="Ej. 3" min="1" max="9">
        </div>
        <div>
          <label for="estacionamiento">Estacionamiento</label>
          <input type="number" id="estacionamiento" name="estacionamiento" value="<?php echo $estacionamiento ?>" placeholder="Ej. 3" min="1" max="9">
        </div>
      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>
        
        <select name="vendedor">
          <option value="" selected>--Seleccione--</option>
          <?php while( $vendedor = mysqli_fetch_assoc($resultadoVendedores) ) : ?>
            <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '' ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido']; ?></option>
          <?php endwhile; ?>
        </select>
      </fieldset>

      <input type="submit" value="Crear Propiedad" class="boton-verde">

    </form>

  </main>

<?php

  // Cerrar conexión bd
  mysqli_close($db);
  
  incluirTemplate('footer');
?>