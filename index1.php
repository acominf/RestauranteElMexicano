<?php session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conexion = new mysqli('localhost','root','','restaurante');
    $usuario = $conexion->real_escape_string($_POST['usuario']);
    $contrasena = $conexion->real_escape_string($_POST['contrasena']);
    $contrasena = hash('md5','$o#'.$contrasena.'@8!');
    $consulta = "SELECT * FROM cliente WHERE Nombre='$usuario' AND password='$contrasena'";
    $resultado = $conexion->query($consulta);

    if($resultado->num_rows == 1)
    {
        $row = mysqli_fetch_array($resultado);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['idCliente'] = $row['idCliente'];
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
    <main>
        <div class = "inicioSesion">
            <div class="divDatos">
            <h1>Iniciar sesión.</h1>
                <form method="POST">
                    Usuario: <input type="text" name="usuario"> <br><br>
                    Contraseña: <input type="password" name="contrasena"><br><br>
                    <center>
                        <input type="submit" value="Iniciar sesión" class="btnCentrado">
                    </center>
                </form>
            </div>
        </div>
    </main>
</body>
</html>