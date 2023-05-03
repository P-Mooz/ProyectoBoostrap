<?php

require('conexionBdConcesionario.php');
$conn=mysqli_connect($server, $user, $pass, $bd);

$cod_marca=$_GET['id'];

#$sql="CALL EliminaCategoria('$cod_marca')";
$sql="DELETE FROM categoria  WHERE IdCat='$cod_marca'";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location: categoria.php");
    }
?>
