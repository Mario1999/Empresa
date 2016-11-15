 <?php
    include("../conexion.php");
 
    $codigo=$_REQUEST['codigo'];
    $coste=$_REQUEST['coste'];
    $nombre=$_REQUEST['clientes'];
    $preciov=$_REQUEST['preciov'];
    $direccion=$_REQUEST['direccion'];
    $rtn=$_REQUEST['rtn'];
    $impuesto=$_REQUEST['totalcoste1'];
    $descuento=$_REQUEST['descuento'];
    $total=$_REQUEST['saldo'];
    $x=$_REQUEST['x'];
    $producto=$_REQUEST['producto'];
     $fecha=$_REQUEST['fecha'];
    $totalcoste=$_REQUEST['totalcoste'];
 
if (!$conexion){
    echo "no se pudo establecer conexion con el servidor mysql";
}else{
 
   $sql_query="insert into factura values ('$codigo','$nombre', '$direccion','$rtn', '$fecha','$coste','$totalcoste', '$impuesto', '$descuento','$total' )";
   mysql_query($sql_query,$conexion);
 
    for ($i=0,$s=count($producto);$i<$s;$i++) {
      $sql_query_updatestock="UPDATE productos SET existencias = existencias - {$x[$i]} WHERE LOWER(nombre) = LOWER('{$producto[$i]}') ";
        $sql_query1="insert into detalle values ('{$codigo}', '{$x[$i]}','{$producto[$i]}','{$preciov[$i]}')";
        if (mysql_query($sql_query1,$conexion)) {
          mysql_query($sql_query_updatestock,$conexion);
		  $sql_query_updatestock="UPDATE productos SET existencias = existencias - {$x[$i]} WHERE nombre = '{$producto[$i]}' ";
        }
		
		
		
    }
//echo "Su compra fue exitosa";
//echo "<script>window.location=\"../index.php?num=1\"</script>";
    }?>
<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>