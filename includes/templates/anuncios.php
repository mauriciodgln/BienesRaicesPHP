<?php

  // Importar conexión a base de datos
  require 'includes/config/database.php';
  $db = conectarDB();
  // Consultar
  $query = "SELECT * FROM propiedades LIMIT ${limite}";
  // Obtener los resultados
  $resultado = mysqli_query($db, $query);

?>


<div class="contenedor-anuncios">

  <?php echo $flechas ? '<img class="flecha-izq tablet" src="build/img/arrow_left.svg" alt="Flecha izquierda" width="100" height="100">' : '' ?>
  <?php echo $flechas ? '<img class="flecha-der tablet" src="build/img/arrow_right.svg" alt="Flecha derecha" width="100" height="100">' : '' ?>

  <?php while( $propiedad = mysqli_fetch_assoc($resultado)) : ?>

  <div class="anuncio">

    <img class="imagen-propiedad" src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio" width="100" height="100">

    <div class="contenido-anuncio">

      <h3><?php echo $propiedad['titulo']; ?></h3>
      <p class="descripcion-anuncio"><?php echo $propiedad['descripcion']; ?></p>
      <p class="precio">$<?php echo $propiedad['precio']; ?></p>

      <ul class="iconos-anuncio">

        <li>
          <img src="build/img/icono_wc.svg" alt="Icono wc" loading="lazy" width="100" height="100">
          <p><?php echo $propiedad['wc']; ?></p>
        </li>

        <li>
          <img src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento" loading="lazy" width="100" height="100">
          <p><?php echo $propiedad['estacionamiento']; ?></p>
        </li>

        <li>
          <img src="build/img/icono_dormitorio.svg" alt="Icono habitaciones" loading="lazy" width="100" height="100">
          <p><?php echo $propiedad['habitaciones']; ?></p>
        </li>

      </ul> 

      

      <a href="anuncio.php?id=<?php echo $propiedad['id'] . '&width=' . $_GET['width']; ?>" class="boton-celeste-block">Ver propiedad</a>

    </div> <!-- .contenido-anuncio -->

  </div> <!-- .anuncio -->
  <?php endwhile; ?>

</div> <!-- .contenedor-anuncios -->


<?php
  // Cerrar la conexión
  mysqli_close($db);
?>