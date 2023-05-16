<html>
<head>
<meta charset="utf-8">
<title>Registro Proveedor</title>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert2.css"/>
</head>
<body>

<?php
 require('conexionBdConcesionario.php');
 $Dn = $_POST["txtDNI"];
 $Nom = $_POST["txtNomb"];
 $Tel = $_POST["txtTele"];
 $Corr = $_POST["txtCore"];
 $Mens = $_POST["txtMens"];
 

 date_default_timezone_set("America/Lima");
 $Fecha = date("Y/m/d h:i a");


 $sql = "CALL InsertaContacto('$Dn','$Nom','$Tel','$Corr','$Mens','$Fecha')";

 if (mysqli_query($conn,$sql))
{
 echo '<script>
 swal({
 title: "Buen trabajo",
 text: "Información Guardada Correctamente",
 type: "success"
 }).then(function() {
 window.location = "WebPrincipal.html";
 });
 </script>';
// cambiando la linea 29 donde muestra la informacion de contacto  window.location = "ListadoContacto.php";
    }
    else
    {
     echo 'Error: '.mysqli_error($conn);
    }
    mysqli_close($conn);
   ?>
</body>
</html>
