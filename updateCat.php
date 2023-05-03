 <?php

require('conexionBdConcesionario.php');
$conn=mysqli_connect($server, $user, $pass, $bd);

$cod_categoria=$_POST['Cod'];
$nom=$_POST['Nom'];

$sql="UPDATE categoria SET  NomCat='$nom' WHERE IdCat='$cod_categoria'";
#$sql="CALL ActualizaCategoria('$nom')";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location: categoria.php");
    }
?>