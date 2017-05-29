<?php session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $conexion = new mysqli('localhost', 'root','','elMexicano');
    $usuario = $conexion->real_escape_string($_POST['usuario']);
    $contraseña = $conexion->real_escape_string($_POST['contraseña']);
    //$contraseña = hash('md5','$o#'. $contraseña.'@8!');
    $consulta = "SELECT * FROM usuarios WHERE nombre = '$usuario' AND password = '$contraseña'";
    $resultado = $conexion->query($consulta);
    if($resultado->num_rows == 1)
    {
        $_SESSION['usuario']= $usuario;
        header('Location: index.php');
    }
    else
    {
        echo "usuario no valido";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesiones</title>
</head>
<body>
    <h1> Ejemplo de sesiones </h1>
    <form method="POST">
    Usuario: <input type="text" name="usuario">
    Contraseña: <input type="password" name="contraseña">
    <input type= "submit">
    </form>
    <a href="contenido.php"> Iniciar sesion</a>
    <a  href="registro.php">Registrate aqui</a>
</body>
</html>