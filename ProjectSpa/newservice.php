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
<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>Nuevo Servicio</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    </script>
    
    <script type="text/javascript">
        //Metodo para que registre dos decimales ej 0.00
        $(document).ready(function() {
            $(".floatNumberField").change(function() {
                $(this).val(parseFloat($(this).val()).toFixed(2));
            });
        });

        function ConfirmSession() {
            var respuesta = confirm("¿Está seguro que desea cerrar sesión?");
            if (respuesta == true) {

                return true;
            } else {
                return false;
            }
        }
    </script>


    <style>
        .errorArchivo {
            font-size: 16px;
            font-family: arial;
            color: #cc0000;
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }
        .formulario {
            margin-left: 6rem;
        }
    </style>
</head>

<body class="">

    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="img/logo.png" alt="logo spaweb">
                </a>


                <nav id="navegacion" class="navegacion">
                    <a style="color: white;">Bienvenido <?php echo utf8_decode($row['correo']); ?></a>

                    <a href="galeria.php">Galeria</a>
                    <a href="#l">Anuncios</a>
                    <a href="cerrarsesion.php" onclick="return ConfirmSession()">Cerrar Sesión</a>
                </nav>
            </div>
        </div>
    </header>



    <br>
    <h2>Registro de Servicios</h2>





    <div class="container">
        <hr>

        <section class="main row">
            <article class="col-md-4">
            </article>

            <article class="col-md-4">
                <div class="card" style="width: 28rem;">
                    <div class="card-body" style="text-align:center;">
                        <h5 class="card-title" id="centrar">REGISTRAR SERVICIO</h5>



                        <form action="nuevoservicio.php" method="POST" enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="form-group col-md-6 formulario">
                                    <label for="producto">Nombre</label>
                                    <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" name="nombre" maxlength="20" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 formulario">
                                    <label for="producto">Descripción</label>
                                    <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" name="descripcion" maxlength="20" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 formulario">
                                    <label for="producto">Duracion</label>
                                    <input type="text" class="form-control" name="duracion" id="duracion" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 formulario">
                                    <label for="producto">Tipo de Servicio</label>
                                    <select class="form-control" name="tiposervicio" id="tiposervicio" required >
                                        <option value="VIP">VIP</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 formulario">
                                    <label for="precio">Precio</label>
                                    <input onkeyup="this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');" class="floatNumberField form-control" type="text" placeholder='0,00' name="precio" required>
                                </div>
                            </div>


                            <div class="photo ">
                                <input type="file" id="image" name="image" required>

                                <div id="form_alert"></div>
                            </div>




                            <input style="margin-top: 20px;" type="submit" class="btn btn-primary" value="Añadir Producto"></input>
                            <a href="precios.php"><input style="margin-top: 20px;" class="btn btn-danger " type="button" value="Cancelar"></a>
                        </form>





                    </div>

                </div>
            </article>


        </section>
    </div>

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

</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {

        //foto nuevo servicio
        $("#image").on("change", function() {
            var uploadFoto = document.getElementById("image").value;
            var foto = document.getElementById("image").files;

            var contactAlert = document.getElementById('form_alert');

            if (uploadFoto != '') {
                var type = foto[0].type;
                if (type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png') {
                    contactAlert.innerHTML = '<p style= "margin-bottom: 1px; margin-top: 20px;" class="errorArchivo">El archivo no es válido.</p>';
                    $('#image').val('');
                    return false;
                } else {
                    contactAlert.innerHTML = '';
                }
            }
        });

    });
</script>