<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . FOLDER_PATH .'/app/models/Home/HomeModel.php';
require_once LIBS_ROUTE .'Session.php';
/**
 * Home controller
 */
class HomeController extends Controller
{
  /**
   * string 
   */
  public $nombre;

  /**
   * object 
   */
  public $model;

  /**
   * Inicializa valores 
   */
  public function __construct()
  {
    $this->model = new HomeModel();
    $this->nombre = 'Mundo';
  }

  /**
  * Método estándar
  */
  public function exec()
  {
    $this->InfoPlatoFotos();
  }

  /**
  * Método de ejemplo
  */
  public function show()
  {
    $params = array('nombre' => $this->nombre);
    $this->render(__CLASS__, $params); 
  }

  /**
  * Método de ejemplo con model. Obtiene un usuario segun ID
  */
  public function usuario($param)
  {
    $res = $this->model->getUser($param);
    $this->nombre = $res['usuario_dev'];
    $this->show();
  }

  public function InfoPlatoFotos()
  {
    $res = $this->model->listarInfoPlatos();
    $contador = 0;
    while ($row = $res->fetch_assoc())
    {
      $fotos = $this->model->ListarFotosPlato($row['Id']);
      //$info_plato["{$row['Id']}"] = $fotos;
      $info_plato[$contador] [1]= $row['Id'];
      $info_plato[$contador] [2]= $row['Nombre'];
      $info_plato[$contador] [3]= $row['Descripcion'];
      $info_plato[$contador] [4]= $fotos;
      $contador++;
    }

    $params = array('info_plato' => $info_plato);
    $this->render(__CLASS__, $params); 
  }

}