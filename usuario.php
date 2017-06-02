<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Restaurante El Mexicano.</title>
  <link rel="stylesheet" href="estilo.css">
  <script src="jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="script.js"></script>
</head>
<body> 
  <div class="contenedor">
    <header>
      <div class="contenedorMenu">
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
      </div>
    </header>
    <main>
          <div class = "inicioSesion">
            <div class="divDatos">
            <h1>Bienvenido</h1>
                <form method="POST">
                    <center>
                        <input type="submit" name="ver" class="btnCentrado" value="VerReserv"><br><br>
                        Fecha: <input type="date" name="fecha" value="dd/mmm/aaaa"/><br><br>
                        <input type="submit" value= "Cancelar" class="btnReserva">
                    </center>
                </form>
            </div>
        </div>
        <div class="tablaReserv"> 
        <?php session_start();

          if(isset($_POST['ver'])) {
            $usuario = $_SESSION['usuario'];//Nombre
            $idCliente = $_SESSION['idCliente'];//Nombre
            $conexion = new mysqli('localhost','root','','restaurante');
            $consulta = "SELECT * FROM reservacion WHERE idCliente='$idCliente'";
            $resultado = $conexion->query($consulta);

            if($resultado){
              echo '<h1>Reservaciones</h1>';
              echo '<table>';
              echo '<tr>';
                  echo '<td><strong> idReservacion </strong></td>';
                  echo '<td><strong> idCliente  </strong></td>';
                  echo '<td><strong> numeroPersonas  </strong></td>';
                  echo '<td><strong> numeroMesa  </strong></td>';
                  echo '<td><strong> Fecha  </strong></td>';
                  echo '<td><strong> Hora  </strong></td>';
              echo '</tr>';
              for($i = 0; $i < $resultado->num_rows; $i++){
                  $resultado->data_seek($i);
                  $renglon = $resultado->fetch_array(MYSQLI_ASSOC);
                  echo '<tr>';
                  echo '<td>'.$renglon['idReservacion'].'</td>';
                  echo '<td>'.$renglon['idCliente'].'</td>';
                  echo '<td>'.$renglon['numeroPersonas'].'</td>';
                  echo '<td>'.$renglon['numMesa'].'</td>';
                  echo '<td>'.$renglon['Fecha'].'</td>';
                  echo '<td>'.$renglon['Hora'].'</td>';
                  echo '</tr>';
              }
              echo '</table>';
            }
          }

          if(isset($_POST['fecha'])) {
            $dato = $_POST['fecha'];
            $usuario = $_SESSION['usuario'];//Nombre
            $idCliente = $_SESSION['idCliente'];//Nombre
            $conexion = new mysqli('localhost','root','','restaurante');
            $consulta = "DELETE FROM reservacion WHERE fecha='$dato'";
            $resultado = $conexion->query($consulta);
            echo "<script>alert('La reservación ha sido cancelada')</script>";
          }


          ?>
        </div>
    </main>
  </div>
</body>
</html>