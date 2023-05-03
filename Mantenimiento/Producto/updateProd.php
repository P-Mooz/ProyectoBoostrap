<?php
require('conexionBdConcesionario.php');
$conn=mysqli_connect($server, $user, $pass, $bd);
  $cod_producto=$_POST['Cod'];
  $nom=$_POST['Nom'];
  $precio=$_POST['Pre'];
  $stock=$_POST['Stock'];
  $existentes=$_POST['existentes'];
  
  
  $imagen=$_FILES['imagen']['name'];
  $ruta=$_FILES['imagen']['tmp_name'];
  $destino="imagen/".$imagen; 
  copy($ruta,$destino);

    $sql="UPDATE productotrue SET  NomProducto='$nom', Precio2='$precio', Stock2='$stock', existentes='$existentes', imagen='$destino' WHERE idproducto='$cod_producto'";
    #$sql="CALL ActualizaProducto2('$nom', '$precio', '$stock','$Cantidad','$destino')";
    $query=mysqli_query($conn,$sql);

    if($query){
        Header("Location:Producto.php");
    }
?>