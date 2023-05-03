<?php

require('conexionBdConcesionario.php');
$conn=mysqli_connect($server, $user, $pass, $bd);

$cod_cliente=$_POST['Cod'];
$nom=$_POST['Nom'];
$Telef=$_POST['Tel'];
$Correo=$_POST['Mail'];
$Ruc=$_POST['Ruc'];

$sql="UPDATE cliente SET  NomCli='$nom', Telefono='$Telef', Correo='$Correo', Ruc='$Ruc' WHERE IdCli='$cod_cliente'";
#$sql="CALL ActualizaCliente('$nom','$Telef','$Correo','$Ruc')";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location: Cliente.php");
    }
?>