

<?php

session_start();

// datos de cliente en sesiones.


if(isset($_POST['add_to_cliente'])){
   if (isset($_SESSION['cliente'] )){
        $session_array_id = array_column($_SESSION['cliente'], "IdCli");

        if (!in_array($_GET['IdCli'], $session_array_id)) {
           $session_array = array(
               'IdCli' => $_GET['IdCli'],
               "NomCli" => $_POST['txtNomb'],
               "Telefono" =>$_POST['txtTele'],
               "Correo" =>$_POST['txtCore'],
               "Ruc" =>$_POST['txtRuc']

               
           );
           $_SESSION['cliente'][]=$session_array;
           
        }
   }else {
       $session_array = array(
           "IdCli" => $_GET['IdCli'],
           "NomCli" => $_POST['txtNomb'],
           "Telefono" =>$_POST['txtTele'],
           "Correo" =>$_POST['txtCore'],
           "Ruc" =>$_POST['txtRuc']
       );
       $_SESSION['cliente'][]=$session_array;
       
   }
}

if (!empty($_SESSION['cliente'])) {
  foreach ($_SESSION['cliente'] as $key => $value) {
 

     // echo $value['idproducto'] ."<br>";
      $nom_cli= $value['NomCli'];
      $telefono_cli=$value['Telefono'];
      $correo_cli =$value['Correo'];
      $dni_cli =$value['Ruc'];
  }            
}








// datos de carrito en sesion
if(isset($_POST['add_to_cart'])){
   if (isset($_SESSION['cart'] )){
        $session_array_id = array_column($_SESSION['cart'], "idproducto");

        if (!in_array($_GET['idproducto'], $session_array_id)) {
           $session_array = array(
               'idproducto' => $_GET['idproducto'],
               "NomProducto" => $_POST['NomProducto'],
               "Precio2" =>$_POST['Precio2'],
               "quantity" =>$_POST['quantity']
               
           );
           $_SESSION['cart'][]=$session_array;
           
        }
   }else {
       $session_array = array(
           "idproducto" => $_GET['idproducto'],
           "NomProducto" => $_POST['NomProducto'],
           "Precio2" =>$_POST['Precio2'],
           "quantity" =>$_POST['quantity']
       );
       $_SESSION['cart'][]=$session_array;
       
   }
}



if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
   

       // echo $value['idproducto'] ."<br>";
        $nom= $value['NomProducto'];
        $precio=$value['Precio2'];
        $cantidad =$value['quantity'];
        number_format((int)$value['Precio2'] * (int)$value['quantity'],2);
        $total = $value['quantity'] * $value['Precio2'];
        $igv = $total * 0.18;
        $total2 = $total + $igv; 
        $pago=0;
        
     
    }            
 }

 			require('conexionBdConcesionario.php');
				 $conn=mysqli_connect($server, $user, $pass, $bd);

				$sql="INSERT INTO ventas (`NomProd`, `Precio2`, `cantidad`, `Subtotal`, `IGV`, `MontoTotal`) VALUES('$nom','$precio','$cantidad','$total','$igv','$total2')";
				$query= mysqli_query($conn,$sql);


				
/*if($query){ 
 echo "<br>Se lleno la base datos con la compra"; 
// unset($_SESSION['cart']);
}else {
}*/




	# Incluyendo librerias necesarias #
	require "./code128.php";

	$pdf = new PDF_Code128('P','mm','Letter');
	$pdf->SetMargins(17,17,17);
	$pdf->AddPage();

	# Logo de la empresa formato png #
	$pdf->Image('./img/logo.png',165,12,35,35,'PNG');

	# Encabezado y datos de la empresa #
	$pdf->SetFont('Arial','B',16);
	$pdf->SetTextColor(32,100,210);
	$pdf->Cell(150,10,utf8_decode(strtoupper("Automotive S.A.C")),0,0,'L');

	$pdf->Ln(9);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,utf8_decode("RUC: 1060978392"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Lima Perú, Av Mexico 2023"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Teléfono: 981110622"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Email: carlos.g.nicho@gmail.com"),0,0,'L');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,7,utf8_decode("Fecha de emisión:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(116,7,utf8_decode(date("d/m/Y", strtotime("13-09-2022"))." ".date("h:s A")),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(35,7,utf8_decode(strtoupper("Factura Nro.")),0,0,'C');

	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(12,7,utf8_decode("Cajero:"),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(134,7,utf8_decode("Carlos Alfaro"),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode(strtoupper("1")),0,0,'C');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,utf8_decode("Cliente:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode($nom_cli),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(8,7,utf8_decode("Doc: "),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode("DNI:".$dni_cli),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(7,7,utf8_decode("Tel:"),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode($telefono_cli),0,0);
	$pdf->SetTextColor(39,39,51);

	$pdf->Ln(7);
/*
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(6,7,utf8_decode("Dir:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(109,7,utf8_decode("San Salvador, El Salvador, Centro America"),0,0);
*/
	$pdf->Ln(9);

	# Tabla de productos #
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(23,83,201);
	$pdf->SetDrawColor(23,83,201);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(90,8,utf8_decode("Descripción"),1,0,'C',true);
	$pdf->Cell(15,8,utf8_decode("Cant."),1,0,'C',true);
	$pdf->Cell(25,8,utf8_decode("Precio"),1,0,'C',true);
	$pdf->Cell(19,8,utf8_decode("Desc."),1,0,'C',true);
	$pdf->Cell(32,8,utf8_decode("Subtotal"),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);	

						


	/*----------  Detalles de la tabla  ----------*/
	$pdf->Cell(90,7,utf8_decode($nom),'L',0,'C');
	$pdf->Cell(15,7,utf8_decode($cantidad),'L',0,'C');
	$pdf->Cell(25,7,utf8_decode("$ ".$precio."USD"),'L',0,'C');
	$pdf->Cell(19,7,utf8_decode("$0.00 USD"),'L',0,'C'); 
	$pdf->Cell(32,7,utf8_decode("$".$total),'LR',0,'C');
	$pdf->Ln(7);
	/*----------  Fin Detalles de la tabla  ----------*/


	
	$pdf->SetFont('Arial','B',9);
	
	# Impuestos & totales #
	$pdf->Cell(100,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(32,7,utf8_decode("SUBTOTAL"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode("+ $".$total.".00 USD"),'T',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("IGV (18%)"),'',0,'C');
	$pdf->Cell(34,7,utf8_decode("+ $".$igv.".00 USD"),'',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');


	$pdf->Cell(32,7,utf8_decode("TOTAL A PAGAR"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode("$".$total2.".00 USD"),'T',0,'C');

	$pdf->Ln(7);
	/*
	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("TOTAL PAGADO"),'',0,'C');
	$pdf->Cell(34,7,utf8_decode("$100.00 USD"),'',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("CAMBIO"),'',0,'C');
	$pdf->Cell(34,7,utf8_decode("$30.00 USD"),'',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("USTED AHORRA"),'',0,'C');
	$pdf->Cell(34,7,utf8_decode("$0.00 USD"),'',0,'C');
	*/
	$pdf->Ln(12);

	$pdf->SetFont('Arial','',9);

	$pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,9,utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"),0,'C',false);

	$pdf->Ln(9);

	# Codigo de barras #
	$pdf->SetFillColor(39,39,51);
	$pdf->SetDrawColor(23,83,201);
	$pdf->Code128(72,$pdf->GetY(),"COD000001V0001",70,20);
	$pdf->SetXY(12,$pdf->GetY()+21);
	$pdf->SetFont('Arial','',12);
	$pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);

	# Nombre del archivo PDF #
	$pdf->Output("I","Factura_Nro_1.pdf",true);



	
	?>