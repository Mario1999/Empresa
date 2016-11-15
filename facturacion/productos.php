<?php
session_start();

$titulo = "Facturacion";
include("../conexion.php");
include("estructura/meta_tags.php");
include("estructura/cabecera.php");

//include("izquierda.php");
?>
<link href="style.css" rel="stylesheet" type="text/css" />

	<div id="derecha">
	<h1>Detalle de Productos</h1>
	
		<div class='text-border'>
		<?php
			/*MOSTRAR Carro*/
			//$id = $_GET['id'];
			
			$resultado = mysql_query("SELECT codigo, nombre, preciov FROM productos");
			
			//Desplegamos una tabla con los datos de los productos
			echo "<div class=verproductos>";
			echo "<table style=border:1px solid #333333>
				<tr class=titulo>
					<th style='display:none'>ID</th>
					<th class='desc_largo'>Producto</th>
					<th style='width:100px;text-align:right'>Precio</th>
					<th style='width:50px;text-align:right'>Acción</th>
				</tr>";
				
			// comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
			while ($productos = mysql_fetch_array($resultado)) { 
				echo "<tr class='borde_tabla'><td style='display:none'>" . $productos['codigo'] . "</td>";     // imprime el texto
				echo "<td>" . $productos['nombre'] . "</td>";     // imprime el nombre
				echo "<td style='text-align:right'>" . $productos['preciov'] . " L </td>"; // imprime el precio
				echo "<td style='text-align:right'>
								<a href='fact.php?id=" . $productos['codigo'] . "&action=";
								//Detectamos si el producto ya se ha añadido al cesta de la compra para usar una imagen u otra.
								//Si se ha añadido usamos una imagen para Restar una cantidad al carro
								if (isset($_SESSION['carro'][$productos['id']])){
									//echo "remove' alt='Eliminar del carro'><img src='img/remove_carro.png' width='48' height='48' alt='Eliminar del carro' title='Añadir producto al carrito'>";
									echo "removeProd' alt='Eliminar del carro'><img src='img/remove_carro.png' width='48' height='48' alt='Eliminar del carro' title='Añadir producto al carrito'>";
								}
								else
									echo "add' alt='Añadir al carro'><img src='img/carrito.jpg' width='48' height='48' alt='Añadir al carrito' title='Añadir producto al carrito'>";
									
								
				echo "</a></td>";
			  echo "</tr>"; 
			} // fin del bucle de ordenes
							
			//cerramos la etiqueta tabla
			echo "</table>";
			
		
				/*echo $_SESSION["totalcoste"] . "<br>";
				echo $_SESSION["cantidadTotal"] . "<br>";*/
			
			echo "</div>";
		?>
		</div> <!-- Cierro text-border -->
	</div> 
	<p>
  <!-- Cierro derecha -->
	  
  <span class="fondo">
  <?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>
</span></p>
