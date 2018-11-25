<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/25/18
 * Time: 15:15
 */
require_once "../modelo/Clases.php";
class ControladorAdminHorarios
{
    private $clase;

    public function __construct()
    {
        $this->clase = new Clases();
    }

    public function editarHorario($data){
        $msg = $this->clase->updateHorario($data);
        return $msg;
    }
    public function eliminarHorario($data){
        $msg = $this->clase->deleteClase($data);
        return $msg;
    }

    /**
     *
     */
    public function agregarHorario(){
        $datosClase = array(
            'nombreSalon'=> $_POST['nombreSalon'],
            'materia' => $_POST['materia'],
            'horaInicio'=>$_POST['horaInicio'],
            'horaFin' =>$_POST['horaFin']
        );
        $validar = $this->clase->agregarClase($datosClase);
        if($validar){
            echo "<script type='text/javascript'>alert('Agregado Correctamente')</script>";
        }else {
            echo "<script type='text/javascript'>alert('Salon no existe')</script>";
        }
    }
}