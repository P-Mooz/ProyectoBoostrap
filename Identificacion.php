<?php include "conexion.php";
  session_start();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Identificación Pre-Venta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="stilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body>

                

    <section class="d-flex justify-content-center align-items-center">
        <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4   p-4">
            <div class="mb-4 d-flex justify-content-start align-items-center">

                <h4><i class="bi bi-cart-check-fill"></i> &nbsp; Identificacion </h4>
            </div>
           

        
            <?php
                    $conn = require('ConexionBdConcesionario.php');
                     $query = mysqli_query($conexion,"SELECT IdCli FROM cliente");
                     $result = mysqli_num_rows($query);
                     ?>

            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
              
            <form  method="post" action="RegistrarCliente.php?IdCli=<?php=$data['IdCli'] ?>">
            <?php  } ?>
            <!--Nav Barra de Menu<input type="datetime" name="txtfecha" value="tags php y valor de fehca" > -->
      
                <div class="mb-1">
                
                       
                        <div class="mb-4">
                            <div>
                                <label for="nombre"> <i class="bi bi-person-fill"></i> Nombre</label>
                                <input type="text" class="form-control" name="txtNomb" id="nombre"
                                    placeholder="ej: Gabriel" required>
                                <div class="nombre text-danger "></div>
                            </div>

                        </div>
                        <div class="mb-4">
                            <label for="apellido"> <i class="bi bi-person-bounding-box"></i> Telefono</label>
                            <input type="text" class="form-control" name="txtTele" id="apellido"
                                placeholder="ej: 981110622 " required>
                            <div class="apellido text-danger"></div>
                        </div>

                        <div class="mb-4">
                            <label for="correo"><i class="bi bi-envelope-fill"></i> Correo</label>
                            <input type="text" class="form-control" name="txtCore" id="correo"
                                placeholder="ej: gpmcheco@mail.com" required>
                            <div class="correo text-danger"></div>

                        </div>

                        <div class="mb-4">
                            <label for="apellido"> <i class="bi bi-person-bounding-box"></i> Documento de Identidad
                            </label>
                            <input type="text" class="form-control" name="txtRuc" id="apellido"
                                placeholder="ej: 74850412 "required>
                            <div class="apellido text-danger"></div>
                        </div>

                        <div class="mb-4">
                            <label for="fecha"> <i class="bi bi-person-bounding-box"></i> Fecha
                            </label>
                            <input type="date" class="form-control" name="txtfecha" id="fecha"
                                placeholder="ej: 14/05/2023 "required>
                            <div class="apellido text-danger"></div>
                        </div>


                        <div class="d-grid gap-2" >
                            <button type="submit" name="add_to_cliente" id="exampleFormControlTextarea1"
                                class="btn btn-danger fs-5">Enviar</button>
                        </div>

                  
                </div>
              
            </form>
            
        </div>
    </section>
    <script src="index.js"></script>
</body>

</html>