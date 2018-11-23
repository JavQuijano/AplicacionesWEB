<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/21/2018
 * Time: 3:53 PM
 */

class Usuario extends EntidadBase
{
        private $ClvUsuarios;
        private $nombreUsuario;
        private $contraseñaUsuario;
        private $sal;

        private $estado;
        private $idAcceso;

        private $favoritos;

        private $idPregunta1;
        private  $idPregunta2;

        private $respuesta1;
        private $respuesta2;

        public function _construct()
        {
            $table ="Usuarios";
            parent::__construct($table);

        }


    public function getClvUsuarios()
    {
        return $this->ClvUsuarios;
    }


    public function setClvUsuarios($ClvUsuarios)
    {
        $this->ClvUsuarios = $ClvUsuarios;
    }

    public function getContraseñaUsuario()
    {
        return $this->contraseñaUsuario;
    }


    public function setContraseñaUsuario($contraseñaUsuario)
    {
        $this->contraseñaUsuario = $contraseñaUsuario;
    }


    public function getSal()
    {
        return $this->sal;
    }


    public function setSal($sal)
    {
        $this->sal = $sal;
    }

    public function getEstado()
    {
        return $this->estado;
    }


    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getIdAcceso()
    {
        return $this->idAcceso;
    }

    public function setIdAcceso($idAcceso)
    {
        $this->idAcceso = $idAcceso;
    }


    public function getFavoritos()
    {
        return $this->favoritos;
    }

    public function setFavoritos($favoritos)
    {
        $this->favoritos = $favoritos;
    }


    public function getIdPregunta1()
    {
        return $this->idPregunta1;
    }


    public function setIdPregunta1($idPregunta1)
    {
        $this->idPregunta1 = $idPregunta1;
    }

    public function getIdPregunta2()
    {
        return $this->idPregunta2;
    }

    public function setIdPregunta2($idPregunta2)
    {
        $this->idPregunta2 = $idPregunta2;
    }


    public function getRespuesta1()
    {
        return $this->respuesta1;
    }


    public function setRespuesta1($respuesta1)
    {
        $this->respuesta1 = $respuesta1;
    }


    public function getRespuesta2()
    {
        return $this->respuesta2;
    }


    public function setRespuesta2($respuesta2)
    {
        $this->respuesta2 = $respuesta2;
    }

    public function save()
    {
        $query = "INSERT INTO usuarios (clvUsuario,nombreUsuario,constraseñaUsuario,sal,estado,Acceso_idAcceso,salonesFavoritos
          ,idPregunta1,idPregunta2,respuesta1,respuesta2)VALUES
          (
            '".$this->ClvUsuarios."''
            ".$this->nombreUsuario."''
            ".$this->contraseñaUsuario."''
            ".$this->sal."''
            ".$this->estado."''
            ".$this->idAcceso."''
            ".$this->idPregunta1."''
            ".$this->idPregunta2."''
            ".$this->respuesta1."''
            ".$this->respuesta2."');";
        $save = $this->db()->query($query);
        return $save;
    }
}