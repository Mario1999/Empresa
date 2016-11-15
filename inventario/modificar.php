<?php
include("../conexion.php");
$rst_productos=mysql_query("select * from productos where codigo= ".$_REQUEST['cod'].";",$conexion);
$fila_producto=mysql_fetch_array($rst_productos);
function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(00001,$max)};
 return $key;
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Modificar Producto</title>
</head>

<body>
<form name="form1" method="post" action="actualizar.php?cod=<?php echo $_REQUEST['cod'];?>">
   <p>&nbsp;</p>
   <p>&nbsp;</p>
   <table width="441" border="0" align="center">
    <tbody>
      <tr>
        <td align="right">&nbsp;</td>
        <td><a href="index.php?num=1">VOLVER AL INICIO</a></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="161" align="right">Codigo:</td>
        <td width="185"><input type="text" name="codigo" value="<?php echo $fila_producto["codigo"]?>" readonly="readonly" numeric></td>
        <td width="81">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Nombre del producto:</td>
        <td><input name="nombre" type="text" value="<?php echo $fila_producto["nombre"]?>" required></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Existencia:</td>
        <td><input type="number" name="existencia"  value="<?php echo $fila_producto["existencias"]?>" required></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Precio de compra: </td>
        <td><input type="number" name="precioc"  value="<?php echo $fila_producto["precioc"]?>" required></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Precio Venta: </td>
        <td><input type="number" name="preciov"  value="<?php echo $fila_producto["preciov"]?>" required></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Estante</td>
        <td><input type="number" name="estante"  value="<?php echo $fila_producto["estante"]?>" required></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="enviar" value="Enviar">
          <input type="reset" name="limpiar" value="Limpiar"></td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>