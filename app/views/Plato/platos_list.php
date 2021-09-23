<?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '' ?>
<div class="row">
  <div class="col-md-12">

    <h2>Platos list</h2>

    <table class="table table-striped">
      <thead>
        <th>#</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Nombre</th>
        <!--<th>Foto</th>-->
        <th>Ver/Editar Información de Plato</th>
        <th>Ver/Editar Fotos de Plato</th>
        <th>Remove</th>
      </thead>
      <tbody>
        <?php
        while ($row = $platos->fetch_assoc())
        {
          echo '<tr>';
          echo "<td>{$row['Id']}</td>";
          echo "<td>{$row['Descripcion']}</td>";
          echo "<td>{$row['Precio']}</td>";
          echo "<td>{$row['Nombre']}</td>";
         // $nameFoto = $row['Foto'];
         // echo "<td><img src=\"/uploads/$nameFoto\"></td>";
          echo "<td><a href='" . FOLDER_PATH ."/Plato/PlatoList/{$row['Id']}'>Edit</a></td>";
          echo "<td><a href='" . FOLDER_PATH ."/Plato/PlatoFotos/{$row['Id']}'>Edit</a></td>";
          echo "<td><a href='" . FOLDER_PATH ."/Plato/removePlato/{$row['Id']}'>Remove</a></td>";
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>

  </div>
</div>