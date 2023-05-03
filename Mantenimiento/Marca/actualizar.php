<?php 
  require('conexionBdConcesionario.php');
  $conn=mysqli_connect($server, $user, $pass, $bd);


$id=$_GET['id'];

$sql="SELECT * FROM marca WHERE IdMar='$id'";
$query=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="Cod" value="<?php echo $row['IdMar']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="Nom" placeholder="Nombre marca" value="<?php echo $row['NomMar']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                            <a class="btn btn-danger btn-block"  href="Crud_marca.php">Menu </a>
                    </form>
                    
                </div>
    </body>
</html>