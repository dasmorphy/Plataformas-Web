<?php

include ("conexion.php");

$id = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$duracion = $_POST ["duracion"];
$tipo = $_POST ["tiposervicio"];
$precio = $_POST["precio"];



$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));


$insertar = "INSERT INTO  servicios (nombre, descripcion, duracion, tipo, precio, imagen) VALUES 
('$id', '$descripcion', '$duracion','$tipo','$precio', '$image')";


$resultado = mysqli_query($conexion, $insertar);
if ($resultado){
    
    echo '<script>';
    echo 'alert("Producto Registrado!");';
    echo 'window.location.href="newservice.php";';
    echo '</script>';
}
?>