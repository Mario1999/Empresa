
<?php
include("conexion.php");
$rst=mysql_query("select * from usuarios where usrlogin='".$_REQUEST["usuario"]."' and usrclave='".$_REQUEST["clave"]."'",$conexion);
$numero_registros=mysql_num_rows($rst);
if ($numero_registros>0)
	{
		$fila=mysql_fetch_array($rst);
		setcookie("usuario_nombre",$fila["usrnombre"]);
		session_start();
		$_SESSION["usuario"]=$fila["usrlogin"];
		$_SESSION["foto"]=$fila["foto"];
		echo "<script>window.location=\"index.php?num=1 \";</script>";
	}else{
		echo "Usuario invalido <br>";
		echo "El usuario y contraseña son invalidos<br>";
		echo "<a href='javascript:history.go(-1)'>Volver</a>";
		mysql_close($conexion);
	}
?>
