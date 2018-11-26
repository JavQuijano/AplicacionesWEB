<?php
session_start();
session_destroy();
require_once "../controlador/ControladorNuevoUsuario.php";
$controladorNuevoUsuario = new ControladorNuevoUsuario();
if(isset($_POST['submit']))
{
    $controladorNuevoUsuario->crearUsuario();
}
?>

<html>
<head>
    <title>Mapa FMAT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/login.css" type="text/css"/>
    <link rel="stylesheet" href="Estilos/tablaFavoritos.css" type="text/css"/>
</head>
<body class ="align">
<div class="contenedor">
    <header>
        <div class="logo">
            <a href="principal.php">
                <img src="./Imagenes/logoFmat.png" class  ="logoPrincipal">
            </a>
        </div>
    </header>
            <div class="grid">
                <form method="post" action="" class="form login">
                    <header class="login__header">
                        <h3 class="login__title">Nuevo Usuario</h3>
                    </header>

                    <div class="login__body">
                        <div class="form__field">

                            <input type="text" name="nombreUsuario" placeholder="Nombre Usuario" required>

                            <input type="password" name="contra" placeholder="Contraseña" required>

                            <input type="password" name="confcontra" placeholder="Confirmación Contraseña" required>

                            <select class="form-item__element form-item__element--select" name="seleccion"required>
                              <option disabled selected value="">Seleccione una opcion</option>
                              <option value="Cual fue tu primera mascota?">Cual fue tu primera mascota?</option>
                              <option value="Cual es tu comida favorita?">Cual es tu comida favorita?</option>
                              <option value="Cual es tu sabor favorito de chicle?">Cual es tu sabor favorito de chicle?</option>
                              <option value="Cual fue el primer libro que leiste?">Cual fue el primer libro que leiste?</option>
                            </select>

                            <input type="text" name="respuesta" placeholder="Respuesta" required>
                        </div>
                    </div>

                    <div class ="form__field">

                    </div>

                    <footer class="login__footer">
                      <div class="switch">
                      <input type="radio" class="switch-input" name="view" value="usuario" id="usuario" checked>
                      <label for="Usuario" class="switch-label switch-label-off" hidden>Usuario</label>
                      <input type="radio" class="switch-input" name="view" value="admin" id="admin">
                      <label for="Admin" class="switch-label switch-label-on" hidden>Admin</label >
                      <span class="switch-selection"></span>
                    </div>
                        <input type="submit" name="submit" value="Crear Usuario">
                    </footer>

                </form>
            </div>
            <footer>
                <section class="links">
                    <a href="principal.php">Inicio</a>
                    <a href="Futuro.php">Proyectos</a>
                    <a href="Equipo.php">Contacto</a>
                </section>

                <div class="social">
                    <a href="https://www.facebook.com/matematicas.uady.mx/" ><img src="Imagenes/facebook.png" class="logos"></a>
                    <a href="#"><img src= "Imagenes/twitter.png" class="logos"></a>
                </div>
            </footer>

        </div>
</body>

</html>
