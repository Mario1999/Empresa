
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Eliminar producto</title>
</head>

<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table width="524" border="0" align="center">
  <tbody>
    <tr>
      <td colspan="3"><?php
echo "<font color='red' size='4' > Esta seguro de que desea eliminar el producto con codigo</font> ".$_REQUEST['cod'];
?></td>
    </tr>
    <tr>
      <td width="220">&nbsp;</td>
      <td width="38">&nbsp;</td>
      <td width="252">&nbsp;</td>
    </tr>
    <tr >
      <td align="right"><a href="eliminar.php?cod=<?php echo $_REQUEST['cod'];?>">Si</a></td>
      <td> ----- </td>
      <td align="left"><a href="index.php?num=1">No</a></td>
    </tr>
  </tbody>
</table>
</body>
</html>