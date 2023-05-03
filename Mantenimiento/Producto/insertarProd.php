<?php
require('conexionBdConcesionario.php');
$conn=mysqli_connect($server, $user, $pass, $bd);

$cod_producto=$_POST['Cod'];
$nom=$_POST['Nom'];
$precio=$_POST['Pre'];
$stock=$_POST['Stock'];
$existentes=$_POST['existentes'];
$marca=$_POST['select_marca'];
$categoria=$_POST['select_categoria'];

$imagen=$_FILES['imagen']['name'];
//$ruta=$_FILES['imagen']['tmp_name'];
$archivo=$_FILES['imagen']['tmp_name'];
$ruta ="imagen";
$ruta =$ruta."/".$imagen;

//$destino="imagen/".$imagen;
//copy($ruta,$destino);
move_uploaded_file($archivo,$ruta);

#$sql="INSERT INTO Producto #VALUES('$cod_producto','$nom','$precio','$stock','$codmar','$codcat')";
  
//$sql="CALL InsertaProductotrue('$nom','$precio','$stock','$Cantidad','$Marca','$destino')";
$sql= "INSERT Into productotrue(Idmar,Idcat,NomProducto, Precio2, Stock2,existentes,imagen)
values('$marca','$categoria','$nom', '$precio', '$stock','$existentes','$ruta')";
$query = mysqli_query($conn,$sql);
if($query){
    Header("Location: Producto.php");
    
}else {
    echo"ERROR NO SE GUARDO NADA";
}
?>