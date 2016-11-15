<?php
include("verificar_sesion.php")
?>
<?php
  include("../conexion.php");
if ($_REQUEST["btnBuscar"]!=""&&$_REQUEST["busqueda"]!="")
{
//$mensaje="buscando:".$_REQUEST["busqueda"];
if(is_numeric($_REQUEST["busqueda"]))
$filtro="and codigo=".$_REQUEST["busqueda"];
else
$filtro="and nombre like '%".$_REQUEST["busqueda"]."%'";
$mensaje=$filtro;
//% especifica que no interesa en que linea este almacenado
}else{
$mensaje="<font color='red'> por favor escriba el nombre de un producto para buscar</font>";
}
$rst_productos=mysql_query("SELECT * FROM productos where nombre=nombre ".$filtro.";",$conexion);
//rst_productos=mysql_query("SELECT * FROM productos ORDER BY codigo",$conexion);
  $num_registros=mysql_num_rows($rst_productos);
  if ($num_registros==0)
  {
  if($_REQUEST["busqueda"]!="")
  $mensaje="<font color='red'>no se encontraron registros con la busqueda ".$_REQUEST["busqueda"].  "<a href='index.php'>mostrar todos</a></font>";
  else
   $mensaje="<font color='red'>no hay productos registrados en la base de datos</font>";
   }else{
    if($_REQUEST["busqueda"]!="")
	  $mensaje="<font color='red'>se encontraron $num_registros registros con la busqueda ".$_REQUEST["busqueda"]."</font>";
	  else
	  $mensaje="mostrando $num_registros productos";
	  }
  $registros=10;
  $pagina=$_REQUEST["num"];
  if(is_numeric($pagina))
  $inicio=(($pagina-1)*$registros);
  else
  $inicio=0;
  $rst_productos=mysql_query("SELECT * FROM productos where nombre=nombre ".$filtro." LIMIT $inicio,$registros",$conexion);
  $paginas=ceil($num_registros/$registros);
  
  
   ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inventario -- Ferreteria el constructor</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body class="fondo">
<form  name="form1" method="post" action="index.php">
  <table width="1051" height="142" border="0" align="center">
    <tr>
      <td colspan="7" align="center"><img src="../logos/logo.png" width="160" height="125" align="middle">
        <ul id="menu-bar"  >
          <li class="active"><a href="../index.php?num=1">Inicio</a></li>
          <li><a href="index.php?num=1">Inventario</a> </li>
          <li><a href="../clientes/index.php?num=1">Clientes</a></li>
          <li><a href="../facturacion/fact.php">Facturacion</a></li>
           <li><a href="../facturas/index.php?num=1">Factura</a></li>
      </ul></td>
      <td width="161">Usuario: <?php echo $_COOKIE["usuario_nombre"]; ?><?php echo $_SESSION["usuario"];?> <a href="../salir.php"><img src="../usuarios/logout.png" width="33" height="35" border="0" align="middle"></a></a></td>
    </tr>
    <tr>
      <td width="45">&nbsp;</td>
      <td width="239">&nbsp;</td>
      <td width="107">&nbsp;</td>
      <td width="123">&nbsp;</td>
      <td width="99">&nbsp;</td>
      <td width="101" align="center">&nbsp;</td>
      <td width="124" align="center"><a href="../index.php"><img src="../logos/inicio.png" width="120" height="40"></a><a href="nuevo_producto.php" ></td>
      <td align="center"><a href="nuevo_producto.php"><img src="../logos/nuevoproducto.png"></a></td>
    </tr>
    <tr>
      <td colspan="8"><span class="titulos">Nombre:
          <input name="busqueda" type="text" id="busqueda" value="<?php echo $_GET["busqueda"];?>">
          <input name="btnBuscar" type="submit" id="btnBuscar" value="Buscar">
          <?php echo $mensaje; ?><a href="index.php?num=1"></a></span></td>
    </tr>
    <tr align="center" bgcolor="#987171">
      <td>Codigo</td>
      <td>Nombre del producto</td>
      <td>Existencias</td>
      <td>Precio de compra</td>
      <td>Precio venta</td>
      <td>Estante</td>
      <td>Modificar</td>
      <td>Eliminar</td>
    </tr>
	 <?php
	  while($fila=mysql_fetch_array($rst_productos))
	  {
	  ?>
    <tr align="center" class="impar">
      <td><?php echo $fila["codigo"];?></td>
      <td><?php echo $fila["nombre"];?></td>
      <td><?php echo $fila["existencias"];?></td>
      <td><?php echo $fila["precioc"];?></td>
      <td><?php echo $fila["preciov"];?></td>
      <td><?php echo $fila["estante"];?></td>
      <td><a href="modificar.php?cod=<?php echo $fila['codigo'];?>">Modificar</a></td>
      <td><p><a href="eliminar_confirmar.php?cod=<?php echo $fila['codigo'];?>">Eliminar</a></p></td>
    </tr>
	 <?php
	  }
	  ?>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p align="center">
  <?php
  if ($pagina>1)
  echo "<a href='index.php?num=".($pagina-1)."&busqueda=".$_REQUEST["busqueda"]."&btnBuscar=Buscar'>Anterior</a> ";
  	if ($paginas>1)
		{
  	for($cont=1;$cont<=$paginas;$cont++)
	{
	if ($pagina==$cont)
	echo $cont."  ";
	else
	echo "<a href='index.php?num=".$cont."&busqueda=".$_REQUEST["busqueda"]."&btnBuscar=Buscar'>".$cont."</a>";
	}
		}
if ($pagina<$paginas && $paginas>1)
echo "<a href='index.php?num=".($pagina+1)."&busqueda=".$_REQUEST["busqueda"]."&btnBuscar=Buscar'>Siguiente</a> ";
  ?>
  </p>
  <p align="center">&nbsp;</p>
  <p align="center">3-1 BTP1 2016 <font color="red">I.O.J.H.</font></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>