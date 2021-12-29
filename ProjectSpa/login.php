<?php
    

    
if (!empty ($_SESSION['active']))
{
    
    header('Location: logueado.php');
}else{


    if (!empty($_POST))
    {
        
        if (empty($_POST ['user']) || empty($_POST ['password']))
        {
           $alert = 'Ingrese su usuario y clave';
        }else {
            require_once "conexion.php";
            $user = mysqli_escape_string($conexion,$_POST ['user']);
            $pass = mysqli_escape_string($conexion,$_POST ['password']);

            //echo $pass; exit;
            $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$user' and contrasena ='$pass'");
            $result = mysqli_num_rows($query);
            
         if ($result > 0)
        {
            $data = mysqli_fetch_array($query);
           
            $_SESSION ['active'] = true;
            $_SESSION ['correo'] = $data ['correo'];
            header('Location: logueado.php');
        }else
            {
                echo '<script>';
                
                echo 'alert("Usuario o clave incorrecto");';
                
                echo '</script>';
                session_destroy();   
            }
        }
    }  
}
?>