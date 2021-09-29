<?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '' ?>
<div class="row">
  <div class="col-md-12">
    <h2>Clientes</h2>

    <table class="table table-striped">
      <thead>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Edit</th>
        <th>Remove</th>
      </thead>
      <tbody>
        <?php
        while ($row = $clients->fetch_assoc())
        {
          echo '<tr>';
          echo "<td>{$row['CI']}</td>";
          echo "<td>{$row['Nombre']}</td>";
          echo "<td>{$row['Direccion']}</td>";
          echo "<td><a href='" . FOLDER_PATH ."/Main/clientList/{$row['CI']}'>Edit</a></td>";
          echo "<td><a href='" . FOLDER_PATH ."/Main/removeClient/{$row['CI']}'>Remove</a></td>";
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>

  </div>
</div>