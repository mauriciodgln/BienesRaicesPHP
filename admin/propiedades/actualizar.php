<?php

  require '../../includes/funciones.php';
  $auth = estaAutenticado();
  
  if(!$auth) {
    header('Location: /bienesraices/index.php');
  }

  // Validad por ID valido
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id) { 
    header('Location: /bienesraices/admin/index.php');
  }

  // Base de datos
  require '../../includes/config/database.php';
  $db = conectarDB();

  // Obtener los datos de la propiedad
  $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
  $resultado = mysqli_query($db, $consulta);

  if(!$resultado->num_rows) {
    header('Location: /bienesraices/admin/index.php');
  }

  $propiedad = mysqli_fetch_assoc($resultado);

  // Consultar para obtener a los vendedores
  $consulta = "SELECT * FROM vendedores";
  $resultadoVendedores = mysqli_query($db, $consulta);

  // Arreglo con mensajes de errores
  $errores = [];

  $titulo = $propiedad['titulo'];
  $precio = $propiedad['precio'];
  $descripcion = $propiedad['descripcion'];
  $habitaciones = $propiedad['habitaciones'];
  $wc = $propiedad['wc'];
  $estacionamiento = $propiedad['estacionamiento'];
  $vendedorId = $propiedad['vendedorId'];
  $imagenPropiedad = $propiedad['imagen'];

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

    // Validar por tamaño (1MB máximo)

    $medida = 1000 * 1000;

    if($imagen['size'] > $medida) {
      $errores[] = 'La imagen es muy pesada';
    }

    // Revisar que el arreglo de errores esté vacio
    if(empty( $errores )) {

      // Crear carpeta
      $carpetaImagenes = '../../imagenes/';
      if(!is_dir($carpetaImagenes)) {
        mkdir($carpetaImagenes);
      }

      $nombreImagen = '';

      /* Subir archivos */

      // 
      if($imagen['name']) {

        // Eliminar la imagen previa
        unlink($carpetaImagenes . $propiedad['imagen']);

        // Generar un nombre único
        $imgName = $imagen['type'];
        $extension = explode('/', $imgName);
        $nombreImagen = md5( uniqid( rand(), true ) ) . '.' . $extension[1];

        // Subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . '/' . $nombreImagen);

      } else {
        $nombreImagen = $propiedad['imagen'];
      }

      // Insertar en la base de datos
      $query = "UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = ${vendedorId} WHERE id = ${id}";
      
      $resultadoQuery = mysqli_query($db, $query);

      if($resultadoQuery) {
        header('Location: /bienesraices/admin/index.php?resultado=2' . '&width=' . $_GET['width']);
      }
    }

  }

  incluirTemplate('header');

?>

  <main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>

    <a href="/bienesraices/admin/index.php" class="boton-verde">Volver</a>

    <?php foreach($errores as $error) : ?>
      <div class="alerta error">
        <?php echo $error; ?>  
      </div>
    <?php endforeach; ?>

    <form action="" class="formulario" method="POST" enctype="multipart/form-data">

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
          <img src="/bienesraices/imagenes/<?php echo $imagenPropiedad; ?>" alt="Imagen Propiedad" class="imagen-small">
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

      <input type="submit" value="Actualizar Propiedad" class="boton-verde">

    </form>

  </main>

<?php

  // Cerrar conexión bd
  mysqli_close($db);
  
  incluirTemplate('footer');
?>