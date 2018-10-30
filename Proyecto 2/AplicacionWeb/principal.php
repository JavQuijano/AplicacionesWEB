<?php
session_start();
require "./PHPLogin/detectarSesion.php";
?>
<html>
<head>
    <script type="text/javascript" src = "JS/generarBoton.js"></script>
    <script type="text/javascript" src="JS/seleccionarSalon.js"></script>
    <script type="text/javascript" src="JS/SalonesPreferidos.js"></script>
    <title>Mapa FMAT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Estilos/grid.css" type="text/css"/>
</head>

<body>
  <div class="contenedor">
		<header>
			<div class="logo">
				<a href="principal.php">
          <img src="./Imagenes/logoFmat.png" class  ="logoPrincipal">
        </a>
			</div>

			<nav id = "">
				<a href="principal.php">Inicio</a>
				<a href="Futuro.php">Proyectos</a>
				<a href="Equipo.php">Contacto</a>
                <a href="configUsuario.php" id="btnConfig">Texto</a>
                <form method="post" action="">
                    <input type="submit" name="cerrarSesion" value="CerrarSesion" id="botonLogin">
                </form>
			</nav>
		</header>
    <div class = "contenedor-centro" id = centro>
  		<section class="main">
          <div id="contenedorBotones">
            <div class="columnaBotones">
              <div class="filasBotones" id="edificioC">

                <button class = "boton_personalizado" id="C5" onclick="selSalon(id)">C5</button>
                <button class = "boton_personalizado" id="C6" onclick="selSalon(id)">C6</button>
                <button class = "boton_personalizado" id="C7" onclick="selSalon(id)">C7</button>
                <button class = "boton_personalizado" id="C8" onclick="selSalon(id)">C8</button>
                <button class = "boton_personalizado" id="C9" onclick="selSalon(id)">C9</button>
                <br>
                <button class = "boton_personalizado" id="C1" onclick="selSalon(id)">C1</button>
                <button class = "boton_personalizado" id="C2" onclick="selSalon(id)">C2</button>
                <button class = "boton_personalizado" id="C3" onclick="selSalon(id)">C3</button>
                <button class = "boton_personalizado" id="C4" onclick="selSalon(id)">C4</button>
              </div>
              <div class="filasBotones" id="edificioF">
                <button class = "boton_personalizado" id="F3" onclick="selSalon(id)">F3</button>
                <br>
                <button class = "boton_personalizado" id="F2" onclick="selSalon(id)">F2</button>
              </div>




              <div class="filasBotones" id="edificioH">
                <button class = "boton_personalizado" id="H5" onclick="selSalon(id)">H5</button>
    		      	<button class = "boton_personalizado" id="H6" onclick="selSalon(id)">H6</button>
    		      	<button class = "boton_personalizado" id="H7" onclick="selSalon(id)">H7</button>
    		      	<button class = "boton_personalizado" id="H8" onclick="selSalon(id)">H8</button>
                  <br>
                <button class = "boton_personalizado" id="H1" onclick="selSalon(id)">H1</button>
    		       	<button class = "boton_personalizado" id="H2" onclick="selSalon(id)">H2</button>
    			      <button class = "boton_personalizado" id="H3" onclick="selSalon(id)">H3</button>
    			      <button class = "boton_personalizado" id="H4" onclick="selSalon(id)">H4</button>

              </div>
              <div class="filasBotones" id="edificioD">
                <button class = "boton_personalizado" id="D1" onclick="selSalon(id)">D1</button>
                <button class = "boton_personalizado" id="D2" onclick="selSalon(id)">D2</button>
                <button class = "boton_personalizado" id="D3" onclick="selSalon(id)">D3</button>
                <button class = "boton_personalizado" id="D4" onclick="selSalon(id)">D4</button>
              </div>
              <div class="filasBotones" id="edificioCC">
                <button class = "boton_personalizado" id="CC1" onclick="selSalon(id)">CC1</button>
                <button class = "boton_personalizado" id="CC2" onclick="selSalon(id)">CC2</button>
                <br>
                <button class = "boton_personalizado" id="CC3" onclick="selSalon(id)">CC3</button>
                <button class = "boton_personalizado" id="CC4" onclick="selSalon(id)">CC4</button>
                <br>
                <button class = "boton_personalizado" id="CC5" onclick="selSalon(id)">CC5</button>
                <button class = "boton_personalizado" id="CC7" onclick="selSalon(id)">CC7</button>
                <br>
                <button class = "boton_personalizado" id="CC8" onclick="selSalon(id)">CC8</button>
                <button class = "boton_personalizado" id="CC9" onclick="selSalon(id)">CC9</button>
              </div>
          </div>

    </div>
  			<img src="./Imagenes/Facultad.png" id="mapa" alt = "Mapa de FMAT">
  		</section>

  		<aside id = "sidebar">
  			<div class="info" id="info">
  				<div class="widget" id = "widget">Horarios FMAT</div>
  			</div>
  		</aside>
   </div>
		<footer>
			<section class="links">
				<a href="principal.php">Inicio</a>
				<a href="Futuro.php">Proyectos</a>
				<a href="Equipo.php">Contacto</a>
			</section>

			<div class="social">
				<a href="https://www.facebook.com/matematicas.uady.mx/" ><img src="./Imagenes/facebook.png" class="logos"></a>
				<a href="#"><img src= "./Imagenes/twitter.png" class="logos"></a>
			</div>
		</footer>
	</div>

</body>
</html>
<?php
include "./PHPLogin/salonesPreferidos.php";
?>