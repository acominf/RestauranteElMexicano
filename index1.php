<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesion.</title>
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <script src="jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="script.js"></script>
</head>
<body>
  <div class="contenedorMenu">
    <header>
          <div class="logo" id="logoPrincipal">
              <a href="index.php"><img src="imagenes/logoPrincipal.png" alt="Principal"></a>
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
                    echo '<li><a href="index1.php"><u>Inciar sesionn</u></a></li>';
                    echo '<li><a href="registro.php"><u>Registrase</u></a></li>';
                }else {
                  $usuario = $_SESSION['usuario'];
                    echo '<li><a href="usuario.php"><u>'.$usuario.'</u></a></li>';
                    echo '<li><a href="cerrar.php"><u>Cerrar sesion</u></a></li>';
                }
                ?>
              </ul>
          </nav>
    </header>
  
    <main>
        <div class="inicioSesion">
            <div class="divDatos" >
                <form method="POST" class="letraForm">
                 <fieldset>
                    <legend>El MEXICANO</legend><br>
                    Nombre de usuario:<br>
                    <input type="text" name="usuario" class="tamInput"><br>
                    Contrasenna:<br>
                    <input type="password" name="contrasenna" class="tamInput"><br><br>
                    <center><input type="submit" value="Inciar sesion" class="letraForm"></center>
                </fieldset> 
                </form>
            </div>
                <?php  session_start();
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
//        $conexion = new mysqli('localhost','root','','restaurante');
                        $conexion = new mysqli('localhost','restaura','uch49a','restaurante');
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
                            echo "<h1 class='letraAviso'>Usuario no valido</h1>";
                        }
                    }
                ?>
        </div>
     </main>
    </div>
</body>
</html>