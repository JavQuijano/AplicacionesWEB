<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 9:46 PM
 */
require_once "../controlador/ControladorBitacora.php";
require_once "../modelo/EntidadBase.php";
class Modulo extends EntidadBase
{
    private $idModulo;
    private $nomModulo;
    private $bitacora;

    /**
     * Modulo constructor.
     */
    public function __construct($nombreModulo)
    {
        $this->bitacora = new Bitacora();
        $this->nomModulo = $nombreModulo;
        $this->idModulo = $this->idModuloBD();
        $table = "Modulo";
        parent::__construct($table);
    }
    public function save()
    {
        $query = "INSERT INTO usuarios (idModuloFavoritos,Permisos_idPermisos)VALUES
          (
            '".$this->idModuloFavoritos."''
            ".$this->Permisos_idPermisos."');";
        $save = $this->db()->query($query);
        return $save;
    }

    public function insertarEnBitacora($tarea, $detalles, $idUsuario){
        $this->bitacora->agregarEntrada($idUsuario,$this->idModulo, $detalles, $tarea);
    }

    public function idModuloBD(){
        $query = "select idModulo from Modulo where nomModulo = '$this->nomModulo';";
        $run = $this->runQuery($query);
        $resultset = $run->fetch();
        return $resultset['idModulo'];
    }

}