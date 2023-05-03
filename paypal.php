

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>

  <style>

          .caja-imagen{
            width: 100%;
           
            display: flex;
            justify-content: center;
            padding-top: 20px;
          }

      #img{
           
          }
          #paypal-button-container{
            display: flex;
            justify-content: center;
            margin-top:20px;
          }
        body{
            background: #ffe259;
            background: linear-gradient(to right, #ffa751,#ffe259);
        }
   </style>
    <script src="https://www.paypal.com/sdk/js?client-id=AYllSwQMEi-pV2OIKLPoeSXQitjmNnFC1BEe2XuyMETJv_bFahN6rUsy7JGNYBwRCYNs-6WAkXBuC3cP&currency=USD"></script>

  <div class="caja-imagen">  <img src="./img/automotive.jpg"  alt="logonavar" width="500px" id="img"></div>
    
  
         
      <?php
           session_start();
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
        //hasta aqui finaliza el error
        
       /*
        echo "Nombre  : " .$nom ."<br>";
        echo "El sub Total es : " .$total ."<br>";
        echo "El IGV es : " .$igv ."<br>";
        echo "El Total es : " .$total2."<br>";*/
      ?>
      
      
    <div  id="paypal-button-container"></div>
    <script>
      //aqui captura la variable total realizando un parse una conversion a una variable js para colocarlo como valor de producto que va cobrar 
       const valor=JSON.parse('<?php echo json_encode($total2);?>');
   
      
      paypal.Buttons({
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: valor
              }
            }]
          });
        },
     
        onApprove: (data, actions) => {
        
         
          return actions.order.capture().then(function(orderData) {
           // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2)); Muestra en console la información de la compra guardad en el parametro data
          //  const transaction = orderData.purchase_units[0].payments.captures[0];
            window.location.href="invoice.php";
          //  alert("CONCHATUMADRE SE HIZO EL PAGO");
           // alert("segunda alerta");
            //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nPago Completado por Paypal`); Para ver el estado del pago y el codigo de la transaccion
            
          });
          
        }
      }).render('#paypal-button-container');
      
     

    </script>
    
    <footer class="py-5 bg-dark">
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Phone</h4>
                <p>981110622</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>Carlos.G.Nicho@gmail.com</p>
            </div>
            <div class="content-foo">
                <h4>Location</h4>
                <p>Los Olivos</p>
            </div>

        </div>
        <h2 class="titulo-final">&copy; Nicho Beltan Carlos Gustavo</h2>
    </footer>
  </body>
</html>
