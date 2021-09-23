<?php

class MainClienteModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function PlatosList()
    {
        $sql = 'SELECT * FROM Plato, PlatoFoto WHERE Id=IdPlato';
        return $this->db->query($sql);
    }

    public function ListFotosPlato($request_param)
    {
        $sql = "SELECT Foto FROM PlatoFoto where IdPLato = {$request_param}";
        return $this->db->query($sql);

    }

}