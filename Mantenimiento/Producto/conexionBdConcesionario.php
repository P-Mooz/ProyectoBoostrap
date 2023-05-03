<?php
 $server = "localhost";
 $user = "root";
 $pass = "";
 $bd = "bdconcesionario";

 $conn = mysqli_connect($server, $user, $pass, $bd);
 if(!$conn){
	die("No conectado : " .mysqli_connect_error());
	
 }
	$conn -> set_charset('utf8');       

?>