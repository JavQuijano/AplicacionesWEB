<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 11/25/18
 * Time: 18:48
 */

require_once "../controlador/ControladorBitacora.php";
if(isset($_POST['action'])){
    $bitacora = array();
    $controlDespliegue = new ControladorBitacora();
    $bitacora = $controlDespliegue->getBitacora();
    despliegueBitacora($bitacora);
}

function despliegueBitacora($bitacora){
    foreach ($bitacora as $bita){
        echo "<tr>";
        echo "<td>".$bita['nombreUsuario']."</td >";
            echo "<td>".$bita['tarea']."</td>";
            echo "<td>".$bita['ip']."</td >";
            echo "<td>".$bita['fechahora']."</td >";
            echo "<td>".$bita['nomModulo']."</td >";
            echo "<td>".$bita['detalles']."</td >";
        echo "</tr>";
    }
}