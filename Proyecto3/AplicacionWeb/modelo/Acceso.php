<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 4:46 PM
 */

class Acceso extends EntidadBase
{
    private $idAcceso;
    private $ultimaConexion;
    private $intentos;

    /**
     * Acceso constructor.
     */
    public function __construct()
    {
        $table = "Acceso";
        parent::__construct($table);
    }

    public function save()
    {
        $query = "INSERT INTO usuarios (clvUsuario,nombreUsuario,constraseñaUsuario,sal,estado,Acceso_idAcceso,salonesFavoritos
          ,idPregunta1,idPregunta2,respuesta1,respuesta2)VALUES
          (
            '".$this->idAcceso."''
            ".$this->ultimaConexion."''
            ".$this->intentos."');";
        $save = $this->db()->query($query);
        return $save;
    }

    /**
     * @return mixed
     */
    public function getIdAcceso()
    {
        return $this->idAcceso;
    }

    /**
     * @param mixed $idAcceso
     */
    public function setIdAcceso($idAcceso)
    {
        $this->idAcceso = $idAcceso;
    }

    /**
     * @return mixed
     */
    public function getUltimaConexion()
    {
        return $this->ultimaConexion;
    }

    /**
     * @param mixed $ultimaConexion
     */
    public function setUltimaConexion($ultimaConexion)
    {
        $this->ultimaConexion = $ultimaConexion;
    }

    /**
     * @return mixed
     */
    public function getIntentos()
    {
        return $this->intentos;
    }

    /**
     * @param mixed $intentos
     */
    public function setIntentos($intentos)
    {
        $this->intentos = $intentos;
    }

}