<?php
@session_start();
$ruta = $_SESSION['salones'];
$archivo = fopen($ruta, 'r+');
$text = fread($archivo, filesize($ruta));
fclose($archivo);
$arraySplitted = explode(PHP_EOL, $text);
foreach ($arraySplitted as $stringPart) {
    echo "<script type='text/javascript'>setPrefered('$stringPart')</script>";
}
