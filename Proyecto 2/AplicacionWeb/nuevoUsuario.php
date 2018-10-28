<?php
session_start();
session_destroy();
require_once "./PHPLogin/newUserTests.php";
if(isset($_POST['submit'])) {
    $_SESSION['mat'] = $_POST['matricula'];
    $_SESSION['contra'] = $_POST['contra'];
    $_SESSION['confcontra'] = $_POST['confcontra'];
    verificarInfo();
}
?>

<html>
<body>
<form method="post" action="">
    <label>Matricula: </label>
    <input type="text" name="matricula" placeholder="A********" required>
    <br>
    <label>Contraseña: </label>
    <input type="password" name="contra" placeholder="Contraseña" required>
    <br>
    <label>Confirmar Contraseña: </label>
    <input type="password" name="confcontra" placeholder="Confirmación Contraseña" required>
    <br>
    <input type="submit" name="submit" value="Crear Usuario">
</form>
</body>
</html>
