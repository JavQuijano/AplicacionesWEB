<?php
require_once "../controlador/ControladorHeader.php";
@session_start();
$idUsuario = $_SESSION['idUsuario'];
$controladorHeader = new ControladorHeader($idUsuario);
$controladorHeader->escribirBoton();
if(isset($_POST['cerrarSesion']))
{
    $controladorHeader->cerrarSesion();
}
?>
<html>
<head>
    <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src = "JS/generarBoton.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/grid.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
    <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
</head>
<body>

  <script type="text/javascript">
    $(document).ready( function () {
    $('#tabla').DataTable();
} );
  </script>

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
                  <table id="tabla" class="display">
                  <thead>
                      <tr>
                          <th>Modulo</th>
                          <th>Rol</th>
                          <th>Permiso1</th>
                          <th>Permiso2</th>
                          <th>Permiso3</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>C1</td>
                          <td>
                            <select id="" name="comboBoxRoles" style="width:100%;">
                            </select>
                          </td>
                          <td>
                            <input type="checkbox" id='regular' name="checkFav[]" value="Permiso1" <?php /*if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); */?>/>
                          </td>
                          <td>
                            <input type="checkbox" id='regular' name="checkFav[]" value="Permiso2" <?php /*if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); */?>/>
                          </td>
                          <td>
                            <input type="checkbox" id='regular' name="checkFav[]" value="Permiso3" <?php /*if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); */?>/>
                          </td>
                      </tr>
                      <tr>
                        <td>C2</td>
                        <td>
                          <select id="" name="comboBoxRoles" style="width:100%;">
                          </select>
                        </td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="Permiso1" <?php /*if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); */?>/>
                        </td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="Permiso2" <?php /*if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); */?>/>
                        </td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="Permiso3" <?php /*if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); */?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>C3</td>
                        <td>
                          <select id="" name="comboBoxRoles" style="width:100%;">
                          </select>
                        </td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="Permiso1" <?php /*if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); */?>/>
                        </td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="Permiso2" <?php /*if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); */?>/>
                        </td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="Permiso3" <?php /*if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); */?>/>
                        </td>
                      </tr>
                      <tr>
                        <td>C4</td>
                        <td>
                          <select id="" name="comboBoxRoles" style="width:100%;">
                          </select>
                        </td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="Permiso1" <?php /*if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); */?>/>
                        </td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="Permiso2" <?php /*if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); */?>/>
                        </td>
                        <td>
                          <input type="checkbox" id='regular' name="checkFav[]" value="Permiso3" <?php /*if(in_array('C1', $controlador->getNombreFavoritos())) echo( 'checked'); */?>/>
                        </td>
                      </tr>
                  </tbody>
              </table>
              <input type="submit" name="submit"  value="Actualizar Sistemas">
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
