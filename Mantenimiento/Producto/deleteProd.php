<?php
require('conexionBdConcesionario.php');
$conn=mysqli_connect($server, $user, $pass, $bd);
$cod_producto=$_GET['id'];


$sql="DELETE FROM productotrue  WHERE idproducto='$cod_producto'";
#$sql="CALL EliminaProducto('$cod_producto')";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location:Producto.php");
    }
?>
