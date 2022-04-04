<?php

  if(!isset($_SESSION)) {
    session_start();
  }

  $url = $_SERVER["REQUEST_URI"];

  if(!isset($_GET['width'])) {
    echo "<script language=\"JavaScript\">
    document.location=\"$url?width=\"+screen.width;
    </script>";
  }

  $widthPantalla = $_GET['width'];

  $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="description" content="Página de Bienes Raices donde podrás encontrar casas y departamentos de lujo en venta ubicadas en las mejores zonas del país.">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 viewport-fit=cover">
  <link rel="preload" href="/bienesraices/build/css/app.css" as="style">
  <link rel="stylesheet" href="/bienesraices/build/css/app.css">
  <title>Bienes Raices</title>
</head>
<body>

  <header class="header <?php echo $inicio ? 'inicio' : '' ?>">

    <div class="contenedor <?php echo $inicio ? 'contenido-header' : '' ?>">

      <div class="barra">

        <a class="logo" href="/bienesraices/index.php">
          <img src="/bienesraices/build/img/logo.svg" alt="Logo Bienes Raices" loading="lazy" width="300" height="100" >
        </a>
        
        <nav class="navegacion-mobile">
          <div class="icono-nav">
            <span class="linea-1"></span>
            <span class="linea-2"></span>
            <span class="linea-3"></span>
          </div>
        </nav>

        <nav class="navegacion-desktop">

          <?php if(!$auth) : ?>
            <a href="/bienesraices/nosotros.php">Nosotros</a>
            <a href="/bienesraices/anuncios.php">Anuncios</a>
            <a href="/bienesraices/blog.php">Blog</a>
            <a href="/bienesraices/contacto.php">Contacto</a>
            <a href="/bienesraices/login.php">Login</a>
          <?php else  : ?>
            <?php echo $widthPantalla < 768 ? '<a href="/bienesraices/nosotros.php">Nosotros</a>' : '' ?>
            <?php echo $widthPantalla < 768 ? '<a href="/bienesraices/anuncios.php">Anuncios</a>' : '' ?>
            <?php echo $widthPantalla < 768 ? '<a href="/bienesraices/blog.php">Blog</a>' : '' ?>
            <?php echo $widthPantalla < 768 ? '<a href="/bienesraices/contacto.php">Contacto</a>' : '' ?>
            <a href="/bienesraices/admin/index.php">Administrador</a>
            <a href="/bienesraices/cerrar-sesion.php">Cerrar Sesión</a>
          <?php endif; ?>
          
        </nav>

      </div> <!-- .barra -->

      <h1 class="<?php echo  $inicio ? '' : 'ocultar' ?>" >Venta de Casas y Departamentos Exclusivos de Lujo</h1>

    </div> <!-- .contenido-header -->

  </header>