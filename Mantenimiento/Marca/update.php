<?php

require('conexionBdConcesionario.php');
      $conn=mysqli_connect($server, $user, $pass, $bd);

$cod_marca=$_POST['Cod'];
$nom=$_POST['Nom'];

#$sql="UPDATE marca SET  NomMar='$nom' WHERE IdMar='$cod_marca'";
$sql="CALL ActualizaMarca('$nom')";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location:Crud_marca.php");
    }
?>