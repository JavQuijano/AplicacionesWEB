<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/25/18
 * Time: 00:16
 */
require_once "../modelo/Salon.php";
class ControladorDesplegarHorario
{
    private $salon;
    private $horariosUnSalon;
    private $todosHorarios;

    public function __construct()
    {
        $this->horariosUnSalon = array();
        $this->salon = new Salon();
        $this->todosHorarios = array();
    }

    public function getHorariosUnSalon($idSalon){
        $this->horariosUnSalon = $this->salon->getHorariosBD($idSalon);
        return $this->horariosUnSalon;
    }

    public function getTodosHorarios(){
        $this->todosHorarios = $this->salon->getTodosHorarios();
        return $this->todosHorarios;
    }

}