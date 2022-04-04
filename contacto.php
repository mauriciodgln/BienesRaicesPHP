<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>


  <main class="contenedor seccion">

    <h1 class="margin">Contacto</h1>

    <picture>
      <source srcset="build/img/destacada3.webp" type="image/webp">
      <source srcset="build/img/destacada3.jpg" type="image/jpeg">
      <img src="build/img/destacada3.jpg" alt="Imagen contacto" width="100" height="100">
    </picture>

    <h2 class="margin">Llene el Formulario de Contacto</h2>

    <form action="" class="formulario">

      <fieldset class="informacion-personal">

        <legend>Información personal</legend>

        <div>
          <label for="nombre">Nombre</label>
          <input type="text" placeholder="" id="nombre">
        </div>

        <div>
          <label for="email">E-mail</label>
          <input type="email" placeholder="" id="email">
        </div>

        <div>
          <label for="telefono">Teléfono</label>
          <input type="tel" placeholder="" id="telefono">
        </div>        

        <div>
          <label for="mensaje">Mensaje</label>
          <textarea name="" id="mensaje"></textarea>
        </div>

      </fieldset>

      <fieldset class="informacion-propiedad">
        
        <legend>Información sobre la propiedad</legend>

        <div>
          <label for="opciones">Vende o compra</label>
          <select id="opciones">
            <option value="" disabled selected>Seleccione</option>
            <option value="compra">Compra</option>
            <option value="vende">Vende</option>
          </select>
        </div>

        <div>
          <label for="presupuesto">Precio o Presupuesto</label>
          <input type="number" placeholder="" id="presupuesto">
        </div>

      </fieldset>

      <fieldset class="informacion-contacto">
        
        <legend>Contacto</legend>

        <p>¿Cómo desea ser contactado?</p>

        <div class="forma-contacto">          

          <label for="contactar-telefono">Teléfono</label>
          <input type="radio" name="contacto" id="contactar-telefono">

          <label for="contactar-email">E-mail</label>
          <input type="radio" name="contacto" id="contactar-email">

        </div>

        <p>Si eligió teléfono, eliga la hora y fecha para ser contactado</p>

        <div class="fecha-hora">
          <div>
            <label for="fecha">Fecha</label>
            <input type="date" placeholder="" id="fecha">
          </div>
  
          <div>
            <label for="hora">Hora</label>
            <input type="time" placeholder="" id="hora" min="09:00" max="18:00">
          </div>
        </div> 

      </fieldset>

      <div class="alinear-derecha">
        <input type="submit" value="Enviar" class="boton-verde" name="" id="">
      </div>

    </form>

  </main>


<?php 
  incluirTemplate('footer');
?>
