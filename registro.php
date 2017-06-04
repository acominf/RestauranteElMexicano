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
        <!--<div class = "inicioSesion" class="serVisible">-->
            <div class="divDatos registro">
                <form method="POST" action="inicioRegistro.php" class="letraForm" id="formReg">
                    <fieldset>
                       <legend>El MEXICANO</legend><br>
                       Nombre de usuario:<br>
                       <input type="text" name="usuario" class="tamInput"><br>
                       Direccion:<br>
                       <input type="text" name="direccion" class="tamInput"><br>
                       Contrasenna:<br>
                       <input type="password" name="contrasenna" class="tamInput"><br>
                       Confirmar Contrasenna:<br>
                       <input type="password" name="contrasenna2" class="tamInput"><br><br>                      
                       <center><input type="submit" value="Registrarse" class="letraForm"></center> 
                   </fieldset> 
                </form>
            </div>
        <!--</div>-->
    </main>
    </div>
</body>
</html>