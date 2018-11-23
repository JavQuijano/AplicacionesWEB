<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 10:09 PM
 */

class Permisos
{
    private $idPermisos;
    private $Agregar;
    private $Eliminar;
    private $Editar;

    /**
     * Permisos constructor.
     */
    public function __construct()
    {
        $table = "Permisos";
        parent::__construct($table);
    }


    /**
     * @return mixed
     */
    public function getIdPermisos()
    {
        return $this->idPermisos;
    }

    /**
     * @param mixed $idPermisos
     */
    public function setIdPermisos($idPermisos)
    {
        $this->idPermisos = $idPermisos;
    }

    /**
     * @return mixed
     */
    public function getAgregar()
    {
        return $this->Agregar;
    }

    /**
     * @param mixed $Agregar
     */
    public function setAgregar($Agregar)
    {
        $this->Agregar = $Agregar;
    }

    /**
     * @return mixed
     */
    public function getEliminar()
    {
        return $this->Eliminar;
    }

    /**
     * @param mixed $Eliminar
     */
    public function setEliminar($Eliminar)
    {
        $this->Eliminar = $Eliminar;
    }

    /**
     * @return mixed
     */
    public function getEditar()
    {
        return $this->Editar;
    }

    /**
     * @param mixed $Editar
     */
    public function setEditar($Editar)
    {
        $this->Editar = $Editar;
    }


}