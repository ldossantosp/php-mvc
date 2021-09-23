<h2>Edit Plato form</h2>
<?php !$info_plato ? exit('Hubo un error al cargar la información del Plato') : '' ?>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/Plato/updatePlato' ?>">
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre" value="<?= $info_plato->Nombre?>">
      </div>
      <div class="form-group">
        <label for="Nombre">Descripción</label>
        <input type="text" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion" value="<?= $info_plato->Descripcion?>">
      </div>
      <div class="form-group">
        <label for="Precio">Precio</label>
        <input type="number" name="Precio" class="form-control" id="Precio" placeholder="Precio" value="<?= $info_plato->Precio?>">
      </div>
      <input type="hidden" name="id" value="<?= $info_plato->Id ?>">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-default" href="<?= FOLDER_PATH . '/Plato/PlatosList' ?>" role="button">Cancel</a>
    </form>
  </div>
</div>