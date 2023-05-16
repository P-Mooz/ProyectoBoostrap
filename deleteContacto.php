<?php 

require('conexionBdConcesionario.php');
$conn=mysqli_connect($server, $user, $pass, $bd);

$cod_producto=$_GET['id'];


$sql="DELETE FROM contactos  WHERE Idcontacto='$cod_producto'";
//$sql="CALL EliminaCliente('$cod_producto')";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location: Dashboard.php");
    }
?>
