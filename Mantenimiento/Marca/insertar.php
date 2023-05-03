<?php
require('conexionBdConcesionario.php');
$conn=mysqli_connect($server, $user, $pass, $bd);

$cod_marca=$_POST['Cod'];
$nom=$_POST['Nom'];


#$sql="INSERT INTO Marca VALUES('$cod_marca','$nom')";
$sql="CALL InsertaMarca('$cod_marca','$nom')";
$query= mysqli_query($conn,$sql);

if($query){
    Header("Location:Crud_marca.php");
    
}else {
}
?>