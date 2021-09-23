<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Login controller
*/
class LoginController extends Controller
{
  private $model;

  private $session;

  public function __construct()
  {
    $this->model = new LoginModel();
    $this->session = new Session();
  }

  public function exec()
  {
    $this->render(__CLASS__);
  }

  public function signin($request_params)
  { 
    if($this->verify($request_params))
      return $this->renderErrorMessage('La cedula y password son obligatorios');

    $result = $this->model->signIn($request_params['cedula']);

    if(!$result->num_rows)
      return $this->renderErrorMessage("La cedula {$request_params['cedula']} no fue encontrada");

      //La variable result luego del fetch_object queda con los campos de la Base de Datos    
      $result = $result->fetch_object();

    if(!$request_params['password'] === $result->Password)
      return $this->renderErrorMessage('La contraseña es incorrecta');

    $this->session->init();
    $this->session->add('cedula', $result->CI);
    $this->session->add('nombre', $result->Nombre);
    $tipoUsuario = $this->model->getTipoUsuario($result->CI);
    if ($tipoUsuario == 'Cliente')
      header('location: /php-mvc-1/MainCliente');
  }

  private function verify($request_params)
  {
    return empty($request_params['cedula']) OR empty($request_params['password']);
  }

  private function renderErrorMessage($message)
  {
    $params = array('error_message' => $message);
    $this->render(__CLASS__, $params);
  }

}