<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/22/2018
 * Time: 9:37 PM
 */

class EntidadBase
{
    private $table;
    private static $db = null;
    private $conectar;

    public function __construct($table) {
        $this->table=(string) $table;

        require_once 'Conectar.php';
        $this->conectar= Conectar::instancea();
        if(self::$db==null)
        {
        self::$db =$this->conectar->conexion();
        }
    }

    public function getConetar(){
        return $this->conectar;
    }

    public function db(){
        return self::$db;
    }

    public function runQuery($query)
    {
        $resultado = self::$db->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $resultado->execute();
        return $resultado;
    }

    public function getAll()
    {
        $query=$this->runQuery("SELECT * FROM $this->table ORDER BY id DESC");

        return $resultSet= $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        try
        {
        $query=$this->runQuery("SELECT * FROM $this->table WHERE id=$id");
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

        return $resultSet= $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getBy($column,$value)
    {
        $query= null;
        try{
        $query=$this->runQuery("SELECT * FROM $this->table WHERE $column='$value'");}
        catch (Exception $e) {
            $e->getMessage();
        }
        return $resultSet= $query->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteById($id)
    {
        $query=$this->runQuery("DELETE FROM $this->table WHERE id=$id");
        return $query;
    }

    public function deleteBy($column,$value)
    {
        $query=$this->runQuery("DELETE FROM $this->table WHERE $column='$value'");
        return $query;
    }


    /*
     * Aquí podemos montarnos un montón de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */

}