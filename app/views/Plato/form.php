<h2>Add Plato form</h2>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/Plato/addPlato' ?>" enctype="multipart/form-data">
      <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre" >
      </div>
      <div class="form-group">
        <label for="Nombre">Descripción</label>
        <input type="text" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion" >
      </div>
      <div class="form-group">
        <label for="Precio">Precio</label>
        <input type="number" name="Precio" class="form-control" id="Precio" placeholder="Precio" >
      </div>
      <div class="form-group">
        <label for="Imagen">Imagen</label>
        <input type="file" name="Imagen" class="form-control" id="Imagen" placeholder="Imagen" >
      </div>
      <?php
        !empty($message)
        ? print("<div class=\"alert alert-warning\">$message</div>")
        : ''
      ?>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>