<?php

require('conexionBdConcesionario.php');
      $conn=mysqli_connect($server, $user, $pass, $bd);

$cod_marca=$_GET['id'];

$sql="CALL EliminaMarca('$cod_marca')";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location:Crud_marca.php");
    }
?>
