<?php 


function conectarDB() : mysqli {
  $db = mysqli_connect('localhost', 'root', 'root', 'bienes_raices');

  if(!$db) {
    echo 'No se pudo conectar a la base de datos';
    exit;
  }

  return $db;
}