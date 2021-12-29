<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@200&family=Signika+Negative&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/styles.css">
    <style>
        /**Modal*/
        .modal-container {
            opacity: 0;
            visibility: hidden;
            position: fixed;
            z-index: 1000;
            width: 100%;
            height: 160%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ventana {
            width: 40%;
            height: 50%;
            background: #fff;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            position: relative;
            border-radius: 10px;
            transition: transform 1s;
            transform: translateY(-35%);
            border-radius: 10px;
            /*overflow: hidden;*/
        }

        .close {
            position: absolute;
            top: 5px;
            right: 5px;
            display: inline-block;
            width: 25px;
            height: 25px;
            background: red;
            color: white;
            line-height: 25px;
            cursor: pointer;
            border-radius: 50%;
        }

        .ventana-close {
            transform: translateY(-200%);
        }

        .ventana img {
            height: 30%;
        }
    </style>
</head>

<body>


    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="img/logo.png" alt="logo spaweb">
                </a>


                <nav id="navegacion" class="navegacion">
                    <a href="#" class="sign-in">Iniciar Sesión</a>
                    <a href="registrar.php">Registrarse</a>
                    <a href="galeria.html">Galeria</a>
                    <a href="#">Anuncios</a>
                </nav>
            </div>
        </div>
    </header>
    <div class="modal-container">
        <div class="ventana ventana-close">
            <p class="close">X</p>
            <img src="img/login.svg" alt="contacto">

            <?php
                
                require_once("login.php");
            ?>

            <div class="card" style="width: 25rem; margin-left: 4em;">

                <div class="card-body">
                    <h5 class="card-title" id="centrar">LOGIN</h5>
                    <form name="iniciarsesion" method="POST">
                        <div class="form-group">
                            <label for="User">Usuario</label>
                            <input type="user" class="form-control" name="user" placeholder="Usuario" required>
                            <br>
                            <label for="Password">Contraseña</label>
                            <input type="password" class="form-control" maxlength="20" name="password" placeholder="Contraseña" required>
                            <br>
                            <input style="margin-left: 1rem;" class=" btn btn-primary" type="submit" name="enviar" value="Ingresar">
                            
                        </div>
                    </form>
                </div>

            </div>



        </div>
    </div>
    <h2 style="text-align:center; margin-top:3rem;">Registro de Usuarios</h2>
    <p style="text-align:center;">¡Se parte de nuestra comunidad!</p>
    <section class="row" style="margin-top: 3rem;">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <form method="post" action="newuser.php">

                        <div class="form-row">
                            <div class="col-md-6">
                                <!--//PRIMERA COLUMNA -->
                                <div class="form-group form-row">
                                    <label for="" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control " id="nombre" name="nombre" maxlength="20">
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label for="" class="col-sm-2 ">Apellido</label>
                                    <!-- Tamaño del label -->
                                    <div class="col-sm-6">
                                        <!-- tamaño del input -->
                                        <input type="text" id="apellido" class="form-control" name="apellido" maxlength="20">
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label for="" class="col-sm-2 ">Cedula</label>
                                    <!-- Tamaño del label -->
                                    <div class="col-sm-6">
                                        <!-- tamaño del input -->
                                        <input type="text" id="cedula" class="form-control" name="cedula" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="10">
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label for="" class="col-sm-2 ">Teléfono:</label>
                                    <!-- Tamaño del label -->
                                    <div class="col-sm-6">
                                        <!-- tamaño del input -->
                                        <input type="text" id="telefono" class="form-control" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" name="telefono" maxlength="10">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--//SEGUNDA COLUMNA -->
                                <div class="form-group form-row">
                                    <label for="" class="col-sm-4 col-form-label">Domicilio:</label>
                                    <div class="col-sm-5">
                                        <input type="text" id="domicilio" class="form-control" name="domicilio" maxlength="20">
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <label for="" class="col-sm-4 col-form-label">Correo:</label>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" id="correo" name="correo" maxlength="30">
                                    </div>

                                </div>
                                <div class="form-group form-row">
                                    <label for="" class="col-sm-4 col-form-label">Contraseña:</label>
                                    <div class="col-sm-5">
                                        <input type="password" id="password" class="form-control" name="password" maxlength="10">
                                    </div>
                                </div>
                                <div class="form-group form-row" style="display: none;">
                                <label for="" class="col-sm-4 col-form-label">Tipo de Usuario:</label>
                                    <div class="col-sm-5">
                                        <select name="rol">
                                            <option value="2">cliente</option>
                                        </select>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Registrarse</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>




    </section>

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
    <script src="js/index.js"></script>

</body>

</html>