<?php

require('conexionBdConcesionario.php');
$conn=mysqli_connect($server, $user, $pass, $bd);

$cod_producto=$_GET['id'];


#$sql="DELETE FROM producto  WHERE IdProd='$cod_producto'";
$sql="CALL EliminaCliente('$cod_producto')";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location: Cliente.php");
    }
?>
