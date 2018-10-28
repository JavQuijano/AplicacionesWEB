<?php
require "./PHPConfig/configAdminPHP.php";
?>
<html>
<body>
<form method="post" action ="">
<select name="salonACambiar" >
    <option value="C1" name="C1">C1</option>
    <option value="C2" name="C2">C2</option>
    <option value="C3" name="C3">C3</option>
    <option value="C4" name="C4">C4</option>
    <option value="C5" name="C5">C5</option>
    <option value="C6" name="C6">C6</option>
    <option value="C7" name="C7">C7</option>
    <option value="C8" name="C8">C8</option>
    <option value="C9" name="C9">C9</option>

    <option value="D1" name="D1">D1</option>
    <option value="D2" name="D2">D2</option>
    <option value="D3" name="D3">D3</option>
    <option value="D4" name="D4">D4</option>

    <option value="F2" name="F2">F2</option>
    <option value="F3" name="F3">F3</option>

    <option value="H1" name="H1">H1</option>
    <option value="H2" name="H2">H2</option>
    <option value="H3" name="H3">H3</option>
    <option value="H4" name="H4">H4</option>
    <option value="H5" name="H5">H5</option>
    <option value="H6" name="H6">H6</option>
    <option value="H7" name="H7">H7</option>
    <option value="H8" name="H8">H8</option>

    <option value="CC1" name="CC1">CC1</option>
    <option value="CC2" name="CC2">CC2</option>
    <option value="CC3" name="CC3">CC3</option>
    <option value="CC4" name="CC4">CC4</option>
    <option value="CC5" name="CC5">CC5</option>
    <option value="CC7" name="CC7">CC7</option>
    <option value="CC8" name="CC8">CC8</option>
    <option value="CC9" name="CC9">CC9</option>

</select>
    <br>
    <input type ="submit" name="cambiarSalon" value="Cambiar Salon">
</form>
<form method="post">
    <textarea name="texto" cols="100" rows="40"><?php echo iniciarTextField();?> </textarea>
    <br>
    <input type="submit" name="cambiarHorario"  value="Cambiar Horario">
</form>
</body>
</html>
