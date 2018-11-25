<?php

require "../modelo/Usuario.php";
class ControladorRoles
{
    private $usuarios;
    private $modeloUsuarios;
    /**
     * ControladorRoles constructor.
     */
    public function __construct()
    {
        $this->modeloUsuarios = new Usuario();
        $this->usuarios = $this->modeloUsuarios->tablaUsuarios();
    }


    public function pintarLineas()
    {
        foreach($this->usuarios as $usuarioTemporal)
        {
            echo "<tr>
                        <td>".$usuarioTemporal['nombreUsuario']."</td>
                        <td>
                          <input type=\"checkbox\" id='regular' name=\"checkFav[]\" value=\"Permiso1\" ".$this->esAdmin($usuarioTemporal['ClvUsuarios'])."/>
                        </td>
                        <td>
                          <input type=\"checkbox\" id='regular' name=\"checkFav[]\" value=\"Permiso2\" ".$this->esUser($usuarioTemporal['ClvUsuarios'])."/>
                        </td>
                      </tr>";
        }
    }
    public function esAdmin($clvUsuario)
    {
        $texto= "unchecked";
        if($this->modeloUsuarios->esAdmin($clvUsuario))
        {
            $texto="checked";
        }
        return $texto;
    }
    public function esUser($clvUsuario)
    {
        $texto= "unchecked";
        if($this->modeloUsuarios->esUser($clvUsuario))
        {
            $texto="checked";
        }
        return $texto;
    }
}