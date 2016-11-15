<?php
echo "Codigo del producto a modificar es: ".$_REQUEST['cod'];
include ("../conexion.php");

$codigo=$_REQUEST["cod"];
$nombre=$_REQUEST["nombre"];
$correo=$_REQUEST["correo"];
$telefono=$_REQUEST["telefono"];
$direccion=$_REQUEST["direccion"];
mysql_query("UPDATE clientes SET id='$codigo',nombre='$nombre',correo='$correo',telefono='$telefono',direccion='$direccion' WHERE id=".$_REQUEST["cod"].";",$conexion);


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
echo "Correo: ".$_REQUEST['correo'];
echo "<br>";
echo "Telefono: ".$_REQUEST['telefono'];
echo "<br>";
echo "Direccion: ".$_REQUEST['direccio'];
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