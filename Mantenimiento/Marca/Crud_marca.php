<?php 
      require('conexionBdConcesionario.php');
      $conn=mysqli_connect($server, $user, $pass, $bd);
    $sql="CALL ListaMarcas";
    #$sql="INSERT INTO Marca VALUES('$cod_marca','$nom')";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA MARCA</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese Marca</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="Cod" placeholder="Codigo Marca">
                                    <input type="text" class="form-control mb-3" name="Nom" placeholder="Nombre">
                                    
                                    
                                    <input type="submit" class="btn btn-primary">
                                    <a class="btn btn-danger btn-block"  href="../../Dashboard.html">Menu </a>
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['IdMar']?></th>
                                                <th><?php  echo $row['NomMar']?></th>   
                                                <th><a href="actualizar.php?id=<?php echo $row['IdMar'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['IdMar'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>