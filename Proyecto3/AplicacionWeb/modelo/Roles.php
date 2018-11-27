<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 9:27 PM
 */
require_once "../modelo/EntidadBase.php";
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
        parent::__construct($table);
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
    public function tablaRoles()
    {
        $query = "SELECT * FROM roles;";
        $PDO = $this->runQuery($query);
        return $PDO->fetchAll();
    }
    public function hacerEliminar($idRol)
    {
        try {
            $query = "INSERT INTO permisos_has_roles VALUES ('2','$idRol');";
            $this->runQuery($query);
        }
        catch(Exception $e)
        {
            echo  $e->getMessage();
        }

    }
    public function hacerAgregar($idRol)
    {
        try{
            $query = "INSERT INTO permisos_has_roles VALUES ('1','$idRol');";
            $this->runQuery($query);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function hacerEditar($idRol)
    {
        try{
            $query = "INSERT INTO permisos_has_roles VALUES ('3','$idRol');";
            $this->runQuery($query);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function quitarEliminar($idRol)
    {
        try {
            $query = "DELETE FROM permisos_has_roles WHERE Roles_idRol ='$idRol' AND Permisos_idPermisos = ' 2 ';";
            $this->runQuery($query);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function quitarAgregar($idRol)
    {
        try{
            $query = "DELETE FROM permisos_has_roles WHERE Roles_idRol ='$idRol' AND  Permisos_idPermisos = ' 1 ';";
            $this->runQuery($query);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function quitarEditar($idRol)
    {
        try{
            $query = "DELETE FROM permisos_has_roles WHERE Roles_idRol ='$idRol' AND  Permisos_idPermisos = ' 3 ';";
            $this->runQuery($query);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function esAgregar($idRol)
    {
        $esAgregar = false;
        $query = "SELECT * FROM permisos_has_roles 
        WHERE Roles_idRol = '$idRol';";
        $pdo = $this->runQuery($query);
        $tabla = $pdo->fetchAll();
        foreach ($tabla as $per)
        {
            if(strcmp($per['Permisos_idPermisos'],"1")==0)
            {
                $esAgregar= true;
                break;
            }
        }
        return $esAgregar;
    }

    public function esEliminar($idRol)
    {
        $esEliminar = false;
        $query = "SELECT * FROM permisos_has_roles 
        WHERE Roles_idRol = '$idRol';";
        $pdo = $this->runQuery($query);
        $tabla = $pdo->fetchAll();
        foreach ($tabla as $per)
        {
            if(strcmp($per['Permisos_idPermisos'],"2")==0)
            {
                $esEliminar= true;
                break;
            }
        }
        return $esEliminar;
    }

    public function esEditar($idRol)
    {
        $esEditar = false;
        $query = "SELECT * FROM permisos_has_roles 
        WHERE Roles_idRol = '$idRol';";
        $pdo = $this->runQuery($query);
        $tabla = $pdo->fetchAll();
        foreach ($tabla as $per)
        {
            if(strcmp($per['Permisos_idPermisos'],"3")==0)
            {
                $esEditar= true;
                break;
            }
        }
        return $esEditar;
    }

}