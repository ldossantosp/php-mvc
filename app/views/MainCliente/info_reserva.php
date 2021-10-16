<?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '';

if($info_Reserva){
    echo "
    <table class=\"table\">
        <tr>
            <h3>
                <td>Fecha de la reserva</td> 
                <td><span class=\"label label-default\">{$info_Reserva['fecha']}</span></td>
            </h3>
        </tr>
        <tr>
            <h3>
                <td>Cantidad de Personas</td> 
                <td><span class=\"label label-default\">{$info_Reserva['cantPersonas']}</span></td>
            </h3>
        </tr>
        <tr>
            <h3>
                <td>Turno</td> 
                <td><span class=\"label label-default\">{$info_Reserva['turno']}</span></td>
            </h3>
        </tr>
        <tr>
            <h3>
                <td>Número de mesa</td> 
                <td><span class=\"label label-default\">{$info_Reserva['nroMesa']}</span></td>
            </h3>
        </tr>
    </table>
    ";
}
?>
 <a class="btn btn-primary" href="<?= FOLDER_PATH . '/MainCliente/MisReservas'?>" role="button">Ir a Mis Reservas</a>
 <a class="btn btn-default" href="<?= FOLDER_PATH . '/MainCliente'?>" role="button">Atras</a>