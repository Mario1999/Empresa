<?php 
include("../conexion.php");
$rst_productos=mysql_query("SELECT codigo from productos order by codigo desc");
$codigos=mysql_fetch_array($rst_productos) ;
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
<title>Documento sin título</title>
</head>

<body>
<form name="form1" method="post" action="guardar.php">
   <p>&nbsp;</p>
   <p>&nbsp;</p>
   <table width="441" border="0" align="center">
    <tbody>
      <tr>
        <td align="right">&nbsp;</td>
        <td><a href="index.php?num=1"><img src="../logos/volver.png"></a></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="161" align="right">Codigo:</td>
        <td width="185"><input name="codigo" type="text" value="<?php echo generarCodigo(5);?>" readonly="readonly" required></td>
        <td width="81">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Nombre del producto:</td>
        <td><input name="nombre" type="text" required></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Existencia:</td>
        <td><input name="existencia" type="number" required ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Precio de compra </td>
        <td><input name="precioc" type="number" required ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Precio de venta </td>
        <td><input name="preciov" type="number" required ></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Estante</td>
        <td><input name="estante" type="number" required ></td>
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