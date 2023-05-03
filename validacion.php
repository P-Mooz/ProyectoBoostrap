<?php
$usuario = $_POST['email'];
$contraseña = $_POST['password'];
session_start();
$_SESSION['email']=$usuario;
require('conexionBdConcesionario.php');
$conn=mysqli_connect($server, $user, $pass, $bd);

$sql="select * from usuario  where Login='$usuario' and Clave ='$contraseña'";
$result=mysqli_query($conn,$sql);
$filas=mysqli_num_rows($result);

if($filas){
    header("location:Dashboard.html");
}else{                    //  ./img/Ico_Login.png  ---- ./Mantenimiento/Cliente/Cliente.php
    ?>
    <?php
    include('Index2.html');
    ?>
    <h1> ERROR EN LA AUTENTIFICACION </h1>
    <?php
}
mysqli_free_result($result);
//mysql_close('conexionBdtienda.php');
?>
