<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/25/18
 * Time: 18:51
 */

require_once "../modelo/Bitacora.php";
class ControladorBitacora
{
    private $bitacora;

    public function __construct()
    {
        $this->bitacora = new Bitacora();
    }

    public function getBitacora(){
        return $this->bitacora->getBitacora();
    }

    public function insertarEnBitacora($idUsuario, $idModulo, $detalles, $tarea){
        $this->bitacora->agregarEntrada($idUsuario, $idModulo, $detalles, $tarea);
    }
}