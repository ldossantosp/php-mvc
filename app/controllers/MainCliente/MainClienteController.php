<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/MainCliente/MainClienteModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Main Cliente controller
*/
class MainClienteController extends Controller
{
    private $session;

    private $model;

    public function __construct()
    {
        $this->session = new Session();
        $this->session->init();
        if($this->session->getStatus() === 1 || empty($this->session->get('cedula')))
        exit('Acceso denegado');
        $this->model = new MainClienteModel();
    }

    public function exec()
    {
        $this->platosList(); //hacer esta función
    }

    public function logout()
    {
        $this->session->close();
        header('location: /php-mvc-1/Login');
    }

    public function platosList($message = '', $message_type = 'success')
    {
        $platos = $this->model->PlatosList();
        $params = array('nombre' => $this->session->get('nombre'),'show_platos_list' => true, 'message_type' => $message_type, 'message' => $message, 'platos' => $platos);
        return $this->render(__CLASS__, $params);
    }

    public function platoFotosList($request_param)
    {
        $fotos = $this->model->ListFotosPlato($request_param);
        $params = array('nombre' => $this->session->get('nombre'),'show_plato_fotos' => true, 'fotos' => $fotos);
        return $this->render(__CLASS__, $params);
    }
}