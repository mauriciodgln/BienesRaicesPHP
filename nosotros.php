<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>


  <main class="contenedor seccion">

    <h1>Conoce sobre nosotros</h1>

    <div class="contenido-nosotros">

      <picture>
        <source srcset="build/img/nosotros.webp" type="image/webp">
        <source srcset="build/img/nosotros.jpg" type="image/jpeg">
        <img src="build/img/nosotros.jpg" alt="Imagen Blog 1" width="100" height="100">
      </picture>

      <div class="texto-nosotros">
        <blockquote>25 años de experiencia</blockquote>
        <p>Beatae eius praesentium quos voluptatem? Delectus voluptate enim magnam dolorem natus corrupti unde labore sequi exercitationem fugit! Maiores molestiae repellendus quae deleniti. Beatae eius praesentium quos voluptatem? Delectus voluptate enim magnam dolorem natus corrupti unde labore sequi exercitationem fugit! Maiores molestiae repellendus quae deleniti. Beatae eius praesentium quos voluptatem? Delectus voluptate enim magnam dolorem natus corrupti unde labore sequi exercitationem fugit! </p>
        <p>Maiores molestiae repellendus quae deleniti. Beatae eius praesentium quos voluptatem? Delectus voluptate enim magnam dolorem natus corrupti unde labore sequi exercitationem fugit! </p>
      </div>

    </div>

  </main>


  <section class="contenedor seccion">

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

  </section>
  

<?php 
  incluirTemplate('footer');
?>