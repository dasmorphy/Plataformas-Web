<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['correo'])) {
    header("location: index.php");
}

$id_user = $_SESSION['correo'];
$sql = "SELECT correo from usuarios where correo = '$id_user'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/styles.css">
    <title>SpaWeb</title>
    <style>
        .sucursales {
            color: chocolate;
        }
        .button-center {
            display: flex;
            margin-left: 4rem;
            margin-bottom: 10px;
            
        }
        .ubicacion{
            display: flex;
            float: right;
            height: 280px;
        }

    </style>
</head>
<script type="text/javascript">
    function ConfirmSession() {
        var respuesta = confirm("¿Está seguro que desea cerrar sesión?");
        if (respuesta == true) {

            return true;
        } else {
            return false;
        }
    }

    function ConfirmDelete() {
        var respuesta = confirm("¿Está seguro que desea eliminar este servicio?");
        if (respuesta == true) {

            return true;
        } else {
            return false;
        }
    }
</script>

<body>

    <header class="site-header inicio animate__animated animate__fadeInUp">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="img/logo.png" alt="logo spaweb">
                </a>



                <nav id="navegacion" class="navegacion">
                    <a >Bienvenido <?php echo utf8_decode($row['correo']); ?></a>
                    
                    <a href="galeria.php">Galeria</a>
                    <a href="#">Anuncios</a>
                    <a href="cerrarsesion.php" onclick="return ConfirmSession()">Cerrar Sesión</a>


                </nav>
            </div>
            <h1>Servicios de Spa</h1>
        </div> <!-- contenedor -->
    </header>
   

    <div class="container ">

        <h2 style="margin-top: 40px;">Nuestros Servicios</h2>
        <hr>


        <a href="newservice.php"><input style="margin-right: 61.3rem;" class="back btn btn-primary" type="button" value="Nuevo Servicio"></a>
        <br><br>
        <section class="row">

            <?php
            $sql = "SELECT * from servicios";
            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($result)) {

            ?>
                <article class="col-md-4 wow animate__animated animate__fadeInUp">

                    <div class="card" style="width: 18rem; background-color:#eeebeb; ">
                        <!--height: 100%; para que todos los servicios tengan el mismo tamaño-->
                        <img style="height: 300px;" src="data:image/jpg;base64, <?php echo base64_encode($mostrar['imagen']); ?>" />

                        <div class="card-body ">
                            <td><?php echo $mostrar['nombre'] ?></td><br>
                            <td><?php echo $mostrar['descripcion'] ?></td><br>


                            <div class="contenido-anuncio">
                                <ul class="iconos-caracteristicas">
                                    <li>
                                        <img src="img/dinero.png" alt="icono dinero">
                                        <p>$<?php echo $mostrar['precio'] ?></p>
                                    </li>
                                    <li>
                                        <img src="img/tiempo.png" alt="icono tiempo">
                                        <p><?php echo $mostrar['duracion'] ?></p>
                                    </li>
                                    <li>
                                        <img src="img/vip.png" alt="icono vip">
                                        <p>VIP</p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="button-center">

                            <a href="#"><input style="margin-right: 6px;" class="btn btn-primary " type="button" value="Editar"></a>

                            <a href="#"><input class="btn btn-danger " type="button" onclick="return ConfirmDelete()" value="Eliminar"></a>
                        </div>


                    </div>


                </article>

            <?php } ?>
        </section>

    </div>

    <section class="imagen-contacto">
        <div class="container contenido-contacto">
            <h2>Horarios</h2>
                <p>Lunes a Viernes (9h00 a 21h00)</p>
                <p>Sabados (9h00 a 18h00)</p>
                
                <p>  Domingos (No hay atención)</p>

                
               
            <a href="reservacion.php" class="btn btn-warning">¡Reserva tu servicio ahora!</a>
        </div>
    </section>



    <br><br>
    <div class="container ">
        <h3 style="margin-top: 40px;">Ubicación</h3>
        <hr>
    </div>
    
    <div class="container">
        <img class="ubicacion" src="img/ubicacion.svg" alt="ubicacion">
        <h4>Visita nuestras sucursales</h4>
        <p class="sucursales">Sucursal Norte</p>
        <p>Estamos ubicados en Calle 18j No (Felipe Pezo) Y 1er Pasaje 32 No (1er Pasaje 32) atrás del City Mall</p>
        <p class="sucursales">Sucursal Centro</p>
        <p>Estamos ubicados en Eloy Alfaro y Cristobal Colon, al lado de Almacenes Las Américas</p>
        <p class="sucursales">Sucursal Sur</p>
        <p>Estamos ubicados en Floresta 2, cerca del Tía</p>
    
    </div>
    <br><br>
    <iframe class="container card" src="https://www.google.com/maps/d/embed?mid=1KLi5oyfJJQwoTgaKNVu_BHoYQbssHS0z&ehbc=2E312F" width="640" height="480"></iframe>
           
    




    <br>
    <br>
    <br>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="#">¿Quienes somos?</a>
                <a href="#">Terminos y Condiciones</a>
                <a href="#">Contacto</a>
            </nav>
            <p class="copyright">Todos los Derechos Reservados 2021 &copy; </p>
        </div>
    </footer>

    <script src="https://wowjs.uk/dist/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>