<?php session_start();

/*if(isset ($_SESSION['usuario']))
{
    header('Location: index.php');
}*/

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $contraseña2 = $_POST['contraseña2'];
    $telefono = $_POST['telefono'];
    $errores= '';

    if(empty($usuario) or empty($contraseña) or empty($contraseña2))
    {
        $errores = '<p>Usuario o contraseña vacios</p>';
    }
    else if($contraseña != $contraseña2){
        $errores = '<p>Las contraseñas son diferentes</p>';
    }
    else
    {
        $conexion = new mysqli('localhost', 'root','','elMexicano');
        $consulta = "SELECT * FROM clientes WHERE nombre = '$usuario' AND password = '$contraseña'";
        $resultado = $conexion->query($consulta);
        if($resultado->num_rows !=0){
            $errores .= '<p>El usuario ya existe</p>';
        }
        else
        {
            $contraseña = hash('md5','$o#'. $contraseña.'@8!');
            $consulta = "INSERT INTO clientes values (null, '$usuario', '$contraseña','$telefono')";
            $conexion->query($consulta);
            $conexion->close();
            $_SESSION['usuario'] = $usuario;
            $usuarios = $_SESSION['usuario'];
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
    Nombre de Usuario: <input type="text" name="usuario"><br>
    Telefono: <input type="text" name="telefono"><br>
    Contraseña: <input type="password" name="contraseña"><br>
    Contraseña Nuevamenten: <input type="password" name="contraseña2"><br>
    <input type= "submit" value= "registrar">
    </form>
</body>
</html>