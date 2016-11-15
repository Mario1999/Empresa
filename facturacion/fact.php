<?php
session_start();
 
$titulo = "Facturacion";
 
include("../conexion.php");
 
?>
 
 
    <link href="../style.css" rel="stylesheet" type="text/css" />
    <div id="derecha" class="fondo">
        <h1 class="Estilo1" align="center">Facturacion -- Ferreteria el constructor</h1>
         <div class='text-border'>
        <?php
           
            if (isset($_GET['id']))
                $id = $_GET['id'];
            else
                $id = 1;
           
            if (isset($_GET['action']))
                $action = $_GET['action'];
            else
                $action = "empty";
   
   
            switch($action){
           
                case "add":
                    if(isset($_SESSION['fact'][$id]))
                        $_SESSION['fact'][$id]++;
                    else
                        $_SESSION['fact'][$id]=1;
                break;
               
                case "remove":
                    if(isset($_SESSION['fact'][$id]))
                    {
                        $_SESSION['fact'][$id]--;
                        if($_SESSION['fact'][$id]==0)
                            unset($_SESSION['fact'][$id]);
                    }
                   
                break;
                case "removeProd":
                    if(isset($_SESSION['fact'][$id])){
                        unset($_SESSION['fact'][$id]);
                    }
                break;
               
                case "mostrar":
                    if(isset($_SESSION['fact'][$id])){
                        continue;
                    }
                break;
               
                case "empty":
                    unset($_SESSION['fact']);
               
                break;
                       
               
            }
 
            /*MOSTRAR Factura*/
            /*echo "<pre>";
                print_r($_SESSION);
              echo "</pre>";
 
              echo "CANTIDAD: " .   $_SESSION['fact'][$id] . "<br>";
              echo "ID      : " . $id . "<br>";
            */
           
            if(isset($_SESSION['fact'])){
                echo "<form action='comprar.php' method='post'><table border=0   width='700' align='center'>";
                $totalcoste = 0;
               
                //Inicializamos el contador de productos seleccionados.
                $xTotal = 0;
               
                echo "<tr>";
                    echo "<td>Producto</td>";
                    echo "<td>Precio</td>";
                    echo "<td align='center'>Cantidad</td>";
                    echo "<td align='center'>Acción</td>";
                    echo "<td colspan=2 align=right>Total</td>";
                    echo "<td ></td>";
                echo "</tr>";
                echo "<tr><td colspan=5><hr></td></tr>";
   
               
                foreach($_SESSION['fact'] as $id => $x){
                                    $resultado = mysql_query("SELECT codigo, nombre, preciov FROM productos WHERE codigo=$id");
                    $rst_clientes=mysql_query("SELECT * FROM clientes ".$filtro.";",$conexion);                
                   
                    $codcli=$rst_clientes['id'];
                    $nomcli=$rst_clientes['nombre'];
                    $mifila = mysql_fetch_array($resultado);
                    $id = $mifila['codigo'];
                    $preciov = $mifila['preciov'];
                    $producto = $mifila['nombre'];
                    //acortamos el nombre del producto a 40 caracteres
                    $producto = substr($producto,0,40);
                    $precio = $mifila['preciov'];
                    //Coste por artículo según la cantidad elegida
                    $coste = $precio * $x;
                    //Coste total de los productos
                    $totalcoste = $totalcoste + $coste;
                    $totalcoste1 = $totalcoste/100*15;
                    $descuento = $totalcoste/100*10;
                    $descuento2 = $totalcoste/100*20;
                    $saldo=$totalcoste-descuento+$totalcoste1;
                   
                //Contador del total de productos añadidos a la factura
                    $xTotal = $xTotal + $x;
					
 
                    echo "<input style='display:none;' value='{$preciov}' name='preciov[]'/>";
                    echo "<input style='display:none;' value='{$x}' name='x[]'/>";
                    echo "<input style='display:none;' value='{$producto}' name='producto[]'/>";
 
                    echo "<tr>";
                    echo "<td align='left'> $producto </td>";
                    echo "<td align='left'> $preciov </td>";
                    echo "<td align='center'>$x</td>";
                    echo "<td align='center'>";
                    echo "<a href='fact.php?id=". $id ."&action=add'><img src='img/add_fact.png' width='50' height='50' style='padding:0 0px 0 5px;' alt='Aumentar cantidad' /></a>";
                    //Controlamos el display para cuando se vaya a eliminar el producto de la factura o bien
                    //se vaya a reducir la cantidad.
                    //if ($x > 1)
                        echo "<a href='fact.php?id=". $id ."&action=remove' ><img src='img/remove_fact.png' width='50' height='50' alt='Reducir cantidad' /></a>";
                    //else
                        echo "<a href='fact.php?id=". $id ."&action=removeProd'><img src='img/close_fact.png' width='50' height='50' alt='Reducir cantidad' /></a></td>";
                   
                    echo "<td align='left'> = </td>";
                    echo "<td align='right' style='margin-left:10px'>$coste L";
                    echo "<td ></td>";
                    echo "</tr>";
                }
               
                echo "<tr><td colspan='5'><hr></td></tr>";
                echo "<tr>";
                function generarcodigo($longitud) {
 $key = '';
 $pattern = '1234567890';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0999,$max)};
 return $key;
}?>
<?php { ?><td>Codigo de Factura: <input type='text' name='codigo' placeholder='Codigo de factura' Value='<?php echo generarcodigo(5);?>' readonly='readonly' required></td>
 
           
               
               
                <?php }?><td>Nombre del cliente: <select name="clientes">
          <?php
          while($fila1=mysql_fetch_array($rst_clientes)){
             echo "<option value='".$fila1["nombre"]."'>".$fila1["nombre"]."</option>";
          }
          mysql_close("$conexion");
          ?>
          </select></td>
               
         
          <td>Direccion del cliente: <input type='text' name='direccion' placeholder='Direccion del cliente' required></td>
          <?php
                //INPUTS OCULTOS CON VALORES DE FACTURA
   
                echo "<input style='display:none;' value='{$coste}' name='coste'/>";
                echo "<input style='display:none;' value='{$totalcoste1}' name='totalcoste1'/>";
				 echo "<input style='display:none;' value='{$totalcoste}' name='totalcoste'/>";
                echo "<input style='display:none;' value='{$descuento}' name='descuento'/>";
                echo "<input style='display:none;' value='{$saldo}' name='saldo'/>";
 
                echo "<td align='right'>Subtotal = </td>";
 
                echo "<td align='right' colspan='3'><b> $totalcoste  L</b></td>";
                echo "<tr></tr>";
                echo "<td></td>";
                echo "<td ></td>";
 
                echo "<td ></td>";
                echo "<td></td>";
                echo "<tr></tr>";
                echo "<td>RTN <input name='rtn' type='number' placeholder='Ingrese su RTN' required></td>";
                echo "<td>Fecha: <input name='fecha' type='date'></td>";
                echo "<td></td>";
                echo "<td align='right' colspan='2'>Impuesto 15% =  </td>";
                echo "<td align='right' colspan='3'><b><br>$totalcoste1 L </b> </td>";
                echo "</tr>";
                echo "<tr></tr>";
                echo "<td></td>";
 
                echo "<td align='right' colspan='3'>Descuento 10% =</td>";
                echo "<td align='right' colspan='2'><b><br> $descuento L </b> </td>";
 
                //BOTON COMPRAR
                echo "<tr>";
                echo "</tr>";
                echo "<tr></tr>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td align='right'>Total =</td>";
                echo "<td align='right' colspan='3'><b><br>$saldo L </b> </td>";
                echo "</tr>";
                echo "<td align='right'><td align='right'><td align='right'><td align='right'><td align='right'>
                <td>
                        <a href='comprar.php'><input type='submit' value='Finalizar' /></a>
                </td>";
                echo "</tr>";
 
                echo "</table></form>";
 
            }
            else
                echo "No hay productos en la factura";
 
            //Campos que nos serviran para informar la cesta de lo que llevamos comprados y que se mostrará en
            //la página PRODUCTOS.
            $_SESSION["totalcoste"] = $totalcoste;
            $_SESSION["cantidadTotal"] = $xTotal;
            echo "<p><a href='productos.php' ><img src='../logos/volver.png' align='middle'></a>";
            echo "<a href='../index.php' ><img src='../logos/inicio.png' width='130' height='55' align='middle'></a></p>";
       
        ?>
        </div> <!-- Cierro text-border -->
</div>
<p class="fondo">
  <!-- Cierro derecha -->
 
  <span class="fondo">
  <?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>
</span></p>