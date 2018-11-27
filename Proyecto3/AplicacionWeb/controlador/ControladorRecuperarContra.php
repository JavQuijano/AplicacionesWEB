<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/23/18
 * Time: 21:20
 */

require_once "../modelo/Pregunta.php";
class ControladorRecuperarContra
{
    private $pregunta;
    private $idUsuario;

    public function __construct($idUsuario)
    {
        $arregloDatos = null;
        $this->idUsuario = $idUsuario;
        try{
            $this->pregunta = new Pregunta($this->idUsuario);
            $arregloDatos = $this->pregunta->getBy("Usuarios_ClvUsuarios", $this->idUsuario);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        $this->pregunta->asignarDatos($arregloDatos);
    }

    /**
     * @return mixed
     */
    public function getPregunta()
    {
        return $this->pregunta;
    }

    public function verificarDatos(){
        $respuesta = $_POST['respuesta'];
        $contra = $_POST['contra'];
        $confcontra = $_POST['confcontra'];
        $correcto = $this->verificarRespuestaSecreta($respuesta);
        if($correcto != false){
            if($contra != $confcontra) {
                echo "<script type = text/javascript>alert('Contraseña no coincide.')</script>";
            }else{
                $this->cambiarContra($contra);
                header("Location: index.php");
            }
        }else{
            echo "<script type = text/javascript>alert('Respuesta secreta no coincide.')</script>";
        }
    }

    /**
     * @param $respuesta
     * @return boolean $return
     */
    private function verificarRespuestaSecreta($respuesta){
        $return = false;
        if(strcasecmp($respuesta ,$_POST['respuesta']) == 0){
            $return = true;
        }
        return $return;
    }

    private function cambiarContra($nuevaContra){
        $usuario= new Usuario();
        $arregloDatos = null;
        try{
            $arregloDatos = $usuario->getBy("ClvUsuarios", $this->idUsuario);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        $usuario->asignarDatos($arregloDatos);
        $usuario->cambiarContra($nuevaContra);
    }
}