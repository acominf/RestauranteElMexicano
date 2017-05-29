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
            <a href="index.html"><img src="logoPrincipal.png" alt="Principal"></a>
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
                //Si no esta iniciada la sesion
                if(!isset($_SESSION['usuario'])){
                    echo '<li><a href="index1.php"><u>Inciar sesión</u></a></li>';
                    echo '<li><a href="http://localhost/EjemplosPhp/ejemplosMysql/sesiones/registro.php"><u>Registrase</u></a></li>';
                }else{ 
                    echo '<li><a href="http://localhost/EjemplosPhp/ejemplosMysql/sesiones/index.php"><u>Pendiente</u></a></li>';
                    echo '<li><a href="http://localhost/EjemplosPhp/ejemplosMysql/sesiones/registro.php"><u>Cerrar sesión</u></a></li>';
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
              <p class="grande">"Un exterior saludable, inicia desde el interior"</p>
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
            <a href="servicios.html"><img src="catalogoImagen.jpg" alt="Catalogo"></a>
          </div>
        </div>

        <div class="info caja3 colorGreen"></div>
      </main>
  </div>
</body>
</html>

<!--
  <a href="servicios.html"><img src="imagenReservacion.jpg" alt="Servicio"></a>
<a href="menu.html"><img src="catalogoImagen.jpg" alt="Catalogo"></a>





        <div class="logo" id="logoPrincipal">
          <a href="index.html"><img src="imagenPrincipal.jpg" alt="Principal"></a>
        </div>



<img src="imagenPrincipal.jpg" alt="Principal">
          <button id="btnAnt">Anterior</button>
          <button id="btnSig">Siguiente</button>

-->