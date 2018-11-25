<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 4:42 PM
 */

require_once "../modelo/EntidadBase.php";
class Clases extends EntidadBase
{
    private $clvSalon;
    private $horaInicio;
    private $materia;
    private $idClase;
    private $horaFin;

    /**
     * Clases constructor.
     */
    public function __construct()
    {
        $table = "Clases";
        parent:: __construct($table);
    }

    public function updateHorario($data)
    {
        $horaInicio = $data['HoraInicio'];
        $horaFin = $data['HoraFin'];
        $clvSalon = $data['ClvSalon'];
        $materia = $data['Materia'];

        $msg = null;
        try {
            $query = "UPDATE Clases SET
        HoraInicio = '$horaInicio',
        HoraFin = '$horaFin'
        WHERE ClvSalon = '$clvSalon' AND Materia = '$materia'";
            $result = $this->runQuery($query);
            $msg = "Update Correcto";
        }catch(Exception  $e){
            $msg = $e->getMessage();
        }
        return $msg;
    }

    public function deleteClase($data){
        $clvSalon = $data['ClvSalon'];
        $materia = $data['Materia'];

        try {
            $query = "delete from clases where ClvSalon = '$clvSalon' and Materia = '$materia'";
            $result = $this->runQuery($query);
            $msg = "Delete Correcto";
        }catch(Exception  $e){
            $msg = $e->getMessage();
        }
        return $msg;
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
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * @param mixed $horaInicio
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }

    /**
     * @return mixed
     */
    public function getMateria()
    {
        return $this->materia;
    }

    /**
     * @param mixed $materia
     */
    public function setMateria($materia)
    {
        $this->materia = $materia;
    }

    /**
     * @return mixed
     */
    public function getIdClase()
    {
        return $this->idClase;
    }

    /**
     * @param mixed $idClase
     */
    public function setIdClase($idClase)
    {
        $this->idClase = $idClase;
    }

    /**
     * @return mixed
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * @param mixed $horaFin
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;
    }

    public function agregarClase($data)
    {
        $horaInicio = $data['horaInicio'];
        $horaFin = $data['horaFin'];
        $nombreSalon = $data['nombreSalon'];
        $materia = $data['materia'];
        $array = $this->buscarIdSalon($nombreSalon);
        if($array != false){
            $clvSalon = $array['ClvSalon'];
            $query = "Insert into clases values ('$clvSalon', '$horaInicio', '$materia', '$horaFin')";
            $resultSet = $this->runQuery($query);
            var_dump($resultSet);
            return true;
        }
        return false;
    }

    private function buscarIdSalon($nombreSalon){
        try {
            $query = "SELECT ClvSalon from Salon WHERE nombreSalon = '$nombreSalon'";
            $resultSet = $this->runQuery($query);
            return $resultSet->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $msg = false;
            return $msg;
        }
    }

}