<?php
echo "Codigo del producto a modificar es: ".$_REQUEST['cod'];
include ("../conexion.php");
if (!is_numeric($_REQUEST["codigo"]))
{
	echo "Porfavor ingrese un valor numerico en el codigo";
	echo "<br><a href='javascript:history.go(-1)'>Volver</a>";
	exit();
}
if ($_REQUEST["nombre"]=="")
{
	echo "Porfavor ingrese un nombre al producto";
	echo "<br><a href='javascript:history.go(-1)'>Volver</a>";
	exit();
}
if ($_REQUEST["existencia"]=="")
{
	echo "Porfavor ingrese un dato en la casilla existencias";
	echo "<br><a href='javascript:history.go(-1)'>Volver</a>";
	exit();
}
if (!is_numeric($_REQUEST["existencia"]))
{
	echo "Porfavor ingrese un valor numerico en la casilla existencias";
	echo "<br><a href='javascript:history.go(-1)'>Volver</a>";
	exit();
}
if ($_REQUEST["precioc"]=="")
{
	echo "Porfavor ingrese un dato en el precio de compra";
	echo "<br><a href='javascript:history.go(-1)'>Volver</a>";
	exit();
}
if (!is_numeric($_REQUEST["precioc"]))
{
	echo "Porfavor ingrese un valor numerico en el precio de compra";
	echo "<br><a href='javascript:history.go(-1)'>Volver</a>";
	exit();
}
if ($_REQUEST["preciov"]=="")
{
	echo "Porfavor ingrese un dato en el precio de venta";
	echo "<br><a href='javascript:history.go(-1)'>Volver</a>";
	exit();
}
if (!is_numeric($_REQUEST["preciov"]))
{
	echo "Porfavor ingrese un valor numerico en el precio de venta";
	echo "<br><a href='javascript:history.go(-1)'>Volver</a>";
	exit();
}
if ($_REQUEST["estante"]=="")
{
	echo "Porfavor ingrese un dato en el precio de compra";
	echo "<br><a href='javascript:history.go(-1)'>Volver</a>";
	exit();
}
$codigo=$_REQUEST["codigo"];
$nombre=$_REQUEST["nombre"];
$existencias=$_REQUEST["existencia"];
$precioc=$_REQUEST["precioc"];
$preciov=$_REQUEST["preciov"];
$estante=$_REQUEST["estante"];

mysql_query("UPDATE productos SET codigo='$codigo',nombre='$nombre',existencias='$existencias',precioc='$precioc',preciov='$preciov',estante='$estante' WHERE codigo=".$_REQUEST["cod"].";",$conexion);


if (!$conexion){
	echo "no se pudo establecer conexion con el servidor mysql";
}else{
echo "La conexion con el servidor mysql fue exitosa";
echo "<br>";
echo "sus datos son";
echo "<br>";
echo "Codigo: ".$_REQUEST['codigo'];
echo "<br>";
echo "Nombre: ".$_REQUEST['nombre'];
echo "<br>";
echo "Existencias: ".$_REQUEST['existencia'];
echo "<br>";
echo "Precio de compra: ".$_REQUEST['precioc'];
echo "<br>";
echo "Precio de venta: ".$_REQUEST['preciov'];
echo "<br>";
echo "Estante: ".$_REQUEST['estante'];
echo "<br>";
echo "<script>window.location=\"index.php?num=1\"</script>";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Datos Actualizados exitosamente</title>
</head>

<body>
</body>
</html>