<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['correo'])) {
    echo '<script>';
    echo 'alert("Inicia sesion primero");';
    echo 'window.location.href="index.php";';
    echo '</script>';
}
$correo = $_SESSION['correo'];


$sql = "SELECT * from usuarios where correo = '$correo'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Galeria</title>
    <script type="text/javascript">
        function ConfirmSession() {
            var respuesta = confirm("¿Está seguro que desea cerrar sesión?");
            if (respuesta == true) {

                return true;
            } else {
                return false;
            }
        }
    </script>
</head>

<body>
    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="logueado.php">
                    <img src="img/logo.png" alt="logo spaweb">
                </a>


                <div id="navegacion" class="navegacion ">
                    <a style="color: white;">Bienvenido <?php echo utf8_decode($row['correo']); ?></a>

                    <a href="galeria.php">Galeria</a>
                    <a href="#">Anuncios</a>
                    <a href="cerrarsesion.php" onclick="return ConfirmSession()">Cerrar Sesión</a>


                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class=" row">

            <div class="col s12">
                <h2 class="center-align">Galería</h2>
                <div class="carousel center-align">
                    <div class="carousel-item"  style="width:500px">
                        <img src="img/galeria/galeria1.jpg" style="width:500px" alt="">
                    </div>

                    <div class="carousel-item" style="width:500px">
                        <img src="img/galeria/galeria2.jpg" style="width:500px"alt="">

                    </div>

                    
                    <div class="carousel-item" style="width:500px">

                        <img src="img/galeria/galeria4.jpg" style="width:500px"alt="">

                    </div>
                    <div class="carousel-item" style="width:500px" >
                        <img src="img/galeria/galeria5.jpg"style="width:500px" alt="">

                    </div>
                    <div class="carousel-item" style="width:500px">
                        <img src="img/galeria/galeria6.jpg" style="width:500px"alt="">

                    </div>
                    <div class="carousel-item" style="width:500px">
                        <img src="img/galeria/galeria7.jpg" style="width:500px"alt="">

                    </div>
                    <div class="carousel-item" style="width:500px">
                        <img src="img/galeria/galeria8.jpg"style="width:500px" alt="">

                    </div>
                    <div class="carousel-item" style="width:500px">
                        <img src="img/galeria/galeria9.jpg"style="width:500px" alt="">

                    </div>
                    <div class="carousel-item" style="width:500px">
                        <img src="img/galeria/galeria10.jpg"style="width:500px" alt="">

                    </div>
                </div>

            </div>

        </div>
    </div>



    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <div class="navegacion">
                <a href="#">¿Quienes somos?</a>
                <a href="#">Terminos y Condiciones</a>
                <a href="#">Contacto</a>
            </div>
            <p class="copyright">Todos los Derechos Reservados 2021 &copy; </p>
        </div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/galeria.js"></script>
</body>

</html>