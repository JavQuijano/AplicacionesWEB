<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 4:38 PM
 */

class Salon extends EntidadBase
{
    private $clvSalon;
    private $nombreSalon;

    /**
     * Salon constructor.
     */
    public function __construct()
    {
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

}