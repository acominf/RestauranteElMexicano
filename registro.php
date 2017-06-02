<?php session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $usuario = $_POST['usuario'];//Nombre
    $contraseña = $_POST['contraseña'];//contraseña
    $contraseña2 = $_POST['contraseña2'];//Contraseña2
    $errores = '';

    if(empty($usuario) or empty($contraseña) or empty($contraseña2))
    {
        $errores = '<p>Usuario o contraseña vacios</p>';
    }
    else if($contraseña != $contraseña2){
        $errores = '<p>Las contraseñas son diferentes</p>';
    }
    else
    {
        $conexion = new mysqli('localhost', 'root','','restaurante');
        $consulta = "SELECT * FROM cliente WHERE Nombre = '$usuario' AND password = '$contraseña'";
        $resultado = $conexion->query($consulta);

        if($resultado->num_rows != 0) {
            $errores = '<p>El usuario ya existe</p>';
        }
        else
        {
            $contraseña = hash('md5','$o#'.$contraseña.'@8!');
            $consulta = "INSERT INTO cliente values (null,'$usuario','$contraseña')";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión.</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div class="contenedorMenu">
        <header>
          <div class="logo" id="logoPrincipal">
            <a href="index.php"><img src="logoPrincipal.png" alt="Principal"></a>
          </div>
        <nav class="menu">
              <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="servicios.php">Servicios</a></li>
                <li><a href="variedad.php">Variedad</a></li>
                <li><a href="historia.php">Historia</a></li>
                <li class="separado"><a href="acercaDe.php">A cerca de..</a></li>
                <?php 
                if(!isset($_SESSION['usuario'])) { //Si no esta iniciada la sesion
                    echo '<li><a href="index1.php"><u>Inciar sesión</u></a></li>';
                    echo '<li><a href="registro.php"><u>Registrase</u></a></li>';
                }else {
                  $usuario = $_SESSION['usuario'];
                    echo '<li><a href="usuario.php"><u>'.$usuario.'</u></a></li>';
                    echo '<li><a href="cerrar.php"><u>Cerrar sesión</u></a></li>';
                }
                ?>
              </ul>
          </nav>
    </header>
    </div>

    <main>
        <div class = "inicioSesion">
            <div class="divDatos registro">
                <h1>Registro.</h1>
                <form method="POST">
                    Nombre de Usuario: <input type="text" name="usuario"><br><br>
                    Contraseña: <input type="password" name="contraseña"><br><br>
                    Confirmar contraseña: <input type="password" name="contraseña2"><br><br>
                    <center>
                        <input type= "submit" value= "Registrar" class="btnCentrado">
                    </center>
                </form>
            </div>
        </div>
    </main>
</body>
</html>