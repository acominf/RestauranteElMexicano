<?php session_start();

if(isset ($_SESSION['usuario']))
{
    header('Location: index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST') {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $contraseña2 = $_POST['contraseña2'];
    $errores= '';
    
    if(empty($usuario) or empty($contraseña) or empty($contraseña2))
    {
        $errores .= '<p>Usuario o contraseña vacios</p>';
    }
    else if($contraseña != $contraseña2){
        $errores.= '<p>Las contraseñas son diferentes</p>';
    }
    else
    {
        $conexion = new mysqli('localhost', 'root','','ejemplo2');
        //$consulta = "SELECT * FROM USUARIOS WHERE username = '$usuario' AND password = '$contraseña'";
        $consulta = "SELECT * FROM usuarios WHERE nombre = '$usuario' AND password = '$contraseña'";
        $resultado = $conexion->query($consulta);

        if($resultado->num_rows != 0) {
            $errores = '<p>El usuario ya existe</p>';
        }
        else
        {
            $contraseña = hash('md5','$o#'. $contraseña.'@8!');
            //$consulta = "INSERT INTO USUARIOS values (null, '$usuario', '$contraseña')";
            $consulta = "INSERT INTO cliente values (null, '$usuario', '$contraseña')";
            $conexion->query($consulta);
            $conexion->close();
            header('Location: index.php');
        }

       $conexion->close();
    }
    echo $errores;
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ejemplo de registro</h1>
    <form method="POST">
    Usuario: <input type="text" name="usuario"><br>
    Contraseña: <input type="password" name="contraseña"><br>
    Contraseña Nuevamente: <input type="password" name="contraseña2"><br>
    <input type= "submit" value= "registrar">
    </form>
</body>
</html>