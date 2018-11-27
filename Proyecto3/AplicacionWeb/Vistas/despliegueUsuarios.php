<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/26/18
 * Time: 20:25
 */
require "../controlador/ControladorUsuarios.php";

$accion = null;

if(isset($_POST['action'])){
    $usuarios = array();
    $accion = $_POST['action'];
    $controlDespliegue = new ControladorUsuarios();
    $usuarios = $controlDespliegue->getTodosUsuarios();
    despliegueUser($usuarios);
}

if(isset($_POST['update'])){
    $row = stripcslashes($_POST['update']);
    $row = json_decode($row,TRUE);
    $controlUsuario = new ControladorUsuarios();
    $mensaje = $controlUsuario->editarUsuario($row);
    echo $mensaje;
}

function despliegueUser($usuarios){
    foreach ($usuarios as $user) {
        echo "<tr>";
        echo "<td id='id' >".$user['clvusuarios']."</td>";
        echo "<td class='nombre' >".$user['nombreusuario']."</td >";
        echo "<td class='pregunta' >".$user['pregunta']."</td >";
        echo "<td class='respuesta' >
                    <input type='text' name = 'Respuesta' value='".$user['respuesta']."' maxlength='15' required></td >";
        echo "<td class='estado' >
                    <input type='checkbox' name = 'Estado' ".verificarEstado($user['estado'])."></td >";
        echo "<td class='edit' id='save'>SAVE</td >";
        echo "</tr>";
    }
}

function verificarEstado($estado){
    if(strcmp($estado, '1')){
        return "checked";
    }
    else{
        return "";
    }
}