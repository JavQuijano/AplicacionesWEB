<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/26/18
 * Time: 20:29
 */
@session_start();
require_once "../modelo/Usuario.php";
require_once "../modelo/Pregunta.php";
require_once "../modelo/Modulo.php";
class ControladorUsuarios
{
    private $usuario;
    private $modulo;

    public function __construct()
    {
        $this->usuario = new Usuario();
        $this->modulo = new Modulo('Usuarios');
    }

    public function editarUsuario($data){
        $msg = $this->usuario->updateInfo($data);
        $this->modulo->insertarEnBitacora('Editar Usuario', 'Actualizacion info usuario:'.$data['ClvUsuarios'], $_SESSION['idUsuario']);
        return $msg;
    }

    public function getTodosUsuarios(){
        $data = array();
        $data = $this->usuario->getUsuariosBD();
        return $data;
    }


}