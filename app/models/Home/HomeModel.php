<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**
 * Home Model
 */
class HomeModel extends Model
{
  /**
  * Inicia conexión DB
  */
  public function __construct()
  {
    parent::__construct();
  }

  /**
  * Obtiene el usuario de la DB por ID
  */
  public function getUser($id)
  {
    return $this->db->query("SELECT * FROM `usuario` WHERE `id_dev` = $id")->fetch_array(MYSQLI_ASSOC);
  }


  public function listarInfoPlatos()
  {
    $sql = "SELECT * from Plato";
    return $this->db->query($sql);
  }

  public function ListarFotosPlato($Id)
  {
    $sql = "SELECT Foto FROM PlatoFoto where IdPlato ='{$Id}'";
    return $this->db->query($sql);
  }


}