<?php 
/**
* 
*/
class MainModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function affected_rows()
  {
    return $this->db->affected_rows;
  }

  public function addClient($params)
  {
    $CI = $this->db->real_escape_string($params['CI']);
    $name = $this->db->real_escape_string($params['Nombre']);
    $address = $this->db->real_escape_string($params['Direccion']);
    $password = $this->db->real_escape_string($params['Password']);
    $sql = "INSERT INTO Cliente (CI, Nombre, Direccion, Password) VALUES ('$CI','$name', '$address', 'password')";
    return $this->db->query($sql);
  }

  public function clientsList()
  {
    $sql = 'SELECT * FROM Cliente';
    return $this->db->query($sql);
  }

  public function clientList($CI)
  {
    $sql = "SELECT * FROM Cliente WHERE CI='{$CI}'";
    return $this->db->query($sql);
  }

  public function removeClient($CI)
  {
    $sql = "DELETE FROM Cliente WHERE CI={$CI}";
    return $this->db->query($sql);
  }

  public function updateClient($params)
  {
    $name = $this->db->real_escape_string($params['Nombre']);
    $address = $this->db->real_escape_string($params['Direccion']);
    $CI = $this->db->real_escape_string($params['CI']);
    $sql = "UPDATE Cliente SET Nombre='{$name}', Direccion='{$address}' WHERE CI='{$CI}'";
    return $this->db->query($sql);
  }
}