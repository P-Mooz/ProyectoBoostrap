<?php
  require('conexionBdConcesionario.php');
  $conn=mysqli_connect($server, $user, $pass, $bd);

$nom=$_POST['Nom'];
$Telef=$_POST['Tel'];
$Correo=$_POST['Mail'];
$Ruc=$_POST['Ruc'];


#$sql="INSERT INTO Producto #VALUES('$cod_producto','$nom','$precio','$stock','$codmar','$codcat')";
$sql="CALL InsertaCliente('$nom','$Telef','$Correo','$Ruc')";
$query= mysqli_query($conn,$sql);

if($query){
    Header("Location: Cliente.php");
    
}else {
}
?>