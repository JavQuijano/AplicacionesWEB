<?php
require "../PHPConfig/bitacoraPHP.php";
@session_start();
$usuario = $_SESSION['mat'];

if(isset($_POST['Agregar']))
{
    $salonSeleccionado = $_POST["comboBoxSalones"];
    agregarSalonFavorito($salonSeleccionado, $usuario);
}

function agregarSalonFavorito($salon,$usuario)
{

    if(!empty($salon) && !verificarNoRepetido($salon,$usuario))
    {
        $nombreArchivo = "../usuarios/".$usuario.".txt";
        $archivo = fopen($nombreArchivo,"a+");
        fwrite($archivo,$salon.PHP_EOL);
        fclose($archivo);
    }
    bitacora("Usuario: ".$usuario." agrego Salon: ".$salon." a favoritos", "Alta");
}


function verificarNoRepetido($salon, $usuario)
{
    $seRepite = false;
    $nombreArchivo = "../usuarios/" . $usuario . ".txt";
    $archivo = fopen($nombreArchivo, "r");
    if (!empty($archivo)) {
        while (!feof($archivo)) {
            $linea = fgets($archivo);
            $lineaNueva = trim($linea);
            if (strcmp($lineaNueva, $salon) == 0 && $lineaNueva != "") {
                $seRepite = true;
            }
        }
    }
    return $seRepite;
}