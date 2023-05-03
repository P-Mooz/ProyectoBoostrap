<?php
require('ConexionBdConcesionario.php');
$sql = "CALL ListaDetalle_Ventas";
$result = $conn->query($sql);
echo '<h2>Lista de Detalles de Venta</h2>';
echo '<a href="Detalle_Venta.html">Agregar</a><p>';

if ($result->num_rows > 0) 
{
echo "<table border=1><tr><th>N° Venta</th><th>Id Cliente</th>
      <th>Nombre de Cliente</th><th>Ruc</th><th>Id Producto</th><th>Nombre</th>
      <th>Precio</th><th>Monto Total</th><th>Fecha de Pedido</th>
      <th>Acciones</th></tr>";

while ($row = $result->fetch_assoc()) 
{
 echo "<tr><td><center>".$row["NumVenta"]."</center></td>
       <td><center>".$row["IdCli"]."</center></td><td><center>";
 echo $row["NomCli"]."</center></td><td><center>";
 echo $row["Ruc"]."</center></td><td><center>";
 echo $row["IdProd"]."</center></td><td><center>";
 echo $row["NomProd"]."</center></td><td>";
 echo $row["Precio"]."</center></td><td>";
 echo $row["MontoTotal"]."</center></td><td>";
 echo $row["FechaPed"]."</center></td><td>";
 echo "<a href=EditarDetalle_Venta.php?cod=".$row["NumVenta"].">Editar</a>";
 echo "<a href=EliminarDetalle_Venta.php?cod=".$row["NumVenta"].">Eliminar</a></td></tr>";
}
 echo ("</table>");
}
else
{
echo "No se muestra ningún resultado";
}
mysqli_close($conn);
?>