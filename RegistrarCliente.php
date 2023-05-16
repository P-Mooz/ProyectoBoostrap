<html>
<head>
<meta charset="utf-8">
<title>Registro Cliente</title>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert2.css"/>
</head>
<body>

<?php

session_start();
if(isset($_POST['add_to_cliente'])){
   if (isset($_SESSION['cliente'] )){
        $session_array_id = array_column($_SESSION['cliente'], "IdCli");

        if (!in_array($_GET['IdCli'], $session_array_id)) {
           $session_array = array(
               'IdCli' => $_GET['IdCli'],
               "NomCli" => $_POST['txtNomb'],
               "Telefono" =>$_POST['txtTele'],
               "Correo" =>$_POST['txtCore'],
               "Ruc" =>$_POST['txtRuc'],
               "fecha" =>$_POST['txtfecha']

               
           );
           $_SESSION['cliente'][]=$session_array;
           
        }
   }else {
       $session_array = array(
           "IdCli" => $_GET['IdCli'],
           "NomCli" => $_POST['txtNomb'],
           "Telefono" =>$_POST['txtTele'],
           "Correo" =>$_POST['txtCore'],
           "Ruc" =>$_POST['txtRuc'],
           "fecha" =>$_POST['txtfecha']
       );
       $_SESSION['cliente'][]=$session_array;
       
   }
}

if (!empty($_SESSION['cliente'])) {
  foreach ($_SESSION['cliente'] as $key => $value) {
 

     // echo $value['idproducto'] ."<br>";
      $idcliente = $value['IdCli'];
      $nom_cli= $value['txtNomb'];
      $telefono_cli=$value['txtTele'];
      $correo_cli =$value['txtCore'];
      $dni_cli =$value['txtRuc'];
      $fecha =$value['txtfecha'];
  }            
}






 require('ConexionBdConcesionario.php');
 
 $Nombr = $_POST["txtNomb"];
 $Tele = $_POST["txtTele"];
 $Cor = $_POST["txtCore"];
 $Ru = $_POST["txtRuc"];
 $fec = $_POST["txtfecha"];

 


 $sql = "CALL InsertaCliente('$Nombr','$Tele','$Cor','$Ru','$fec')";

 if (mysqli_query($conn,$sql))
{
  Header("Location: paypal.php");
 }
 else
 {
  echo 'Error: '.mysqli_error($conn);
 }
 mysqli_close($conn);
?>
</body>
</html>

