<!DOCTYPE html>
<?php session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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

    <h1>Acerca de Nosotros</h1>
    
    <div class="AceR">
        
        <img class="iNi" src="Inicios.jpg" align="left" border="1" alt="" "logo="" css3"="">
        <p>
            Restaurante el Mexicano inicio en el año de 1992 en la Ciudad de San Luis Potosí comenzando como un pequeño restaurante ubicado en el centro historico de la 
            misma, bajo la administración de su propietario Federico Diaz Castro.Al principio el restaurante solamente ofrecía servicios de comida típica de la ciudad.
        </p>
       
       
        <img class="iNa" src="Inauguración.jpg" align="right" border="1" alt="" "logo="" css3"="">
        <p>
        Hasta la fecha Restaurante el Mexicano cuenta con cinco restaurantes úbicados en diferentes puntos de la ciudad siendo el quinto el último inaugurado en el año 2005.
        </p>

         <img class="iNa" src="Servicio1.jpg" align="left" border="1" alt="" "logo="" css3"="">
        <p>
        Actualmente el restaurante cuenta con más servicios entre los cuales se encuentra servicios de comida en el mismo, servicios en linea entre los cuales se encuentra 
        pedido a domicilio y reservaciones para asistir a degustar los diferentes platillos que se ofrecen.
        </p>
        
        <img class="iNa" src="platillos.jpg" align="right" border="1" alt="" "logo="" css3"="">
        <p>
        Restaurante el Mexicano ofrece más 55 platillos típicos de Nuestro México lindo entre los más populares se encuentran Mole Poblano, Pozole, Chile en Nogada
        Cabrito, Torta Ahogada entre otros.Cabe tambien mencionar que se cuenta con diferentes prostres desde los salados a los dulces.
        </p>
        
        <img class="iNa" src="aguasF.jpg" align="left" border="1" alt="" "logo="" css3"="">
        <img class="iNa" src="vinos1.jpg" align="right" border="1" alt="" "logo="" css3"="">
        <p>
            Tambien ofrece una amplia gama de bebidas mexicanas entre las cuales se encuentran las aguas de fruta natural y la mejor selección de  vinos y bebidas alcohólicas del país. 
        </p>
        
   
        <p>
            El restaurante tambien cuenta con música en vivo la cual es ofreccida por un grupo de músicos que interpretan diversas canciones de los cantautores más reconocidos de 
            nuestro país.  
        </p>
        
        <img class="iMa" src="musicaRes.jpg" align="center" height="300" border="0" alt="" "logo="" css3"="">
             
    </div>
</body>
</html>