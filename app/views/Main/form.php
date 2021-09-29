<h2>Add client form</h2>
<div class="row">
  <div class="col-md-6">
    <form method="POST" action="<?= FOLDER_PATH . '/Main/addClient' ?>">
      <div class="form-group">
        <label for="CI">CI</label>
        <input type="text" name="CI" class="form-control" id="CI" placeholder="CI" >
      </div>
      <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="Nombre" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre" >
      </div>
      <div class="form-group">
        <label for="Direccion">Direccion</label>
        <input type="text" name="Direccion" class="form-control" id="Direccion" placeholder="Direccion" >
      </div>
      <div class="form-group">
        <label for="Password">Password</label>
        <input type="Password" name="Password" class="form-control" id="Password" placeholder="Password" >
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