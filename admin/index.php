<?php

  require '../includes/funciones.php';
  $auth = estaAutenticado();

  if(!$auth) {
    header('Location: /bienesraices/index.php');
  }

  // Base de datos
  require '../includes/config/database.php';
  $db = conectarDB();

  // Query
  $query = "SELECT * FROM propiedades";

  // Consulta a base de datos
  $resultadoConsulta = mysqli_query($db, $query);

  // Muestra mensaje condicional
  $resultado = $_GET['resultado'] ?? null;

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if($id) {

      // Eliminar el archivo / imagen
      $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
      $resultado = mysqli_query($db, $query);
      $propiedad =  mysqli_fetch_assoc($resultado);

      unlink('../imagenes/' . $propiedad['imagen']);

      // Eliminar la propiedad
      $query = "DELETE FROM propiedades WHERE id = ${id}";
      $resultado = mysqli_query($db, $query);
      if($resultado) {
        header('Location: /bienesraices/admin/index.php?resultado=3' . '&width=' . $_GET['width']);
      }
    }
  }

  // Incluye un template
  incluirTemplate('header');
  
?>

  <main class="contenedor seccion">
    <h1>Administrador de bienes raices</h1>

    <?php if( intval($resultado) === 1) : ?>
      <p class="alerta correcto">Propiedad creada correctamente</p>
    <?php elseif( intval($resultado) === 2) : ?>
      <p class="alerta correcto">Propiedad actualizada correctamente</p>
    <?php elseif( intval($resultado) === 3) : ?>
      <p class="alerta correcto">Propiedad eliminada correctamente</p>
    <?php endif; ?>

    <a href="/bienesraices/admin/propiedades/crear.php" class="boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
      <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th class="admin-mobile">Imágen</th>
          <th class="admin-mobile">Precio</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody>
        <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
        <tr>
          <td> <?php echo $propiedad['id'] ?> </td>
          <td> <?php echo $propiedad['titulo'] ?> </td>
          <td class="admin-mobile"> <img src="/bienesraices/imagenes/<?php echo $propiedad['imagen']?>" alt="Imagen propiedad" class="imagen-tabla"> </td>
          <td class="admin-mobile">$<?php echo $propiedad['precio']?> </td>
          <td>
            <form method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
              <input type="submit" value="Eliminar" class="boton-rojo-block">
            </form>
            <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'] . '&width=' . $_GET['width'];?>" class="boton-celeste-block">Actualizar</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

  </main>

<?php 
  incluirTemplate('footer');
?>