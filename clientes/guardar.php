<?php
include ("../conexion.php");

$codigo=$_REQUEST["codigo"];
$nombre=$_REQUEST["nombre"];
$correo=$_REQUEST["correo"];
$telefono=$_REQUEST["telefono"];
$direccion=$_REQUEST["direccion"];
$sql_query="insert into clientes values('$codigo','$nombre','$correo','$telefono','$direccion')";
mysql_query($sql_query,$conexion);

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
echo "Direccion: ".$_REQUEST['direccion'];
echo "<br>";
echo "<script>window.location=\"index.php?num=1\"</script>";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Datos Guardados exitosamente</title>
</head>

<body>
</body>
</html>