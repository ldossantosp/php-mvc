<h2>Edit client form</h2>
<?php !$info_client ? exit('Hubo un error al cargar la información del cliente') : '' ?>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/Main/updateClient' ?>">
      <div class="form-group">
        <label for="CI">CI</label>
        <input type="text" name="CI" class="form-control" id="CI" placeholder="CI" value="<?= $info_client->CI?>" readonly>
      </div>
      <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="Nombre" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre" value="<?= $info_client->Nombre?>">
      </div>
      <div class="form-group">
        <label for="address">Direccion</label>
        <input type="text" name="Direccion" class="form-control" id="Direccion" placeholder="Direccion" value="<?= $info_client->Direccion ?>">
      </div>
      <!--input type="hidden" name="id" value="<--?= $info_client->id ?>"-->
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-default" href="<?= FOLDER_PATH . '/Main/clientsList' ?>" role="button">Cancel</a>
    </form>
  </div>
</div>