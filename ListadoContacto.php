<?php
require('ConexionBdConcesionario.php');
$sql = "CALL ListaContactos";
$result = $conn->query($sql);
echo '<h2>Lista de Contactos</h2>';
## echo '<a href="Contactos.html">Agregar</a><p>';

if ($result->num_rows > 0) 
{
echo "<table border=1><tr><th>Dni</th><th>Nombre</th>
      <th>Telefono</th><th>Correo</th><th>Mensaje</th>
      <th>Acciones</th></tr>";

while ($row = $result->fetch_assoc()) 
{
 echo "<tr><td><center>".$row["Dni"]."</center></td>
       <td><center>".$row["Nombre"]."</center></td><td><center>";
 echo $row["Telefono"]."</center></td><td><center>";
 echo $row["Correo"]."</center></td><td><center>";
 echo $row["Mensaje"]."</center></td><td><center>";
 echo "<a href=EditarContacto.php?cod=".$row["Dni"].">Editar</a>";
 echo "<a href=EliminarContacto.php?cod=".$row["Dni"].">Eliminar</a></td></tr>";
}
 echo ("</table>");
}
else
{
echo "No se muestra ningún resultado";
}
mysqli_close($conn);
?>