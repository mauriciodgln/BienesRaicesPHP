<?php

  // Validad por ID valido
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id) { 
    header('Location: /bienesraices/index.php');
  }

  // Conectar base de datos
  require 'includes/config/database.php';
  $db = conectarDB();

  // Obtener los datos de la propiedad
  $consulta = "SELECT * FROM propiedades WHERE id = '${id}'";
  $resultado = mysqli_query($db, $consulta);

  if(!$resultado->num_rows) {
    header('Location: /bienesraices/index.php');
  }

  $propiedad = mysqli_fetch_assoc($resultado);

  require 'includes/funciones.php';
  incluirTemplate('header');

?>

  
  <main class="contenedor seccion">

    <h1 class="margin"><?php echo $propiedad['titulo']; ?></h1>

    <img src="imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagen casa frente bosque" width="100" height="100">

    <div class="informacion-anuncio">

      <p>Valor: <span class="precio">$<?php echo $propiedad['precio'] ?></span></p>

      <ul class="iconos-anuncio">
    
        <li>
          <img src="build/img/icono_wc.svg" alt="Icono wc" loading="lazy" width="100" height="100">
          <p><?php echo $propiedad['wc'] ?></p>
        </li>

        <li>
          <img src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento" loading="lazy" width="100" height="100">
          <p><?php echo $propiedad['estacionamiento'] ?></p>
        </li>

        <li>
          <img src="build/img/icono_dormitorio.svg" alt="Icono habitaciones" loading="lazy" width="100" height="100">
          <p><?php echo $propiedad['habitaciones'] ?></p>
        </li>

      </ul> 

    </div>

    <div class="texto-anuncio">
      <p><?php echo $propiedad['descripcion'] ?> </p>
    </div>

  </main>


<?php
  // Cerrar base de datos
  mysqli_close($db);
  incluirTemplate('footer');
?>
