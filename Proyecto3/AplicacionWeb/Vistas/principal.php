<?php
require_once "../controlador/ControladorPrincipal.php";
require_once "../controlador/ControladorHeader.php";
@session_start();
$idUsuario = $_SESSION['idUsuario'];
$controladorHeader = new ControladorHeader($idUsuario);
$controladorHeader->escribirBoton();
if(isset($_POST['cerrarSesion']))
{
    $controladorHeader->cerrarSesion();
}
$controladorSalones= new ControladorPrincipal($controladorHeader->getUsuario());
?>
<html>
<head>
    <script type="text/javascript" src = "JS/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src = "JS/generarBoton.js"></script>
    <script type="text/javascript" src="JS/seleccionarSalon.js"></script>
    <script type="text/javascript">
        function setPrefered(id)
        {
            var nodoBoton = document.getElementById(id);
            nodoBoton.style.cssText = 'background-color: white;\n' +
                '                       color: black;\n' +
                '                       border: 2px solid #4CAF50;';

        }
    </script>
    <title>Mapa FMAT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/grid.css" type="text/css"/>
</head>

<body>
  <div class="contenedor">
		<header>
			<div class="logo">
				<a href="principal.php">
          <img src="Imagenes/logoFmat.png" class  ="logoPrincipal">
        </a>
			</div>

			<nav id = "">
				<a href="principal.php">Inicio</a>
				<a href="Futuro.php">Proyectos</a>
				<a href="Equipo.php">Contacto</a>
                <a id='btnConfig' href=<?php echo $controladorHeader->obtenerDireccion()?>><?php echo $controladorHeader->obtenerTextoBoton()?></a>
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
                <button class = "boton_personalizado" id="C5" >C5</button>
                <button class = "boton_personalizado" id="C6" >C6</button>
                <button class = "boton_personalizado" id="C7" >C7</button>
                <button class = "boton_personalizado" id="C8" >C8</button>
                <button class = "boton_personalizado" id="C9" >C9</button>
                <br>
                <button class = "boton_personalizado" id="C1" >C1</button>
                <button class = "boton_personalizado" id="C2" >C2</button>
                <button class = "boton_personalizado" id="C3" >C3</button>
                <button class = "boton_personalizado" id="C4" >C4</button>
              </div>
              <div class="filasBotones" id="edificioF">
                <button class = "boton_personalizado" id="F3" >F3</button>
                <br>
                <button class = "boton_personalizado" id="F2" >F2</button>
              </div>


              <div class="filasBotones" id="edificioH">
                <button class = "boton_personalizado" id="H5" >H5</button>
    		      	<button class = "boton_personalizado" id="H6" >H6</button>
    		      	<button class = "boton_personalizado" id="H7" >H7</button>
    		      	<button class = "boton_personalizado" id="H8" >H8</button>
                  <br>
                <button class = "boton_personalizado" id="H1" >H1</button>
    		       	<button class = "boton_personalizado" id="H2" >H2</button>
    			      <button class = "boton_personalizado" id="H3" >H3</button>
    			      <button class = "boton_personalizado" id="H4" >H4</button>

              </div>
              <div class="filasBotones" id="edificioD">
                <button class = "boton_personalizado" id="D1" >D1</button>
                <button class = "boton_personalizado" id="D2" >D2</button>
                <button class = "boton_personalizado" id="D3" >D3</button>
                <button class = "boton_personalizado" id="D4" >D4</button>
              </div>
              <div class="filasBotones" id="edificioCC">
                <button class = "boton_personalizado" id="CC1" >CC1</button>
                <button class = "boton_personalizado" id="CC2" >CC2</button>
                <br>
                <button class = "boton_personalizado" id="CC3" >CC3</button>
                <button class = "boton_personalizado" id="CC4" >CC4</button>
                <br>
                <button class = "boton_personalizado" id="CC5" >CC5</button>
                <button class = "boton_personalizado" id="CC7" >CC7</button>
                <br>
                <button class = "boton_personalizado" id="CC8" >CC8</button>
                <button class = "boton_personalizado" id="CC9" >CC9</button>
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
				<a href="https://www.facebook.com/matematicas.uady.mx/" ><img src="Imagenes/facebook.png" class="logos"></a>
				<a href="#"><img src= "Imagenes/twitter.png" class="logos"></a>
			</div>
		</footer>
	</div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('button').click(function(){
                var clickBtnId = this.id;
                var ajaxurl = 'despliegue.php',
                    data =  {'action': clickBtnId};
                $.post(ajaxurl, data, function (response) {
                    // Response div goes here.
                    $("#widget").html(response);
                });
            });

        });
    </script>

</body>
</html>
<?php
$controladorSalones->colorearFavoritos();
?>
