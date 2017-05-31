<?php session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $conexion = new mysqli('localhost', 'root','','elMexicano');
    $usuario = $conexion->real_escape_string($_POST['usuario']);
    $contraseña = $conexion->real_escape_string($_POST['contraseña']);
    $contraseña = hash('md5','$o#'. $contraseña.'@8!');
    $consulta = "SELECT * FROM clientes WHERE nombre = '$usuario' AND password = '$contraseña'";
    $resultado = $conexion->query($consulta);
    if($resultado->num_rows == 1)
    {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    }
    else
        echo "usuario no valido";
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
                <li><a href="menu.html">Menu</a></li>
                <li><a href="servicios.html">Servicios</a></li>
                <li><a href="variedad.html">Variedad</a></li>
                <li><a href="historia.html">Historia</a></li>
                <li class="separado"><a href="acercaDe.html">A cerca de..</a></li>
                <?php 
                if(!isset($_SESSION['usuario'])) { //Si no esta iniciada la sesion
                      echo '<li><a href="index1.php"><u>Inciar sesión</u></a></li>';
                    echo '<li><a href="registro.php"><u>Registrase</u></a></li>';
                }else {
                  $usuario = $_SESSION['usuario'];
                    echo '<li><a href=""><u>'.$usuario.'</u></a></li>';
                    echo '<li><a href="cerrar.php"><u>Cerrar sesión</u></a></li>';
                }
                ?>
              </ul>
          </nav>
    </header>
    <main>
        <div class = "inicioSesion">
        <h1>Iniciar sesión.</h1>
            <div class="divDatos">
                <form method="POST">
                    Usuario: <input type="text" name="usuario"> <br><br>
                    Contraseña: <input type="password" name="contraseña"><br><br>
                    <center>
                        <input type= "submit" value= "Iniciar sesión" class="btnCentrado">
                    </center>
                </form>
            </div>
        </div>
    </main>
</body>
</html>