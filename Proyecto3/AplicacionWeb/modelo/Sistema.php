<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 9:55 PM
 */

class Sistema
{
    private $idSistemaHorarios;
    private $ModuloFavoritos;
    private $ModuloEdicion_idModuloEdicion;
    private $Roles_idRol;

    /**
     * Sistema constructor.
     */
    public function __construct()
    {
        $table= "Sistema";
        parent::__construct($table);
    }
    public function save()
    {
        $query = "INSERT INTO usuarios (idSistemaHorarios,ModuloFavoritos_idModuloFavoritos,ModuloEdicion_idModuloEdicion,
                  Roles_idRol)VALUES
          (
            '".$this->idSistemaHorarios."''
            ".$this->ModuloFavoritos."''
            ".$this->ModuloEdicion_idModuloEdicion."''
            ".$this->Roles_idRol."');";
        $save = $this->db()->query($query);
        return $save;
    }

    /**
     * @return mixed
     */
    public function getIdSistemaHorarios()
    {
        return $this->idSistemaHorarios;
    }

    /**
     * @param mixed $idSistemaHorarios
     */
    public function setIdSistemaHorarios($idSistemaHorarios)
    {
        $this->idSistemaHorarios = $idSistemaHorarios;
    }

    /**
     * @return mixed
     */
    public function getModuloFavoritos()
    {
        return $this->ModuloFavoritos;
    }

    /**
     * @param mixed $ModuloFavoritos
     */
    public function setModuloFavoritos($ModuloFavoritos)
    {
        $this->ModuloFavoritos = $ModuloFavoritos;
    }

    /**
     * @return mixed
     */
    public function getModuloEdicionIdModuloEdicion()
    {
        return $this->ModuloEdicion_idModuloEdicion;
    }

    /**
     * @param mixed $ModuloEdicion_idModuloEdicion
     */
    public function setModuloEdicionIdModuloEdicion($ModuloEdicion_idModuloEdicion)
    {
        $this->ModuloEdicion_idModuloEdicion = $ModuloEdicion_idModuloEdicion;
    }

    /**
     * @return mixed
     */
    public function getRolesIdRol()
    {
        return $this->Roles_idRol;
    }

    /**
     * @param mixed $Roles_idRol
     */
    public function setRolesIdRol($Roles_idRol)
    {
        $this->Roles_idRol = $Roles_idRol;
    }

}