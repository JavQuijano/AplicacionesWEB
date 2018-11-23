<?php
session_start();
require_once "./PHPLogin/detectarSesion.php";
?>
<html>
<head>
  <title>
    Planes a Futuro
  </title>
    <script type="text/javascript" src = "JS/generarBoton.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Estilos/futuro.css" type="text/css"/>
</head>

<body>
  <div class="contenedor">
    <header >
      <div class="logo">
        <a href="principal.php">
          <img src="./Imagenes/logoFmat.png" class="logoPrincipal">
        </a>
      </div>
      <nav id = "barraNavegacion">
          <a href="principal.php">Inicio</a>
          <a href="Futuro.php">Proyectos</a>
          <a href="Equipo.php">Contacto</a>
          <a href="configUsuario.php" id="btnConfig">Texto</a>
          <form method="post" action="">
              <input type="submit" name="cerrarSesion" value="CerrarSesion" id="botonLogin">
          </form>
      </nav>
    </header>
    <section class="main">
      <div class="titulo">
        <h1>
          Planes para la pagina
        </h1>
      </div>
      <div class ="ContenedorPlanes">
        <div class="plan">
          <h1>Uso de PHP</h1>
          <p> Se planea en futuras entregas de la aplicaion hacer uso de PHP como herramienta de programacion de lado del servidor </p>
        </div>
        <div class="plan">
          <h1>Coneccion a una Base de Datos SQL</h1>
          <p> Se planea para otra entrega futura que la aplicacion se conecte a una base de datos para recibir y almacenar informacion </p>
        </div>
      </div>
    </section>
    <footer>
      <section>
        <nav class="links">
          <a href="principal.php">
            Inicio
          </a>
  				<a href="#">
            Proyectos
          </a>
  				<a href="Equipo.php">
            Contacto
          </a>
        </nav>
      </section>
      <div class="logos">
        <nav>
          <a href="#">
            <img src="./Imagenes/facebook.jpg" alt="">
          </a>
          <a href="#">
            <img src="./Imagenes/twitter.png" alt="">
          </a>
        </nav>

      </div>
    </div>

    </footer>
</body>
</html>