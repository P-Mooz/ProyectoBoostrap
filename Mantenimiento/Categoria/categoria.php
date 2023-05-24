<?php 
   require('conexionBdConcesionario.php');
   $conn=mysqli_connect($server, $user, $pass, $bd);

    $sql="select*from categoria";
    #$sql="INSERT INTO Categoria VALUES('$cod_marca','$nom')";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA CATEGORIA</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="../../excel.js"></script>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese Categoria</h1>
                                <form action="insertarCat.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="Cod" placeholder="Codigo Categoria">
                                    <input type="text" class="form-control mb-3" name="Nom" placeholder="Nombre">
                                    
                                    
                                    <input type="submit" class="btn btn-primary">
                                     <a class="btn btn-danger btn-block"  href="../../Dashboard.php">Menu </a>
                                     <a class="btn btn-success my-3" onclick="exportTableToExcel('tblData','members-data');"> EXCEL</a>
                                     
                                    
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" id="tblData" >
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
                                                <th><?php  echo $row['IdCat']?></th>
                                                <th><?php  echo $row['NomCat']?></th>   
                                                <th><a href="actualizarCat.php?id=<?php echo $row['IdCat'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="deleteCat.php?id=<?php echo $row['IdCat'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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