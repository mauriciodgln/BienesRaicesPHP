<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>


  <main class="contenedor seccion">

    <h1>Nuestro Blog</h1>

    <article class="entrada-blog">

      <div class="imagen-blog">
        <picture>
          <source srcset="build/img/blog1.webp" type="image/webp">
          <source srcset="build/img/blog1.jpg" type="image/jpeg">
          <img src="build/img/blog1.jpg" alt="Imagen Blog 1" width="100" height="100">
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.php">
          <h2 class="heading-entrada">Terraza en el techo de tu casa</h2>
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
          <h2 class="heading-entrada">Guía para decoración del hogar</h2>
        </a>
        <p class="texto-meta">Escrito el: <span>15/01/2022</span> por: <span>Admin</span></p>
        <p>Maximiza el espacio en tu hogar, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
      </div>

    </article> <!-- .entrada-blog -->

    <article class="entrada-blog">

      <div class="imagen-blog">
        <picture>
          <source srcset="build/img/blog3.webp" type="image/webp">
          <source srcset="build/img/blog3.jpg" type="image/jpeg">
          <img src="build/img/blog3.jpg" alt="Imagen Blog 3" loading="lazy" width="100" height="100">
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.php">
          <h2 class="heading-entrada">Terraza en el techo de tu casa</h2>
        </a>
        <p class="texto-meta">Escrito el: <span>20/02/2022</span> por: <span>Admin</span></p>
        <p>Consejos para construir una terraza en el techo de tu casa, con los mejores materiales y ahorrando dinero.</p>
      </div>

    </article> <!-- .entrada-blog -->

    <article class="entrada-blog">

      <div class="imagen-blog">
        <picture>
          <source srcset="build/img/blog4.webp" type="image/webp">
          <source srcset="build/img/blog4.jpg" type="image/jpeg">
          <img src="build/img/blog4.jpg" alt="Imagen Blog 4" loading="lazy" width="100" height="100">
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.php">
          <h2 class="heading-entrada">Guía para decoración del hogar</h2>
        </a>
        <p class="texto-meta">Escrito el: <span>15/01/2022</span> por: <span>Admin</span></p>
        <p>Maximiza el espacio en tu hogar, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
      </div>

    </article> <!-- .entrada-blog -->
    
  </main>

  
<?php 
  incluirTemplate('footer');
?>
