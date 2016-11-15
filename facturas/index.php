<?php
include("../verificar_sesion.php")
?>
<?php
  include("../conexion.php");
if ($_REQUEST["btnBuscar"]!=""&&$_REQUEST["busqueda"]!="")
{
//$mensaje="buscando:".$_REQUEST["busqueda"];
if(is_numeric($_REQUEST["busqueda"]))
$filtro="and num=".$_REQUEST["busqueda"];
else
$filtro="and cliente like '%".$_REQUEST["busqueda"]."%'";
$mensaje=$filtro;
//% especifica que no interesa en que linea este almacenado
}else{
$mensaje="<font color='red'> por favor escriba el nombre del cliente para buscar</font>";
}
$rst_factura=mysql_query("SELECT * FROM factura where cliente=cliente ".$filtro.";",$conexion);
//rst_factura=mysql_query("SELECT * FROM clientes ORDER BY id",$conexion);
  $num_registros=mysql_num_rows($rst_factura);
  if ($num_registros==0)
  {
  if($_REQUEST["busqueda"]!="")
  $mensaje="<font color='red'>no se encontraron Facturas con la busqueda ".$_REQUEST["busqueda"].  "<a href='index.php'>mostrar facturas</a></font>";
  else
   $mensaje="<font color='red'>no hay facturas registradas en la base de datos</font>";
   }else{
    if($_REQUEST["busqueda"]!="")
	  $mensaje="<font color='red'>se encontraron $num_registros facturas con la busqueda ".$_REQUEST["busqueda"]."</font>";
	  else
	  $mensaje="mostrando $num_registros facturas";
	  }
  $registros=10;
  $pagina=$_REQUEST["num"];
  if(is_numeric($pagina))
  $inicio=(($pagina-1)*$registros);
  else
  $inicio=0;
  $rst_factura=mysql_query("SELECT * FROM factura where cliente=cliente ".$filtro." LIMIT $inicio,$registros",$conexion);
  $paginas=ceil($num_registros/$registros);
  
  
   ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Proyecto 4</title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>

<body class="fondo">
<form  name="form1" method="post" action="index.php">
  <table width="1097" height="77" border="0" align="center">
    <tr>
      <td colspan="12" align="center"><p><img src="../logos/logo.png" width="160" height="125" align="left"></p>
        <p>&nbsp;</p>
        <ul id="menu-bar"  >
          <li class="active"><a href="../index.php?num=1">Inicio</a></li>
          <li><a href="../inventario/index.php?num=1">Inventario</a> </li>
          <li><a href="index.php?num=1">Clientes</a></li>
          <li><a href="../facturacion/fact.php">Facturacion</a></li>
		   <li><a href="../facturas/index.php?num=1">Factura</a></li>
      </ul></td>
      <td width="165">Usuario: <?php echo $_COOKIE["usuario_nombre"]; ?><?php echo $_SESSION["usuario"];?> <a href="../salir.php"><img src="../usuarios/logout.png" width="33" height="35" border="0" align="middle"></a></a></td>
    </tr>
    <tr>
      <td colspan="12">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="12"><span class="titulos">Nombre:
          <input name="busqueda" type="text" value="<?php echo $_GET["busqueda"];?>">
          <input name="btnBuscar" type="submit" id="btnBuscar" value="Buscar">
          <?php echo $mensaje; ?><a href="index.php?num=1"></a></span></td>
      <td><a href="nuevo_cliente.php"></a></td>
    </tr>
    <tr align="center" bgcolor="#987171">
      <td width="64">Codigo</td>
      <td width="177">Cliente</td>
      <td width="58">Direccion</td>
      <td width="64">RTN</td>
      <td width="90">Fecha</td>    
      <td width="42">Pago</td>
      <td width="77">Subtotal</td>
      <td width="81">Impuesto</td>
      <td width="87">Descuento</td>
      <td width="64">Total</td>
      <td width="77">Ver Factura </td>
    </tr>
	 <?php
	  while($fila=mysql_fetch_array($rst_factura))
	  {
	  ?>
    <tr align="center">
      <td><?php echo $fila["num"];?></td>
      <td><?php echo $fila["cliente"];?></td>
      <td><?php echo $fila["direccion"];?></td>
      <td><?php echo $fila["rtn"];?></td>
      <td><?php echo $fila["fecha"];?></td>
      <td><?php echo $fila["pago"];?></td>
      <td><?php echo $fila["subtotal"];?></td>
      <td><?php echo $fila["impuesto"];?></td>
      <td><?php echo $fila["descuento"];?></td>
      <td><?php echo $fila["total"];?></td>
      <td><a href="../detalles/index.php?num=<?php echo $fila['num'];?>">Ver factura</a> </td>
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