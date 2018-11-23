<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 9:27 PM
 */

class Roles extends EntidadBase
{
    private $idRol;
    private $Admin;
    private $usuario;

    /**
     * Roles constructor.
     */
    public function __construct()
    {
        $table = "Roles";
        parent:: __contruct($table);
    }

    public function save()
    {
        $query = "INSERT INTO usuarios (idRol,Admin,Usuario)VALUES
          (
            '".$this->idRol."''
            ".$this->Admin."''
            ".$this->usuario."');";
        $save = $this->db()->query($query);
        return $save;
    }

    /**
     * @return mixed
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * @param mixed $idRol
     */
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }

    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->Admin;
    }

    /**
     * @param mixed $Admin
     */
    public function setAdmin($Admin)
    {
        $this->Admin = $Admin;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


}