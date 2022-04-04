<?php
  require 'includes/funciones.php';
  incluirTemplate('header', $inicio = true);
?>


  <main class="contenedor seccion">

    <h2>Más Sobre Nosotros</h2>

    <div class="contenedor-nosotros">

      <div class="iconos">
        <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy" width="100" height="100">
        <h3>Seguridad</h3>
        <p>Expedita id suscipit necessitatibus. Id labore quos soluta! Distinctio repudiandae veniam, consequatur earum error facilis tenetur veritatis. Voluptatem architecto saepe iste libero.</p>
      </div>

      <div class="iconos">
        <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy" width="100" height="100">
        <h3>Precio</h3>
        <p>Expedita id suscipit necessitatibus. Id labore quos soluta! Distinctio repudiandae veniam, consequatur earum error facilis tenetur veritatis. Voluptatem architecto saepe iste libero.</p>
      </div>

      <div class="iconos">
        <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy" width="100" height="100">
        <h3>A Tiempo</h3>
        <p>Expedita id suscipit necessitatibus. Id labore quos soluta! Distinctio repudiandae veniam, consequatur earum error facilis tenetur veritatis. Voluptatem architecto saepe iste libero.</p>
      </div>

    </div> <!-- .contenido-nosotros -->
    
  </main>


  <section class="contenedor seccion anuncios">

    <h2>Casas y Departamentos en Venta</h2>

    <?php
      $limite = 3;
      $flechas = true;
      include 'includes/templates/anuncios.php';
    ?>
    
    <div class="inferior-anuncio">

      <div class="flechas">
        <img class="flecha-izq" src="build/img/arrow_left.svg" alt="Flecha izquierda">
        <img class="flecha-der" src="build/img/arrow_right.svg" alt="Flecha derecha">
      </div>
  
      <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Ver Todas</a>
      </div>

    </div>

  </section>


  <section class="imagen-contacto">
    <div class="contenido-contacto">
      <h2>Encuentra la casa de tus sueños</h2>
      <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
      <a href="contacto.php" class="boton-celeste">Contáctanos</a>
    </div>
  </section>


  <div class="contenedor seccion seccion-final">

    <section>

      <h2>Nuestro Blog</h2>

      <article class="entrada-blog">

        <div class="imagen-blog">
          <picture>
            <source srcset="build/img/blog1.webp" type="image/webp">
            <source srcset="build/img/blog1.jpg" type="image/jpeg">
            <img src="build/img/blog1.jpg" alt="Imagen Blog 1" loading="lazy" width="100" height="100">
          </picture>
        </div>

        <div class="texto-entrada">
          <a href="entrada.php">
            <h3 class="heading-entrada">Terraza en el techo de tu casa</h3>
          </a>
          <p class="texto-meta">Escrito el: <span>20/02/2022</span> por: <span>Admin</span></p>
          <p>Consejos para construir una terraza en el techo de tu casa, con los mejores materiales y ahorrando dinero.</p>
        </div>

      </article> <!-- .entrada-blog -->

      <article class="entrada-blog">

        <div class="imagen-blog">
          <picture>
            <source srcset="build/img/blog2.webp" type="image/webp">
            <source srcset="build/img/blog2.jpg" type="image/jpeg">
            <img src="build/img/blog2.jpg" alt="Imagen Blog 2" loading="lazy" width="100" height="100">
          </picture>
        </div>

        <div class="texto-entrada">
          <a href="entrada.php">
            <h3 class="heading-entrada">Guía para decoración del hogar</h3>
          </a>
          <p class="texto-meta">Escrito el: <span>15/01/2022</span> por: <span>Admin</span></p>
          <p>Maximiza el espacio en tu hogar, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
        </div>

      </article> <!-- .entrada-blog -->

    </section>

    <section class="testimoniales">

      <h2>Testimoniales</h2>

      <div class="testimonial">

        <blockquote>
          El personal se comportó de una excelente forma, muy buena atención y la casa que me han ofrecido cumple con todos mis requerimientos y expectativas. Excelente trabajo.
        </blockquote>

        <p>- Mauricio González</p>

      </div>

    </section>

  </div>

  
<?php 
  incluirTemplate('footer', $inicio = true);
?>
