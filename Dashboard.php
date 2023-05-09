<?php
require('conexionBdConcesionario.php');
$conn=mysqli_connect($server, $user, $pass, $bd);
$sql = "select * from ventas";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);

//echo '<a href="Detalle_Venta.html">Agregar</a><p>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  
   

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="styleDash.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    
    
    <title>Dashboard Automotive</title> 
</head>
<body>
     
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="./img/logoDash.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Automotive</span>
                    <span class="profession">Web</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="./Mantenimiento/Cliente/Cliente.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Cliente</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./Mantenimiento/Marca/Crud_marca.php">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Marca</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./Mantenimiento/Categoria/categoria.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Categoria</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="./Mantenimiento/Producto/Producto.php">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Producto</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="ListadoDetalle_Ventas.php">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Ventas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="Index2.html">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">
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
 //echo "<a href=EditarContacto.php?cod=".$row["Dni"].">Editar</a>";
 //echo "<a href=EliminarContacto.php?cod=".$row["Dni"].">Eliminar</a></td></tr>"
 echo "<a href=?cod=".$row["Dni"].">Eliminar</a></td></tr>";
}
 echo ("</table>");
}
else
{
echo "No se muestra ningún resultado";
}
mysqli_close($conn);
?>
            </div>
    </section>

    <script src="Dashboard.js"></script>

</body>
</html>