<?php

if(!is_numeric($_REQUEST['cod']))
{
	echo "Porfavor seleccione el producto que desea eliminar";
	exit();
}
include("../conexion.php");
mysql_query("delete from productos where codigo=".$_REQUEST["cod"].";",$conexion);
if(mysql_errno()!=0)
{
	echo " No se puede eliminar el producto. error".mysql_errno()."-".mysql_error();
	mysql_close($conexion);
}else{
	mysql_close($conexion);
	echo "<script>window.location=\"index.php?num=1\";</script>";
}
?>