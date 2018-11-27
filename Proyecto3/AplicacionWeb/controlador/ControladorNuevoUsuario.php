<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/23/2018
 * Time: 6:37 PM
 */

require "../modelo/Usuario.php";
require "../modelo/Pregunta.php";
require "../modelo/Acceso.php";
class ControladorNuevoUsuario
{
    private $usuario;
    private $pregunta;
    private $acceso;


    /**
     * ControladorNuevoUsuario constructor.
     */
    public function __construct()
    {
        $this->usuario = new Usuario();
        $this->acceso = new Acceso();
    }

    public function crearUsuario()
    {
        if(!$this->existeUsuario($_POST["nombreUsuario"]))
        {

            if($_POST['contra']==$_POST['confcontra'])
            {
                $this->usuario->setNombreUsuario($_POST['nombreUsuario']);
                $this->usuario->encriptarContra($_POST['contra']);
                $this->usuario->setEstado(1);
                $this->usuario->setIdPregunta($_POST['seleccion']);
                $this->usuario->save();
                $arrayDatos = $this->usuario->getBy("nombreUsuario",$this->usuario->getNombreUsuario());
                $this->usuario->asignarDatos($arrayDatos);
                $this->usuario->asignarRol(2);
                $this->pregunta = new Pregunta($this->usuario->getClvUsuarios());
                $this->pregunta->setPregunta($_POST['seleccion']);
                $this->pregunta->setRespuesta($_POST['respuesta']);
                $this->pregunta->save();
                $this->acceso->crearAcceso($this->usuario->getClvUsuarios());
            }
            else
                {
                    echo "<script type='text/javascript'>alert('Contraseñas no coinciden')</script>";
                }
        }
        else
            {
                echo "<script type='text/javascript'>alert('Usuario ya Existe')</script>";
            }
    }
    private function existeUsuario($usuario)
    {
        $existe = false;

        if($this->usuario->getBy("nombreUsuario",$usuario)!=null)
        {
            $existe= true;
        }
        return $existe;
    }


}