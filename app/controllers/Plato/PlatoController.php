<?php
header ('Content-type: text/html; charset=utf-8');
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Plato/PlatoModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Main controller
*/
class PlatoController extends Controller
{
  private $session;

  private $model;

  public function __construct()
  {
    $this->session = new Session();
    $this->session->init();
    if($this->session->getStatus() === 1 || empty($this->session->get('cedula')))
      exit('Acceso denegado');
    $this->model = new PlatoModel();
  }

  public function exec()
  {
    $this->PlatosList();
  }

  public function logout()
  {
    $this->session->close();
    header('location: /php-mvc-1/login');
  }

  public function form($message = '')
  {
    $params = array('cedula' => $this->session->get('cedula'),'show_form' => true, 'message' => $message);
    $this->render(__CLASS__, $params);
  }

  public function PlatosList($message = '', $message_type = 'success')
  {
    $platos = $this->model->PlatosList();

    $params = array('cedula' => $this->session->get('cedula'),'show_platos_list' => true, 'message_type' => $message_type, 'message' => $message, 'platos' => $platos);
    return $this->render(__CLASS__, $params);
  }

  public function PlatoList($Id)
  {
    $result = $this->model->PlatoList($Id);

    $info_plato = !$result->num_rows
    ? $info_plato = array()
    : $info_plato = $result->fetch_object();

    $params = array('cedula' => $this->session->get('cedula'), 'show_edit_form' => true, 'info_plato' => $info_plato);
    return $this->render(__CLASS__, $params);
  }

  //renderiza el formulario del plato con edición de fotos
  public function PlatoFotos($Id){

    $result = $this->model->PlatoList($Id);

    $info_plato = !$result->num_rows
    ? $info_plato = array()
    : $info_plato = $result->fetch_object();

    $resultFotos = $this->model->PlatoFotos($Id);

    $params = array('cedula' => $this->session->get('cedula'), 'show_edit_form_foto' => true, 'info_plato' => $info_plato, 'info_fotos' => $resultFotos);
    return $this->render(__CLASS__, $params);
  }

  public function addPlato($request_params)
  {
    if(!$this->verify($request_params))
      return $this->form('Son necesarios todos los campos');

    $result = $this->model->addPlato($request_params);

    if(!$result || !$this->model->affected_rows())
      return $this->form('Hubo un error al agregar el plato');
    
    return $this->PlatosList('Plato dado de alta');
  }

  private function verify($request_params)
  {
    foreach ($request_params as $param)
      if(empty($param)) return false;

    return true;
  }

  public function removePlato($id)
  {
    if(empty($id))
      return $this->PlatosList('No se recibió el ID del Plato', 'warning');

    if(!is_numeric($id))
      return $this->PlatosList('El ID del Plato debe ser numérico', 'warning');

    $result = $this->model->removePlato($id);

    if(!$result || !$this->model->affected_rows())
      return $this->PlatosList("Hubo un error al remover el Plato número {$id}", 'warning');

    $this->PlatosList("Plato número {$id} removido");
  }

  public function addImagenPlato($request_params)
  {
    
    $this->model->addImagenPlato($request_params['Imagen'], $request_params['IdPlato']);
    $this->PlatoFotos($request_params['IdPlato']);
  }

  //recibe dos parametros por URI: idPlato, nombre Foto a eliminar
  public function removeFotoPlato($request_params)
  {
    $params = str_replace("%20", " ", $request_params);
    $params = str_replace("%C3%B1", "ñ", $params);
    $params = str_replace("%C3%91", "ñ", $params);
    //separo los parametros que estaban divididos por "&"
    $params = explode('&', $params);
    $idPlato = $params[0];
    $Foto = $params[1];

    $this->model->removeFotoPlato($idPlato, $Foto);
    
    $this->PlatoFotos($idPlato);
  }

  public function updatePlato($request_params)
  {
    if(!$this->verify($request_params))
      return $this->PlatosList('Son necesarios todos los campos para editar', 'warning');

    if(!is_numeric($request_params['id']))
      return $this->PlatosList('El ID del Plato debe ser numérico para editar', 'warning');

    $result = $this->model->updatePlato($request_params);

    if(!$result || !$this->model->affected_rows())
      return $this->PlatosList("Hubo un error al editar el Plato número {$request_params['id']} o no hubieron cambios en los campos" , 'warning');

    $this->PlatosList("Plato número {$request_params['id']} actualizado");
  }

}
