<?php
include("../verificar_sesion.php")
?>
<?php
  include("../conexion.php");
$rst_factura=mysql_query("select * from factura where num=".$_REQUEST['num'].";",$conexion);
$fila_factura=mysql_fetch_array($rst_factura);

$rst_detalle=mysql_query("select * from detalle where codfact=".$_REQUEST['num'].";",$conexion);


   ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Proyecto 4</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body class="fondo">
<form  name="form1" method="get" action="">
  <p>&nbsp;</p>
  <table width="980" border="0">
    <tr>
      <td colspan="9" align="center"><a href="../index.php"><img src="../logos/inicio.png" width="120" height="40" align="middle"></a>   <a href="../facturas/index.php"><img src="../logos/volver.png" align="middle"></a></td>
    </tr>
    <tr>
      <td colspan="9" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9" align="center">Factura # <font color="red"><?php echo $_GET['num'];?></font> </td>
    </tr>
    <tr>
      <td colspan="9" align="center">&nbsp;</td>
    </tr>

	<tr>
      <td align="right" ><font color="#0000FF">Cliente: </font> </td>
      <td> <?php echo $fila_factura["cliente"];?></td>
      <td width="49"right""><font color="#0000FF">RTN:  </font></td>
      <td width="350"><?php echo $fila_factura["rtn"];?></td>
      <td>&nbsp;</td>
	</tr>
    <tr>
      <td align="right"><font color="#0000FF">Direccion:  </font>   </td>
      <td> <?php echo $fila_factura["direccion"];?></td>
      <td><font color="#0000FF">Fecha:  </font></td>
      <td><?php echo $fila_factura["fecha"];?></td>
      <td width="120">&nbsp;</td>
    </tr>
    <tr>
      <td width="157">&nbsp;</td>
      <td width="282">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
	<table width="978" border="0">
    <tr align="center">
	 
      <td width="166"><font color="#0000FF">Cantidad </font></td>
      <td width="237"><font color="#0000FF">Descripcion</font></td>
      <td width="177"><font color="#0000FF">Precio Unitario </font></td>
      <td width="186"><font color="#0000FF">Precio Total </font></td>
      <td width="107">&nbsp;</td>
      <td width="23">&nbsp;</td>
      <td width="23">&nbsp;</td>
      <td width="25">&nbsp;</td>
    </tr>
    <tr align="center">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	 <?php
	  while($fila=mysql_fetch_array($rst_detalle))
	 	
	   {
	   $precio=$fila['precio'];
		$cantidad=$fila['cantidad'];
	  ?>
    <tr align="center">
      <td><?php echo $fila["cantidad"];?></td>
      <td><?php echo $fila["descripcion"];?></td>
      <td><?php echo $fila["precio"];?></td>
      <td><?php echo $precio*$cantidad;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	 <?php
	  }
	  ?>
	</table>
	<table width="980" border="0">
    <tr align="right">
      <td width="48">&nbsp;</td>
      <td width="48">&nbsp;</td>
      <td width="48">&nbsp;</td>
      <td width="296">&nbsp;</td>
      <td width="161">&nbsp;</td>
      <td width="103">&nbsp;</td>
      <td width="183">&nbsp;</td>
      <td width="59">&nbsp;</td>
    </tr>
    <tr align="right">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="296">&nbsp;</td>
      <td width="161">Subtotal:</td>
      <td width="103"><?php echo $fila_factura["subtotal"];?> Lps.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="right">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Impuesto:</td>
      <td><?php echo $fila_factura["impuesto"];?> Lps.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="right">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Descuento:</td>
      <td><?php echo $fila_factura["pago"];?> Lps.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="right">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Total:</td>
      <td><?php echo $fila_factura["total"];?> Lps.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="31">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
		
  </table>
  <p>&nbsp;</p>
  <p align="center">

  </p>
  <p align="center">&nbsp;</p>
  <p align="center">3-1 BTP1 2016 <font color="red">I.O.J.H.</font></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>