<?php
include ("conexion.php");

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$cedula = $_POST ["cedula"];
$domicilio = $_POST["domicilio"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$password = $_POST["password"];
$rol = $_POST["rol"];


$insertar = "INSERT INTO  usuarios (nombre, apellido, cedula, domicilio, telefono, correo, contrasena, rol) VALUES 
('$nombre', '$apellido', '$cedula', '$domicilio', '$telefono', '$correo', '$password', '$rol')";

$verificarcorreo = mysqli_query($conexion, "SELECT * FROM usuarios where correo = '$correo'");

if (mysqli_num_rows($verificarcorreo) > 0){
    echo '<script type="text/javascript">';
    echo 'alert("El usuario ya existe");';
    
    echo 'window.location.href="registrar.php";';
   
    echo '</script>';
    exit();
}

$resultado = mysqli_query($conexion, $insertar);
if ($resultado){
    echo '<script>';
    echo 'alert("Usuario Registrado!");';
    echo 'window.location.href="registrar.php";';
    echo '</script>';
    
}

   
?>

