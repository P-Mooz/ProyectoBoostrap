<?php include "conexion.php";
  session_start();

  require('conexionBdConcesionario.php');
  $conn=mysqli_connect($server, $user, $pass, $bd);
$query3= mysqli_query($conn,"SELECT productotrue.idproducto,productotrue.NomProducto,productotrue.Precio2,productotrue.Stock2,productotrue.existentes,productotrue.imagen, marca.NomMar, categoria.NomCat FROM productotrue 
inner join marca on productotrue.Idmar=marca.IdMar
inner join categoria on productotrue.Idcat=categoria.Idcat;");
$result = mysqli_num_rows($query3); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>

</head>
<!--Nav Barra de Menu -->

<body>
 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="./img/automotive.jpg" alt="logonavar" width="50px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="WebPrincipal.html">NOSOTROS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="WebContacto.html">CONTÁCTENOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="WebProducto3copy.php">PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="Index2.html"><img src="./img/Ico_Login.png" alt="Login"
                                    width="30px"></a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-light" type="submit"><img src="./img/Icon_Buscar.png" alt="Ico_buscar"
                                width="30px"></button>
                    </form>
                </div>
            </div>
        </nav>
        <!--Carrucel -->

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="./img/FarosDelanteros_True.png" class="d-block w-100" alt="Faros_1">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="./img/Parachoques_True.png" class="d-block w-100" alt="Parachoques_2">
                </div>
                <div class="carousel-item">
                    <img src="./img/Espejos_true.png" class="d-block w-100" alt="Espejos_3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden ">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
  
    <!--Se comienza a subir los productos  -->
    <p class=" bg-primary text-white text-center p-2"> <img src="./img/Icon_Asesor.png" alt="Asesor" width="70">
        PRODUCTOS </p>

        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                    $conn = require('ConexionBdConcesionario.php');
                     $query= mysqli_query($conexion,"SELECT * FROM productotrue");
                     $result = mysqli_num_rows($query);

                     ?>
                  
                   
                
                               
                   <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                    <?php while($row3=mysqli_fetch_array($query3)){?>
                   
                    <form name="formulario" method="post" action="carrito.php?idproducto=<?=$row3['idproducto'] ?>">

                    

                            <div class="blog-post text-center ">

                                
                            <img class="card-img-top" width="20px" height="300px" <?php echo 'src="./Mantenimiento/Producto/'.$row3['imagen'].'"'?>>"
                               
                              
                                
                        
                               <!-- poner tag de php inicio y cierre // codigo alterno para mostrar la carta en img- echo '<img class="card-img-top" width="20px" height="300px" src="'.$data['imagen'].'">' -->

                                <h5 class="fw-bolder">  <p>Nombre : <?php echo  $row3["NomProducto"];?></p></h5>
                                <input name="NomProducto" type="hidden" id="NomProducto" value="<?php echo $row3['NomProducto']; ?>"/>
                                <h5>Precio : <?php echo $row3['Precio2']; ?></h5>
                                <input class="form-control"  name="Precio2" type="hidden" id="Precio2" value="<?php echo $row3['Precio2']; ?>"/>
                                <input type="number" name="quantity" value="1" class="form-control"/>
                                <input class="btn btn-warning btn-block my-3" name="add_to_cart" type="submit" value="Add To Cart">
                                
                            </div>
                
                    </form>
                    <?php } ?>
                <?php  } ?>
            </div>
        </div>
        <footer>
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
                    

    
                  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>