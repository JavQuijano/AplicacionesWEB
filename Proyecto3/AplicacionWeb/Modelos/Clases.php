<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 4:42 PM
 */

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
        parent :: __contruct($table);
    }
    public function save()
    {
        $query = "INSERT INTO usuarios (clvUsuario,nombreUsuario,constraseñaUsuario,sal,estado,Acceso_idAcceso,salonesFavoritos
          ,idPregunta1,idPregunta2,respuesta1,respuesta2)VALUES
          (
            '".$this->ClvSalon."''
            ".$this->horaInicio."''
            ".$this->materia."''
            ".$this->idClase."''
            ".$this->horaFin."');";
        $save = $this->db()->query($query);
        return $save;
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


}