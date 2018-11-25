<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11/24/2018
 * Time: 6:19 PM
 */
require_once "../modelo/Usuario.php";

class ControladorPrincipal
{
    private $usuario;

    /**
     * ControladorPrincipal constructor.
     * @param $usuario
     */
    public function __construct($usuario)
    {
        $this->usuario = $usuario;
        $this->usuario->iniciarFavoritos();
    }
    public function colorearFavoritos()
    {
        foreach ($this->usuario->getNombreFavoritos() as $stringPart)
        {
            echo "se coloreo :". $stringPart;
        echo "<script type='text/javascript'>setPrefered('$stringPart')</script>";
        }
    }
}