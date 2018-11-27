<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/24/2018
 * Time: 3:05 PM
 */
require_once "../modelo/Usuario.php";
class ControladorHeader
{
    private $usuario;
    private $rol;
    private $boton;

    /**
     * ControladorPrincipal constructor.
     */
    public function __construct($idUsuario)
    {
        if($idUsuario==null)
        {
            header("Location: index.php");
        }
        $this->usuario = new Usuario();
        $tablaDatos = $this->usuario->getBy("ClvUsuarios",$idUsuario);
        $this->usuario->asignarDatos($tablaDatos);
        echo "<meta http-equiv=\"refresh\" content=\"900;url=logout.php\" />";
    }


    public function escribirBoton()
    {
        $rol = $this->usuario->encontrarRol();
        $textoBoton = null;
        $direccion = null;
        if(strcmp($rol,"admin")==0)
        {
           $textoBoton = "Panel Administrador";
           $direccion = "./configAdmin.php";

        }
        else
            {
                $textoBoton= "Salones Favoritos";
                $direccion= "./configUsuario.php";
            }
            $this->boton= array();
            $this->boton['textoBoton']= $textoBoton;
            $this->boton['direccion']= $direccion;
    }
    public function obtenerTextoBoton()
    {
        return $this->boton['textoBoton'];
    }
    public function obtenerDireccion()
    {
        return $this->boton['direccion'];
    }
    public function cerrarSesion()
    {
        @session_destroy();
        header("Location: ./index.php");
    }
    /**
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

}