<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 4:38 PM
 */
require_once "../modelo/EntidadBase.php";
class Salon extends EntidadBase
{
    private $clvSalon;
    private $nombreSalon;
    private $horarios;

    /**
     * Salon constructor.
     */
    public function __construct()
    {
        $horarios = array();
        $table = "Salon";
        parent:: __construct($table);
    }

    public function asignarDatos($arregloDatos)
    {
        $this->clvSalon = $arregloDatos['ClvSalon'];
        $this->nombreSalon = $arregloDatos['nombreSalon'];
    }

    /**
     * @return mixed
     */
    public function getClvSalon()
    {
        return $this->clvSalon;
    }

    /**
     * @param mixed $clvSalon
     */
    public function setClvSalon($clvSalon)
    {
        $this->clvSalon = $clvSalon;
    }

    /**
     * @return mixed
     */
    public function getNombreSalon()
    {
        return $this->nombreSalon;
    }

    /**
     * @param mixed $nombreSalon
     */
    public function setNombreSalon($nombreSalon)
    {
        $this->nombreSalon = $nombreSalon;
    }
    public function save()
    {
        $query = "INSERT INTO usuarios (clvSalon,nombreSalon)VALUES
          (
            '".$this->ClvSalon."''
            ".$this->nombreSalon."');";
        $save = $this->db()->query($query);
        return $save;
    }

    public function buscarIdSalon($salon){
        $idSalon = null;
        $datosSalon = null;
        try {
            $datosSalon = $this->getBy("nombreSalon", $salon);
            $encontrado = true;
        }catch(Exception $e){
            $encontrado = false;
        }
        if($encontrado){
            $idSalon = $datosSalon['ClvSalon'];
        }
        return $idSalon;
    }

    public function getHorariosBD($nombreSalon){
        $idSalon = $this->buscarIdSalon($nombreSalon);
        $query = "select clases.HoraInicio, clases.materia, clases.horafin 
                  from (salon inner join clases on salon.clvSalon = clases.clvSalon) 
                  where salon.ClvSalon = '$idSalon';";
        $resultSet = $this->runQuery($query);
        $horarios = $resultSet->fetchAll(PDO::FETCH_ASSOC);
        return $horarios;
    }

    public function getTodosHorarios(){
        $query = "select * from (salon join clases on Salon.ClvSalon = Clases.ClvSalon);";
        $resultSet = $this->runQuery($query);
        $horarios = $resultSet->fetchAll(PDO::FETCH_ASSOC);
        return $horarios;
    }

}