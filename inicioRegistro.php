<?php session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $usuario = $_POST['usuario'];//Nombre
        $direccion = $_POST['direccion'];//Direccion
        $contrasenna = $_POST['contrasenna'];//contrasenna
        $contrasenna2 = $_POST['contrasenna2'];//Contrasenna2
        $errores = '';

        if(empty($usuario) or empty($contrasenna) or empty($contrasenna2))
        {
            $errores = '<p>Usuario o contrasenna vacios</p>';
        }
        else if($contrasenna != $contrasenna2){
            $errores = '<p>Las contrasnnas son diferentes</p>';
        }
        else
        {
            $conexion = new mysqli('localhost', 'root','','restaurante');
            $consulta = "SELECT * FROM cliente WHERE Nombre = '$usuario'";
            $resultado = $conexion->query($consulta);

            if($resultado->num_rows != 0) {
                $errores = '<p>El usuario ya existe</p>';
            }
            else
            {
                $contrasenna = hash('md5','$o#'.$contrasenna.'@8!');
                $consulta = "INSERT INTO cliente values (null,'$usuario','$direccion','$contrasenna')";
                $conexion->query($consulta);
                $conexion->close();

                $conexion = new mysqli('localhost','root','','restaurante');
                $consulta = "SELECT * FROM cliente WHERE Nombre='$usuario'";
                $resultado = $conexion->query($consulta);

                if($resultado->num_rows == 1)
                {
                    $row = mysqli_fetch_array($resultado);
                    $_SESSION['idCliente'] = $row['idCliente'];
                }
                $conexion->close();

                $_SESSION['usuario'] = $usuario;
                header('Location: index.php');
            }
           $conexion->close();
        }
        echo $errores;
    } 
?>