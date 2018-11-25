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
    private $horarios;
    public function __construct($idSalon)
    {
        $this->horarios = array();
        $this->salon = new Salon();
        $this->horarios = $this->salon->getHorariosBD($idSalon);
    }

    public function getHorarios(){
        return $this->horarios;
    }
}