<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 9:46 PM
 */

class Modulo
{
    private $idModuloFavoritos;
    private $Permisos_idPermisos;

    /**
     * Modulo constructor.
     */
    public function __construct()
    {
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

    /**
     * @return mixed
     */
    public function getIdModuloFavoritos()
    {
        return $this->idModuloFavoritos;
    }

    /**
     * @param mixed $idModuloFavoritos
     */
    public function setIdModuloFavoritos($idModuloFavoritos)
    {
        $this->idModuloFavoritos = $idModuloFavoritos;
    }

    /**
     * @return mixed
     */
    public function getPermisosIdPermisos()
    {
        return $this->Permisos_idPermisos;
    }

    /**
     * @param mixed $Permisos_idPermisos
     */
    public function setPermisosIdPermisos($Permisos_idPermisos)
    {
        $this->Permisos_idPermisos = $Permisos_idPermisos;
    }

}