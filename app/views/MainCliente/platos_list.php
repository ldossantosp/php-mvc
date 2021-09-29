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
        <th>Foto</th>
      </thead>
      <tbody>
        <?php
        $idAnterior = 0;
        while ($row = $platos->fetch_assoc())
        {
          if($idAnterior != $row['Id']){
            echo '<tr>';
            echo "<td>{$row['Id']}</td>";
            echo "<td>{$row['Descripcion']}</td>";
            echo "<td>{$row['Precio']}</td>";
            echo "<td>{$row['Nombre']}</td>";
            $nameFoto = $row['Foto'];
            echo "<td><img src=\"/uploads/$nameFoto\"></td>"; 
            echo "<td><a href='" . FOLDER_PATH ."/MainCliente/platoFotosList/{$row['Id']}'>Ver más...</a></td>";
            echo "<td><a href='" . FOLDER_PATH ."/Plato/PlatoFotos/{$row['Id']}'>Pedir</a></td>";
            echo '</tr>';
            $idAnterior = $row['Id'];
          }
        }
        ?>
      </tbody>
    </table>

  </div>
</div>