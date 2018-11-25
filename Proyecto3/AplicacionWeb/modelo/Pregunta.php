<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/23/18
 * Time: 20:24
 */

require_once "../modelo/EntidadBase.php";
require_once "../modelo/Usuario.php";
class Pregunta extends EntidadBase
{
    private $pregunta;
    private $respuesta;
    private $idUsuario;

    public function __construct($idUsuario)
    {
        $usuario= new Usuario();
        $datosUsuario = null;
        try {
            $datosUsuario = $usuario->getBy("ClvUsuarios",$idUsuario);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        $this->idUsuario = $datosUsuario['ClvUsuarios'];
        $table = "PreguntasSeguridad";
        parent::__construct($table);
    }

    public function asignarDatos($arregloDatos){
        $this->pregunta = $arregloDatos['Pregunta'];
        $this->respuesta = $arregloDatos['Respuesta'];
    }

    /**
     * @return mixed
     */
    public function getPregunta()
    {
        return $this->pregunta;
    }

    /**
     * @param mixed $pregunta
     */
    public function setPregunta($pregunta)
    {
        $this->pregunta = $pregunta;
    }

    /**
     * @return mixed
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * @param mixed $respuesta
     */
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function save()
    {
        $query = "INSERT INTO PregutasSeguridad VALUES
          (
            '$this->pregunta',
            '$this->respuesta',
            '$this->idUsuario');";
        $save = null;
        try {
            $save = $this->runQuery($query);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        return $save;
    }


}