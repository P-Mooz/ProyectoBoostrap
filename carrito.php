<?php require_once "conexion.php";
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Carrito de Compras</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> 
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
</head>

<body>
 
    
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Carrito</h1>
                <p class="lead fw-normal text-white-50 mb-0">Tus Productos Agregados.</p>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <h2></h2>
                               
                                    <h2>AQUIII MRDD VAMOS UGG</h2>
                    <div class="col_md-6"> 
                   <?php 
                   $output = "";
                   $output .="
                    <table class ='table table-bordered table-striped'>
                    <tr>
                    <th>#Codigo </th>                                    
                    <th>Producto </th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                     <th>Sub Total</th>  
                    </tr>
                        ";
                   $total=0;

                   // desde aqui esta botando el error, el problema esta ocurriendo en el la sessión carrito cuando muestra el contenido bota error
                   if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $output .="
                        <tr>  
                        <td>".$value['idproducto']."</td>
                        <td>".$value['NomProducto']."</td>
                        <td>".$value['Precio2']."</td>
                        <td>".$value['quantity']."</td>
                        <td>$".number_format((int)$value['Precio2'] * (int)$value['quantity'],2)."</td> 
                        <td>
                        <a href='carrito.php?action=remove&idproducto=".$value['idproducto']."'>
                        <button class= 'btn btn-danger btn-block'>Remove</button>
                        </a>
                        </td>
                        ";
                        $total = $total + $value['quantity'] * $value['Precio2'];
                       
                    }
 
                    $output .="
                    <tr>
                    <td colspan='3'></td>
                    <td>
                    <button class='btn btn-warning'>Eliminar todo</button>
                    </a>
                    </tr>
                    
                    ";
                    
                 }
                //hasta aqui finaliza el error
                echo $output;   
                   ?>
                    </div>
                    <?php 
                
                if (isset($_GET['action'])) {                                             
                    if ($_GET['action'] == "clearall") {
                        unset($_SESSION['cart']);
                    }
               
                
                if ($_GET['action'] == "remove") {
                    foreach($_SESSION['cart'] as $key => $value){
                        if ($value['idproducto'] == $_GET['idproducto']) {
                            unset($_SESSION['cart'][$key]);
                        }
                    }
                }
            } 
                
                ?>      
                    <!-- Aqui se calcula el igv total, tambien se llena la tabla de ventas que es para la factura-->
                    <?php  $igv = $total * 0.18;
                        $total2 = $total + $igv; 
                    
                        ?>
                        </thead>  
                        </table>
                        <div class="col-md-5 ms-auto">
                        <h4><?php echo "Sub Total: S./".number_format($total,2); ?></h4>
                        <h4><?php echo "IGV (18 %): S./".number_format($igv,2); ?></h4>
                        <h4><?php echo "Total a Pagar: S./".number_format($total2,2); ?></h4>
                        <div class="d-grid gap-2">
                        <div id="paypal-button-container"></div>
                        <a type="button" class="btn btn-primary" href="Identificacion.php">Continuar</a>
                         <a type="button" class="btn btn-warning" id="btnVaciar" href="carrito.php?action=clearall">Vaciar Carrito</a> 
                        <a type="button" class="btn btn-primary" href="WebProducto3copy.php">Seguir Comprando</a>
                    </div>
                    
                </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white"> Carlos Nicho Beltran &copy;  Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
    </script>
</body>

</html>