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
        $this->InfoPlatoFotos();
    }

    public function InfoPlatoFotos()
    {
        $result = $this->model->listarInfoPlatos();
        $contador = 0;
        while($row = $result->fetch_assoc())
        {
            $info_plato[$contador][1] = $row['Id'];
            $info_plato[$contador][2] = $row['Nombre'];
            $info_plato[$contador][3] = $row['Descripcion'];
            $fotos = $this->model->ListarFotosPlato($row['Id']);
            $info_plato[$contador][4] = $fotos;
            $contador++;
        }
        $params = array('info_plato' => $info_plato, 'nombre'=>$this->session->get('nombre'), 'show_menuPlatos' => true);
        $this->render(__CLASS__, $params);
    }

    public function reserva()
    {
        $params = array('show_reserva'=> true, 'nombre'=>$this->session->get('nombre'));
        $this->render(__CLASS__, $params);
    }

    public function RealizarReserva($request_params)
    {
        $result = $this->model->obtenerMesasDisponibles($request_params);

        if(!$result || !$this->model->affected_rows()){
            $this->showReservaMessage('No hay mesas disponibles para la fecha y cantidad de personas indicadas', 'danger');
        }
        else{
            $row = $result->fetch_assoc();
            $nroMesa = $row['Nro'];
            $result = $this->model->RealizarReserva($request_params, $nroMesa, $this->session->get('cedula'));
            if(!$result || !$this->model->affected_rows()){
                $this->showReservaMessage('Hubo un error al realizar la reserva o ya fue realizada. Chekea en "mis reservas"', 'danger');
            }
            else{
                $fecha = $request_params['fechaReserva'];
                $cantPersonas = $request_params['cantidad'];
                $turno = $request_params['turno'];
                $info_Reserva = array('fecha'=>$fecha, 'cantPersonas'=>$cantPersonas, 'turno'=>$turno, 'nroMesa'=>$nroMesa);
                $this->showReservaMessage('La reserva fue realizada de forma exitosa', 'success', $info_Reserva);
            }
        }
    }

    public function showReservaMessage($message = '', $message_type, $info_Reserva = '')
    {
        $params = array("message"=>$message, "message_type" => $message_type, 'show_info_reserva'=> true, 'info_Reserva'=>$info_Reserva, 'nombre'=>$this->session->get('nombre'));
        return $this->render(__CLASS__, $params);
    }

    public function MisReservas(){
        $reservas = $this->model->MisReservas($this->session->get('cedula'));

    }

    //**************Funciones viejas **************************************/
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