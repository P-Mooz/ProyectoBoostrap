
 <?php
    require('conexionBdConcesionario.php');
    $conn=mysqli_connect($server, $user, $pass, $bd);
  $query3= mysqli_query($conn,"SELECT productotrue.idproducto,productotrue.NomProducto,productotrue.Precio2,productotrue.Stock2,productotrue.existentes,productotrue.imagen, marca.NomMar, categoria.NomCat FROM productotrue 
  inner join marca on productotrue.Idmar=marca.IdMar
  inner join categoria on productotrue.Idcat=categoria.Idcat;");
  $result = mysqli_num_rows($query3); 
   // $sql="SELECT idproducto, NomProducto,Precio2,Stock2,cantidad2,imagen from productotrue";
    //$sql="SELECT * FROM `productotrue` WHERE 1";
    //$sql="CALL ListaProductos";
 //   $query=mysqli_query($conn,$sql);
   // $row=mysqli_fetch_array($query);
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
                            <h1>Ingrese Producto</h1>
                                <form action="insertarProd.php" method="POST" enctype="multipart/form-data">

                                    <input type="text" class="form-control mb-3" name="Cod" placeholder="Codigo Producto">
                                    <input type="text" class="form-control mb-3" name="Nom" placeholder="Nombre">
                                    <input type="text" class="form-control mb-3" name="Pre" placeholder="Precio">
                                    <input type="text" class="form-control mb-3" name="Stock" placeholder="Stock">
                                    <input type="text" class="form-control mb-3" name="existentes" placeholder="existentes">
                                    <input  type="file" class="form-control mb-3" name="imagen" placeholder="imagen">
                              
                                    
                                    <select name="select_marca" class="form-control  mb-3 ">
                                    <?php
                                     require('conexionBdConcesionario.php');
                                     $conn=mysqli_connect($server, $user, $pass, $bd);
                                      $query= mysqli_query($conn,"SELECT * FROM marca");
                                      $query2= mysqli_query($conn,"SELECT * FROM categoria");
                                      $result2=mysqli_num_rows($query2);
                                      $result = mysqli_num_rows($query); 
                                            while($row=mysqli_fetch_array($query)){
                                                    $id= $row['IdMar'];
                                                    $marca= $row['NomMar'];
                                                ?>
                                                <option value="<?php echo $id; ?>"><?php echo $marca; ?>  </option>
                                                <?php 
                                            }
                                        ?>
                                        
                                    </select> 
                                    
                                    <select  name="select_categoria" class="form-control  mb-3 "> 

                                    <?php 
                                                 while($row2=mysqli_fetch_array($query2)){
                                                    $id2= $row2['IdCat'];
                                                    $categoria2= $row2['NomCat'];
                                                ?>
                                                <option value="<?php echo $id2; ?>"><?php echo $categoria2; ?></option>
                                                <?php 
                                            }
                                        ?>             


                                    </select>
                                    
                                    <input type="submit" class="btn btn-primary">
                                    <a class="btn btn-danger btn-block"  href="../../Dashboard.php">Menu </a>
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Existentes</th>
                                        <th>Marca</th>
                                        <th>Categoria</th>
                                        <th>Imagen</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row3=mysqli_fetch_array($query3)){
                                        ?>
                                            <tr>
                                                <th><?php echo $row3['idproducto']?></th>
                                                <th><?php  echo $row3['NomProducto']?></th>
                                                <th>S/<?php  echo $row3['Precio2']?></th>
                                                <th><?php  echo $row3['Stock2']?></th>
                                                <th><?php  echo $row3['existentes']?></th>  
                                                <th><?php  echo $row3['NomMar']?></th> 
                                                <th><?php  echo $row3['NomCat']?></th>   
                                                <th><?php echo '<img width="50px" src="'.$row3['imagen'].'">'?></th>
                                                <?php // FALTA MOSTRAR LA IMAGEN EN EL CRUD, ALPARECER NO ENCUENTRA DESTINO, FALTA LOS MATENIMIENTOS ADECUADOS PORQUE SE ACTUALIZO LA TABLA PRODUCTO ?>
                                                <th><a href="actualizarProd.php?id=<?php echo $row3['idproducto'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="deleteProd.php?id=<?php echo $row3['idproducto'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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