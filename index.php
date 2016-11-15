<?php
include("verificar_sesion.php");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Proyecto 4</title>
<link rel="stylesheet" href="style.css" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css"></head>
</html>

<html>
<head>
</head>

<body class="fondo">
<form  name="form1" method="post" action="index.php">
  <table width="1061" height="59" border="0" align="center">
    <tbody>
      <tr align="center" >
        <td align="center"><p><img src="logos/logo.png" align="left" alt="logo" width="160" height="125">
        </p>
          <p>&nbsp;</p>
          <ul id="menu-bar"  >
 <li class="active"><a href="index.php?num=1">Inicio</a></li>
 <li><a href="inventario/index.php?num=1">Inventario</a> </li>
 <li><a href="clientes/index.php?num=1">Clientes</a></li>
 <li><a href="facturacion/fact.php">Facturacion</a></li>
  <li><a href="facturas/index.php?num=1">Factura</a></li>
</ul>        </td>
        <td width="161" colspan="-8" align="center"><p>Usuario: <?php echo $_COOKIE["usuario_nombre"]; ?><?php echo $_SESSION["usuario"];?> <a href="salir.php"><img src="usuarios/logout.png" width="33" height="35" border="0" align="middle"></a></a><img src="<?php echo $_SESSION["foto"];?>" align="middle" width="50" height="50"></p>
        <p>&nbsp;</p></td>
      </tr>
      <tr align="center" >
        <td colspan="2" align="center">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <p align="center">&nbsp;</p>
  <p align="center"><br>
</p>
  <p align="center">Sistema desarrollado por </p>
  <p align="center"><font color="red">Mario Jose Portillo Aguilar </font></p>
  <p align="center"><font color="red">Allan Josue Aquino Gabarrete </font></p>
  <p align="center"><font color="red">Luis Alonso Linares </font></p>
  <p align="center"><font color="red">Victor Manuel Rodriguez</font></p>
  <p align="center"><font color="red">Carlos Daniel Carcamo Santos</font></p>
  <p align="center"></p>
  <p align="center">3-1 BTP1 2016 <font color="red">I.O.J.H.</font></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
