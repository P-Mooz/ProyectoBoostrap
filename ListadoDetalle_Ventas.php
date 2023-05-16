<?php
require('conexionBdConcesionario.php');
$conn=mysqli_connect($server, $user, $pass, $bd);
$sql = "Select ventas.idventa, ventas.NomProd, ventas.cantidad, ventas.Precio2, ventas.MontoTotal, ventas.fecha, cliente.IdCli, cliente.NomCli, cliente.Ruc from ventas 
inner join cliente on ventas.IdCli=cliente.IdCli";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);


//echo '<a href="Detalle_Venta.html">Agregar</a><p>';

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Detalle_de_Ventas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
      
            <div class="container mt-5">
                    <div class="row"> 

                        <div class="col-md-8">
                      
                         <?php echo '<h2> Detalles de Ventas</h2>'; ?>  <a class="btn btn-danger btn-block"  href="Dashboard.php">Menu </a>
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Idventa</th>
                                        <th>NombreProducto</th>
                                        <th>Cantidad</th>
                                        <th>MontoTotal</th>
                                        <th>IdCliente</th>
                                        <th>NombreCliente</th>
                                        <th>Ruc</th>
                                        <th>Fecha</th>

                                       
                                    </tr>
                                </thead>
                             
                                <tbody>
                                        <?php
                                                    while($row=mysqli_fetch_array($query)){
                                                       
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['idventa']?></th>
                                                <th><?php  echo $row['NomProd']?></th> 
                                                <th><?php  echo $row['cantidad']?></th>
                                                <th><?php  echo $row['MontoTotal']?></th>  
                                                <th><?php  echo $row['IdCli']?></th>
                                                <th><?php  echo $row['NomCli']?></th>
                                                <th><?php  echo $row['Ruc']?></th>  
                                                <th><?php  echo $row['fecha']?></th>                              
                                            </tr>
                                        <?php 
                                        
                                            }
                                        
                                        ?>
                                        
                                </tbody>
                               

                               
                        </div>
                    </div>  
            </div>
    </body>
</html>