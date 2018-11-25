<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/22/2018
 * Time: 9:54 PM
 */

class Conectar
{
    private $server_name;
    private $username;
    private $password;
    private static $instancia;

    private function __construct() {
        require_once "../config/database.php";
        $db_cfg = new database();
        $this->server_name= $db_cfg->getServerName();
        $this->username= $db_cfg->getUsername();
        $this->password= $db_cfg->getPassword();

    }
    public static function instancea() {
        if(!isset(self::$instancia))
        {
            self::$instancia = new Conectar();
        }
        return self::$instancia;

    }

    public function conexion(){

        $server_name = "localhost";
        $username = "root";
        $password = "root";

        $con= new PDO("mysql:host=$server_name;dbname=web_model", $username, $password);
        try
        {
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e -> getMessage();
        }
        return $con;
    }




}