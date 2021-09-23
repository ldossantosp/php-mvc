<?php 
header ('Content-type: text/html; charset=utf8');
/**
* 
*/
class PlatoModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function affected_rows()
  {
    return $this->db->affected_rows;
  }

  public function addPlato($params)
  {
    $descripcion = $this->db->real_escape_string($params['Descripcion']);
    $precio = $this->db->real_escape_string($params['Precio']);
    $nombre = $this->db->real_escape_string($params['Nombre']);
    $sql = "INSERT INTO Plato (Descripcion, Precio, Nombre) VALUES ('$descripcion', '$precio', '$nombre')";
    if($this->db->query($sql) || $this->affected_rows())
        return $this->addImagenPlato($params['Imagen'], mysqli_insert_id($this->db));
  }

  public function addImagenPlato($params, $idPlato){
  
    if($params['size'] < 3000000){
        if($params['type'] == 'image/jpg' || $params['type'] == 'image/jpeg' || $params['type'] == 'image/png'
        || $params['type'] == 'image/gif'){
            //muevo la imagen de la cerpeta temporal del servidor a la carpeta destino
            move_uploaded_file($params['tmp_name'], PATH_UPLOAD_IMAGES.$params['name']);
            $nameImage = $params['name'];
            $sql = "INSERT INTO PlatoFoto (IdPlato, Foto) VALUES ('$idPlato', '$nameImage')";
            return $this->db->query($sql); 
        }
    }
  }

  public function removeFotoPlato($idPlato, $Foto){

    $sql = "DELETE FROM PlatoFoto WHERE   IdPlato ='{$idPlato}' and Foto ='{$Foto}'";
    return $this->db->query($sql);
  }

  public function PlatosList()
  {
    $sql = 'SELECT * FROM Plato';
    return $this->db->query($sql);
  }

  //no es utilizada por el momento, borrar
  public function PlatosListFotos()
  {
    $sql = 'SELECT * FROM Plato p, PlatoFoto pf where p.Id = pf.IdPlato';
    return $this->db->query($sql);
  }

  public function PlatoList($id)
  {
    $sql = "SELECT * FROM Plato WHERE Id='{$id}'";
    return $this->db->query($sql);
  }

  public function PlatoFotos($id){
      $sql ="SELECT * FROM PlatoFoto WHERE  IdPlato='{$id}'";
      return $this->db->query($sql);
  }

  //Borra los platos junto a sus imágenes
  public function removePlato($id)
  {
    //elimina las fotos del Plato
    $sql = "DELETE FROM PlatoFoto where IdPlato={$id}";

    $result = $this->db->query($sql);

    //si eliminó las fotos del plato, elimino el plato
    if($result || $this->affected_rows()){
      $sql = "DELETE FROM Plato WHERE Id={$id}";
      return $this->db->query($sql);
    }
  }

  public function updatePlato($params)
  {
    $descripcion = $this->db->real_escape_string($params['Descripcion']);
    $precio = $this->db->real_escape_string($params['Precio']);
    $nombre = $this->db->real_escape_string($params['Nombre']);
    $id = $this->db->real_escape_string($params['id']);
    $sql = "UPDATE Plato SET Descripcion='{$descripcion}', Precio='{$precio}', Nombre='{$nombre}' WHERE Id='{$id}'";
    return $this->db->query($sql);
  }
}