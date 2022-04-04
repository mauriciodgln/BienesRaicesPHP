<?php

  // Importar base de datos
  require 'includes/config/database.php';
  $db = conectarDB();

  $errores = [];

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Leer datos ingresados en formulario
    $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email) {
      $errores[] = 'El email es obligatorio o no es válido';
    }

    if(!$password) {
      $errores[] = 'El password es obligatorio';
    }

    if(empty( $errores )) {
      // Revisar si el usuario existe
      $query = "SELECT * FROM usuarios WHERE email = '${email}'";
      $resultado = mysqli_query($db, $query);

      if($resultado->num_rows) {
        // Revisar si el password es correcto
        $usuario = mysqli_fetch_assoc($resultado);
        // Comparar contraseña ingresada con password hasheado
        $auth = password_verify($password, $usuario['password']);
        if($auth) {

          // El usuario está autenticado
          session_start();
          // Llenar el arreglo de la sesión
          $_SESSION['usuario'] = $usuario['email']; 
          $_SESSION['login'] = true;

          header('Location: /bienesraices/admin/index.php');

        } else {
          $errores[] = 'Contraseña incorrecta';
        }
      } else {
        $errores[] = 'El usuario no existe';
      }
    }
  }

  require 'includes/funciones.php';
  incluirTemplate('header');
?>

  <main class="contenedor seccion centrar-contenido">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error) : ?>
      <div class="alerta error">
        <?php echo $error; ?>
      </div>
    <?php endforeach; ?>

    <form action="" class="formulario" method="POST">
      <fieldset>

        <legend>Email y Password</legend>

        <div>
          <label for="email">E-mail</label>
          <input type="email" placeholder="" id="email" name="email" required>
        </div>

        <div>
          <label for="password">Password</label>
          <input type="password" placeholder="" id="password" name="password" required>
        </div>        

      </fieldset>

      <input type="submit" value="Iniciar Sesión" class="boton-verde-block">

    </form>

  </main>

<?php 
  incluirTemplate('footer');
?>
