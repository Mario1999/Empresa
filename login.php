
<?php
if($_GET["nosession"]==1)
	echo "<font color='red'>Ingrese su login y password para poder entrar al sitio</font>";
if ($_GET["mensaje"]==1)
	echo "<font color='green'>Ud ha salido del sistema correctamente</font>";
	
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="verificar.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="252" height="128" border="0" align="center">
    <tbody>
      <tr>
        <td colspan="2">Escriba su usuario y contraseña</td>
      </tr>
      <tr>
        <td>usuario</td>
        <td>contraseña</td>
      </tr>
      <tr>
        <td><input type="text" name="usuario"> </td>
        <td><input type="password" name="clave"> </td>
      </tr>
      <tr align="center">
        <td colspan="2"><input type="submit" name="submit" value="Acceder">
        <input type="reset" name="limpiar" value="Limpiar"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>