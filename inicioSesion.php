<?php  session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $conexion = new mysqli('localhost','root','','restaurante');
        $usuario = $conexion->real_escape_string($_POST['usuario']);//Nombre
        $contrasenna = $conexion->real_escape_string($_POST['contrasenna']);//contrasenna
        $contrasena = hash('md5','$o#'.$contrasenna.'@8!');
        $consulta = "SELECT * FROM cliente WHERE Nombre='$usuario' AND password='$contrasena'";
        $resultado = $conexion->query($consulta);

        if($resultado->num_rows == 1)
        {
            $row = mysqli_fetch_array($resultado);
            $_SESSION['usuario'] = $usuario;
            $_SESSION['idCliente'] = $row['idCliente'];
            header('Location: index.php');
        }
        else{
            echo "usuario no valido";
        }
            
    }
?>
