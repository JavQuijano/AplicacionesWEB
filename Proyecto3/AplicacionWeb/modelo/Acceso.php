<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 4:46 PM
 */
require_once "../modelo/EntidadBase.php";
class Acceso extends EntidadBase
{
    private $idUsuario;
    private $ultimaConexion;
    private $intentos;

    /**
     * Acceso constructor.
     */
    public function __construct()
    {
        date_default_timezone_set('America/Mexico_City');
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

    public function asignarIntentos($idUsuario){
        $this->idUsuario = $idUsuario;
        $query = "Select intentos from acceso where Usuarios_ClvUsuarios = '$idUsuario';";
        $run = $this->runQuery($query);
        $resultSet = $run->fetch(PDO::FETCH_ASSOC);
        $int = (int)$resultSet['intentos'];
        $this->intentos = $int;
    }

    public function intentoFallido(){
        $this->intentos += 1;
        if($this->intentos < 3) {
            $query = "update acceso set intentos = '$this->intentos' where Usuarios_ClvUsuarios = '$this->idUsuario';";
            $run = $this->runQuery($query);
        }
    }

    public function reiniciarIntentos(){
        if($this->intentos != 0) {
            $query = "update acceso set intentos = 0 where Usuarios_ClvUsuarios = '$this->idUsuario';";
            $run = $this->runQuery($query);
        }
        $this->actualizarUltimaConn();
    }

    public function crearAcceso($idUsuario){
        $query="insert into acceso values(now(), 0, '$idUsuario')";
        $run = $this->runQuery($query);
    }

    public function actualizarUltimaconn(){
        $query = "update acceso set ultimaconeccion = now() where Usuarios_ClvUsuarios = '$this->idUsuario';";
        $run = $this->runQuery($query);
    }

}