<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 9:39 PM
 */

class Bitacora extends EntidadBase
{
    private $tarea;
    private $ip;
    private $FechaHora;
    private $detalles;
    private $Modulo_idModuloFavoritos;
    private $Usuarios_idUsuarios;

    /**
     * Bitacora constructor.
     */
    public function __construct()
    {
        $table = "Bitacora";
        parent:: __contruct($table);
    }

    /**
     * @return mixed
     */
    public function getTarea()
    {
        return $this->tarea;
    }

    /**
     * @param mixed $tarea
     */
    public function setTarea($tarea)
    {
        $this->tarea = $tarea;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getFechaHora()
    {
        return $this->FechaHora;
    }

    /**
     * @param mixed $FechaHora
     */
    public function setFechaHora($FechaHora)
    {
        $this->FechaHora = $FechaHora;
    }

    /**
     * @return mixed
     */
    public function getDetalles()
    {
        return $this->detalles;
    }

    /**
     * @param mixed $detalles
     */
    public function setDetalles($detalles)
    {
        $this->detalles = $detalles;
    }

    /**
     * @return mixed
     */
    public function getModuloIdModuloFavoritos()
    {
        return $this->Modulo_idModuloFavoritos;
    }

    /**
     * @param mixed $Modulo_idModuloFavoritos
     */
    public function setModuloIdModuloFavoritos($Modulo_idModuloFavoritos)
    {
        $this->Modulo_idModuloFavoritos = $Modulo_idModuloFavoritos;
    }

    /**
     * @return mixed
     */
    public function getUsuariosIdUsuarios()
    {
        return $this->Usuarios_idUsuarios;
    }

    /**
     * @param mixed $Usuarios_idUsuarios
     */
    public function setUsuariosIdUsuarios($Usuarios_idUsuarios)
    {
        $this->Usuarios_idUsuarios = $Usuarios_idUsuarios;
    }
    public function save()
    {
        $query = "INSERT INTO usuarios (tarea,ip,FechaHora,detalles,Modulo_idModuloFavoritos,Usuarios_idUsuarios)VALUES
          (
            '".$this->tarea."''
            ".$this->ip."''
            ".$this->FechaHora."''
            ".$this->detalles."''
            ".$this->Modulo_idModuloFavoritos."''
            ". $this->Usuarios_idUsuarios."');";
        $save = $this->db()->query($query);
        return $save;
    }
}