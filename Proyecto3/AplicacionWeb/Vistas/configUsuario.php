<?php
require_once "../controlador/ControladorFavoritos.php";
require_once "../controlador/ControladorHeader.php";
@session_start();
$idUsuario = $_SESSION['idUsuario'];
$controladorHeader = new ControladorHeader($idUsuario);
$controladorHeader->escribirBoton();
if(isset($_POST['cerrarSesion']))
{
    $controladorHeader->cerrarSesion();
}
$controlador = new ControladorFavoritos($idUsuario);
if(isset($_POST['submit'])){
    if(isset($_POST['checkFav'])) {
        $controlador->actualizarFavoritos();
    }else{
        echo  "<script type='text/javascript'>alert('Seleccionar al menos un campo')</script>";
    }
}
?>
<html>
<head>
    <script type="text/javascript" src = "JS/generarBoton.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/grid.css" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">

    <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>

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
        <div class="container">
            <aside id = "sidebar">
                <form method="post">
                  <table id="tabla" class="display" align="center">
                  <thead>
                      <tr>
                          <th>Salones</th>
                          <th>Favoritos</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>C1</td>
                          <td>
                            <input type="checkbox" id='regular' name="checkFav[]" value="C1" <?php if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                          </td>
                      </tr>
                      <tr>
                        <td>C2</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="C2" <?php if(in_array('C2', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>C3</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="C3" <?php if(in_array('C3', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>C4</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="C4" <?php if(in_array('C4', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>C5</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="C5" <?php if(in_array('C5', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>C6</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="C6" <?php if(in_array('C6', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>C7</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="C7" <?php if(in_array('C7', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>C8</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="C8" <?php if(in_array('C8', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>C9</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="C9" <?php if(in_array('C9', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>D1</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="D1" <?php if(in_array('D1', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>D2</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="D2"<?php if(in_array('D2', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>D3</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="D3" <?php if(in_array('D3', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>D4</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="D4" <?php if(in_array('D4', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>F2</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="F2" <?php if(in_array('F2', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>F3</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="F3" <?php if(in_array('F3', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>H1</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="H1" <?php if(in_array('H1', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>H2</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="H2" <?php if(in_array('H2', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>H3</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="H3" <?php if(in_array('H3', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>H4</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="H4" <?php if(in_array('H4', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>H5</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="H5" <?php if(in_array('H5', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>H6</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="H6" <?php if(in_array('H6', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>H7</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="H7" <?php if(in_array('H7', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>H8</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="H8" <?php if(in_array('H8', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>CC1</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="CC1" <?php if(in_array('CC1', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>CC2</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="CC2" <?php if(in_array('CC2', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>CC3</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="CC3" <?php if(in_array('CC3', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>CC4</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="CC4" <?php if(in_array('CC4', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>CC5</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="CC5" <?php if(in_array('CC5', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>CC7</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="CC7" <?php if(in_array('CC7', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>CC8</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="CC8" <?php if(in_array('CC8', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>CC9</td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="CC9" <?php if(in_array('CC9', $controlador->getNombreFavoritos())) echo( 'checked'); ?>/>
                        </td>
                      </tr>
                  </tbody>
              </table>
              <input type="submit" name="submit"  value="Actualizar Favoritos">
                </form>
            </aside>
        </div>
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
