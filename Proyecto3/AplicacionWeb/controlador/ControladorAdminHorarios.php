<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/25/18
 * Time: 15:15
 */
@session_start();
require_once "../modelo/Clases.php";
require_once "../modelo/Modulo.php";
class ControladorAdminHorarios
{
    private $clase;
    private $modulo;
    private $usuario;

    public function __construct()
    {
        $this->usuario = $_SESSION['idUsuario'];
        $this->clase = new Clases();
        $this->modulo = new Modulo('Horarios');
    }

    public function editarHorario($data){
        $msg = $this->clase->updateHorario($data);
        $this->modulo->insertarEnBitacora('Editar Horario', 'Se edito Horario', $this->usuario);
        return $msg;
    }
    public function eliminarHorario($data){
        $msg = $this->clase->deleteClase($data);
        $this->modulo->insertarEnBitacora('Eliminar Horario', 'Se elimino Horario', $this->usuario);
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
            $this->modulo->insertarEnBitacora('Agrego Horario', 'Se agrego Horario', $this->usuario);
        }else {
            echo "<script type='text/javascript'>alert('Salon no existe')</script>";
        }
    }
}