<?php
require "bitacoraPHP.php";
session_start();
function iniciarTextField()
{
    if(isset($_POST['salonACambiar']))
    {
        return leerArchivo($_POST['salonACambiar']);
    }
}
function leerArchivo($salonSeleccionado)
{
    $archivo =fopen("./Salones/".$salonSeleccionado.".php","r+");
    if(!empty($archivo))
    {
        $linea ="";
        while(!feof($archivo))
        {
            $linea = $linea.fgets($archivo);
        }
        fclose($archivo);
    }
    else
    {
        $linea="";
    }

    return $linea;
}
function escribirEnArchivo($salon,$contenido)
{
    $archivo =fopen("./Salones/".$salon.".php","w+");
    if(!empty($archivo))
    {
        fwrite($archivo,$contenido);
        fclose($archivo);
    }
    bitacora("Usuario realizo cambio en salon: ".$salon, "Cambio");
}
if(isset($_POST['cambiarSalon']))
{
    $_SESSION['salon']=$_POST['salonACambiar'];
    leerArchivo($_SESSION['salon']);
}
if(isset($_POST['cambiarHorario']))
{
    escribirEnArchivo($_SESSION['salon'],$_POST['texto']);
}