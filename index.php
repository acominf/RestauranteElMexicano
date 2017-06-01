<!DOCTYPE html>
<?php session_start();?>
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
        <div class="slider">
          <div id="ele1" class="elementSlider svisible"></div>
          <div id="ele2" class="elementSlider"></div>
          <div id="ele3" class="elementSlider"></div>
          <div id="ele4" class="elementSlider"></div>
        </div>

        <div>
          <div class="caja caja-tam49 colorBlack" id="btnAnt" >
            <p>Anterior</p>
          </div>
          <div class="caja caja-tam49 colorBlack" id="btnSig">
            <p>Siguiente</p>
          </div>
        </div>
        
        <div class="frase ">
            <div class="caja caja-tam49 " id="frase1">
              <p>Restaurante El mexicano.</p>
              <p class="grande">"Ven con nosotros y dale sazón a tu vida!!"</p>
            </div>
            <div class="caja caja-tam49 " id="video1">
              <video controls="controls" width="400" height="300">
              <source src="videoPrincipal.mp4" type="video/mp4">
              </video>
            </div>
        </div>

        <div class="caja3">
          <div class="caja caja-tam49 " id="reserv">
            <a href="servicios.html"><img src="imagenReservacion.jpg" alt="Reservacion"></a>
          </div>
          <div class="caja caja-tam49" id="catalogo">
            <a href="menu.php"><img src="catalogoImagen.jpg" alt="Catalogo"></a>
          </div>
        </div>

        <div class="info caja3 colorGreen"></div>
      </main>
  </div>
</body>
</html>