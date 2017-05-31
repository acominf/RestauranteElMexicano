<?php session_start();
//Hacer la consulta para crear un nuevo pedido.
//Hacer la consulta para crear una nueva reservacion.

//Si ya inicio sesion tomamos el nombre de usuario y realizamos
//las consultas.

//Si no esta iniciada la sesion
  if(!isset($_SESSION['usuario'])) { 

  }else {
    //$usuario = $_SESSION['usuario'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Servicios</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
  <div class="contenedor">
    <header>
      <div class="contenedorMenu">
        <div class="logo">
          <a href="index.html"><img src="logoPrincipal.png" alt="Principal"></a>
        </div>
        <nav class="menu">
              <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="servicios.php">Servicios</a></li>
                <li><a href="variedad.php">Variedad</a></li>
                <li><a href="historia.php">Historia</a></li>
                <li class="separado"><a href="acercaDe.html">A cerca de..</a></li>
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
        <div class="contenedorServ serVisible colorBlack" id="contServ"> 
            <div class="cajaServ colorGreen" id="divServ1"> 
              <h2>RESERVACIONES.</h2>
              <div class="imagenAnt colorBlue" id="serv1">
              </div>
            </div>

            <div class="cajaServ colorGreen" id="divServ2"> 
              <h2>PEDIDOS A DOMICILIO.</h2>
              <div class="imagenDesp colorBlue" id="serv2">
              </div>
            </div>
        </div>

<!--Empiezan los formularios -->
        <div class="cajaServ serInvisible" id="contServ1">
        <!--Informacion para el formulario de reservacion-->
        <div class = "inicioSesion">
          <h1>Reservación</h1>
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
        </div>

        <div class="cajaServ colorBlue serInvisible" id="contServ2">
        <!--Informacion para el formulario de pedidos-->
        <div class = "inicioSesion">
          <h1>Pedidos</h1>
            <div class="divDatos">
                <form method="POST">
                    Contraseña: <input type="password" name="contraseña"><br><br>
                    <center>
                        <input type= "submit" value= "Iniciar sesión" class="btnCentrado">
                    </center>
                </form>
            </div>
        </div>
        </div>

      <div class="cajaServ serInvisible" id="contServ3">
        <div class = "inicioSesion">
          <h1>Informacion de la reservación</h1>
          <!--Consulta-->
        </div>
      </div>

      <div class="cajaServ serInvisible" id="contServ4">
        <div class = "inicioSesion">
          <h1>Informacion de los pedidos</h1>
          <!--Consulta-->
        </div>
      </div>

      <!-- En caso de no haber iniciado sesion-->
        <div class="cajaServ serInvisible" id="contServ5">
        <!--Informacion para el formulario de inicio de sesion-->
        <div class = "inicioSesion">
          <h1>Reservación</h1>
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
        </div>
      </main>
  </div>
</body>
</html>

