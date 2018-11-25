<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/25/18
 * Time: 13:27
 */
require "../controlador/ControladorDesplegarHorario.php";
require "../controlador/ControladorAdminHorarios.php";

$accion = null;

if(isset($_POST['action'])){
    $horarios = array();
    $accion = $_POST['action'];
    $controlDespliegue = new ControladorDesplegarHorario();
    $horarios = $controlDespliegue->getTodosHorarios();
    despliegueAdmin($horarios);
}

if(isset($_POST['update'])){
    $row = stripcslashes($_POST['update']);
    $row = json_decode($row,TRUE);
    $controlAdmin = new ControladorAdminHorarios();
    $mensaje = $controlAdmin->editarHorario($row);
    echo $mensaje;
}

if(isset($_POST['delete'])){
    $row = stripcslashes($_POST['delete']);
    $row = json_decode($row,TRUE);
    $controlAdmin = new ControladorAdminHorarios();
    $mensaje = $controlAdmin->eliminarHorario($row);
    echo $mensaje;
}


function despliegueAdmin($horarios){
    foreach ($horarios as $hora) {
        echo "<tr>";
            echo "<td id='id' >".$hora['ClvSalon']."</td>";
            echo "<td class='salon' >".$hora['nombreSalon']."</td >";
            echo "<td class='materia' >".$hora['Materia']."</td >";
            echo "<td class='horainicio' >
                    <input type='text' name = 'horainicio' value=".$hora['HoraInicio']." maxlength='5' required></td >";
            echo "<td class='horafin' >
                    <input type='text' name = 'horafin' value=".$hora['HoraFin']." maxlength='5' required></td >";
            echo "<td class='edit' id='save'>SAVE</td >";
            echo "<td class='trash' id='delete'>DELETE</td >";
        echo "</tr>";
    }
}