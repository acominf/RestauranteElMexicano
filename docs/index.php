<?php session_start();

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $conexion = new mysqli('localhost', 'root','','ejemplo2');
        $usuario = $conexion->real_escape_string($_POST['usuario']);
        $contraseña = $conexion->real_escape_string($_POST['contraseña']);
        $contraseña = hash('md5','$o#'.$contraseña.'@8!');
        //$consulta = "SELECT * FROM USUARIOS WHERE username = '$usuario' AND password = '$contraseña'";
        $consulta = "SELECT * FROM USUARIOS WHERE nombre = '$usuario' AND password = '$contraseña'";
        $resultado = $conexion->query($consulta);

        if($resultado->num_rows == 1)
        {
            $_SESSION['usuario'] = $usuario;
            header('Location: contenido.php');
        }
        else
        {
            echo("<h1>Error: Usuario o contraseña no validos. </h1>");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina sesiones</title>
</head>
<body>
    <h1> Iniciar sesion </h1>
    <form method="POST">
        Usuario: <input type="text" name="usuario">
        <br>
        Contraseña: <input type="password" name="contraseña">
        <br>
        <input type= "submit" value="Ingresar">
        <!--<br>
        <br>
        <a href="contenido.php"> Contenido sesion</a>
        <br>-->
        <br>
        <p> No te has registrado? </p>
        <a href="registro.php"> Registrate aqui </a>
    </form>
</body>
</html>