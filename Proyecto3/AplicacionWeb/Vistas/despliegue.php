<?php
require "../controlador/ControladorDesplegarHorario.php";
$idSalon = null;
if(isset($_POST['action'])){
    $horarios = array();
    $idSalon = $_POST['action'];
    $control = new ControladorDesplegarHorario($idSalon);
    $horarios = $control->getHorarios();
}
echo "<head><link rel='stylesheet' href='./Estilos/est_salones.css' type='text/css'/></head>";
echo "<ul>Salon $idSalon";
echo "<ul>";
foreach ($horarios as $hora)
{
    echo "<li>".$hora['materia']."-". $hora['HoraInicio'].":".$hora['horafin']." </li>";
}
echo "</ul>";
echo "</ul>";