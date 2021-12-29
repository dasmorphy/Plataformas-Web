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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@200&family=Signika+Negative&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Reservación</title>
    <style>
        .navegacion a {
            text-decoration: none;
        }

        .contenedor-boton {
            display: flex;
            align-items: center;
        }
    </style>
    
</head>

<body>
    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="logueado.php">
                    <img src="img/logo.png" alt="logo spaweb">
                </a>


                <nav id="navegacion" class="navegacion">
                    <a style="color: white;">Bienvenido <?php echo utf8_decode($row['correo']); ?></a>

                    <a href="galeria.php">Galeria</a>
                    <a href="#">Anuncios</a>
                    <a href="cerrarsesion.php" onclick="return ConfirmSession()">Cerrar Sesión</a>


                </nav>
            </div>
        </div>
    </header>


    <section class="row" style="margin-top: 3rem;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Datos del Cliente</h3>
                </div>
                <div class="card-body">
                    <form id="formCliente">

                        <div class="form-row">
                            <div class="col-md-6">
                                <!--//PRIMERA COLUMNA -->
                                <div class="form-group form-row">
                                    <label for="" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control " id="nombre" name="nombre">
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label for="" class="col-sm-2 ">Apellido</label>
                                    <!-- Tamaño del label -->
                                    <div class="col-sm-6">
                                        <!-- tamaño del input -->
                                        <input type="text" id="apellido" class="form-control" name="apellido">
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label for="" class="col-sm-2 ">Cédula</label>
                                    <!-- Tamaño del label -->
                                    <div class="col-sm-6">
                                        <!-- tamaño del input -->
                                        <input type="text" id="cedula" class="form-control" name="cedula" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="10">
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label for="" class="col-sm-2 ">Sucursal:</label>
                                    <!-- Tamaño del label -->
                                    <div class="col-sm-6">
                                        <!-- tamaño del input -->
                                        <select id="sucursales" name="sucursales" class="form-control">
                                            <option value="seleccione" disabled selected>Seleccione una sucursal </option>
                                            <option name="sucursales" value="norte">Sucursal Norte</option>
                                            <option name="sucursales" value="centro">Sucursal Centro</option>
                                            <option name="sucursales" value="sur">Sucursal Sur</option>


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--//SEGUNDA COLUMNA -->
                                <div class="form-group form-row">
                                    <label for="" class="col-sm-4 col-form-label">Correo:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="correo" name="correo" value="<?php echo utf8_decode($row['correo']); ?>" disabled>
                                    </div>

                                </div>
                                <div class="form-group form-row">
                                    <label for="" class="col-sm-4 col-form-label">Fecha:</label>
                                    <div class="col-sm-5">
                                        <input type="date" id="fecha" class="form-control" name="fecha">
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label for="" class="col-sm-4 col-form-label">Hora:</label>
                                    <div class="col-sm-5">
                                        <input type="time" id="hora" class="form-control" name="hora">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Servicios</h3>
                </div>
                <div class="card-body">
                    <form class="row" id="formDatos">
                        <div class="form-group col-md-2">
                            <b><label for="">Servicio:</label></b>
                            <select id="selectDescription" class="form-control">
                                <option value="0">Seleccione Servicio</option>

                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <b><label for="">Número de Personas:</label></b>
                            <input type="number" id="inputCantidad" min="0" class="form-control origenDato" max="20" required>
                        </div>

                        <div class="form-group col-md-2">
                            <b><label for="">P.Unitario</label></b>
                            <input id="inputunitario" class="form-control" disabled>



                        </div>

                        <div class="form-group col-md-2">
                            <b><label for="">P.Total</label></b>
                            <input type="number" id="inputtotal" class="form-control" disabled>
                        </div>

                        <div class="form-group col-md-1 contenedor-boton">
                            <button style="margin-top: 25px;" id="btnañadir" class="btn btn-primary" type="submit">Añadir</button>


                        </div>


                    </form>
                </div>
            </div>
        </div>

    </section>

    <section class="row mt-4">
        <div class="col">

            <table class="table text-center">
                <thead style="background: #3d7ba8; color: #fff;">

                    <tr>

                        <th>Servicio</th>
                        <th>Cantidad</th>
                        <th>P. Unitario</th>
                        <th>P. Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody id="tbody">
                    <!-- Aqui se agregan las filas y columnas dinamicas !-->
                    

                </tbody>


            </table>

        </div>

    </section>




    <hr>
    <section>
        <tfoot>

            <div class="row">
                <hr>
                <div style="display: flex; float:right; ">


                    <div class="col-lg-7" style="margin-left: 25px;">
                        <h3>Notas: </h3>
                        <div class="form-group">
                            <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Comentarios o sugerencias"></textarea>
                        </div>
                        <br>


                    </div>
                    <div class="row" style="margin-left:16rem;">
                        <span class="form-inline " >
                            <div class="form-group">
                                <label>Subtotal: &nbsp;</label>
                                <div class="input-group">
                                    <input type="text" id="subtotal"class="form-control" onchange="calcularFactura(); calculoIva();" >
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Iva 12% &nbsp;</label>
                                <div class="input-group">
                                    <input type="text" id="iva" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Total: &nbsp;</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="totalfact" id="totalfact">
                                </div>
                            </div>


                        </span>
                    </div>
                </div>
            </div>

        </tfoot>

    </section>

    <div class="col mt-4">
        <a><button class="btn btn-dark btn-lg close-sale" id="btnguardar">Cerrar Venta</button></a>

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
<script src="js/factura.js"></script>
<script type="text/javascript">
    
    $(document).ready(function () { 
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
