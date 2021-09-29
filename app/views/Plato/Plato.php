<?php defined('BASEPATH') or exit('No se permite acceso directo'); 
header ('Content-type: text/html; charset=utf8');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Main</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <!-- Minified JS library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Plato</a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= FOLDER_PATH . '/Plato/form' ?>">Add Plato</a></li>
        <li><a href="<?= FOLDER_PATH . '/Plato/PlatosList' ?>">Platos list</a></li>
        <li><a href="<?= FOLDER_PATH . '/Main' ?>">Clientes</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $nombre ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/php-mvc-1/Main/logout">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>

    </div>
  </nav>

  <div class="container">
    <?php !empty($show_form) ? require 'app/views/Plato/form.php' : '' ?>
    <?php !empty($show_edit_form) ? require 'app/views/Plato/edit_form.php' : '' ?>
    <?php !empty($show_edit_form_foto) ? require 'app/views/Plato/edit_form_foto.php' : '' ?>
    <?php !empty($show_platos_list) ? require 'app/views/Plato/platos_list.php' : '' ?>
  </div>
