<?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : ''; 
header ('Content-type: text/html; charset=utf-8');?>
<div class="row">
  <div class="col-md-12">

    <h2>Plato list</h2>
    <form method="POST" action="<?= FOLDER_PATH . '/Plato/addImagenPlato' ?>" enctype="multipart/form-data">
        <input type="file" name="Imagen" class="form-control" id="Imagen" placeholder="Imagen" >
        <input type="hidden" name="IdPlato" id="IdPlato" value="<?= $info_plato->Id?>">
        <button type="submit" class="btn btn-primary">Agregar Foto de Plato</button>
        <a class="btn btn-default" href="<?= FOLDER_PATH . '/Plato/PlatoFotos/'. $info_plato->Id ?>" role="button">Cancelar</a>
    </form>
    <table class="table table-striped">
      <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
      </thead>
      <?php
        echo '<tr>';
        echo "<td>{$info_plato->Nombre}</td>";
        echo "<td>{$info_plato->Descripcion}</td>";
        echo "<td>{$info_plato->Precio}</td>";
       ?>
       
      <tbody>
      
        <?php
        while ($row = $info_fotos->fetch_assoc())
        {
         
          $nameFoto = $row['Foto'];
          echo "<td><img src=\"/uploads/$nameFoto\" width=\"30%\" heigth=\"30%\"></td>";
          echo "<td><a href='" . FOLDER_PATH ."/Plato/removeFotoPlato/{$row['IdPlato']}"."&"."{$nameFoto}'>Remove</a></td>";
          echo '</tr>';
        }
        ?>
     

      </tbody>

    </table>
 
    <div align="right">
      <a class="btn btn-default" href="<?= FOLDER_PATH . '/Plato/PlatosList' ?>" role="button">Atras</a>
    </div>
  </div>
</div>