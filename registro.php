<?php session_start(); ?>
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
                <!--action="inicioRegistro.php"--> 
                <form method="POST" class="letraForm" id="formReg" name="formulario">
                    <fieldset>
                       <legend>El MEXICANO</legend>
                       Nombre de usuario:<br>
                       <input type="text" name="usuario" class="tamInput" onkeyup="showHint(this.value)"><br>
                       <p>Sugerencias: <span id="txtHint"></span></p>
                       Direccion:<br>
                       <input type="text" name="direccion" class="tamInput"><br>
                       Contrasenna:<br>
                       <input type="password" name="contrasenna" class="tamInput"><br>
                       Confirmar Contrasenna:<br>
                       <input type="password" name="contrasenna2" class="tamInput"><br><br>                      
                       <center><input type="submit" value="Registrarse" class="letraForm"></center> 
                   </fieldset> 
                </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $usuario = $_POST['usuario'];//Nombre
                $direccion = $_POST['direccion'];//Direccion
                $contrasenna = $_POST['contrasenna'];//contrasenna
                $contrasenna2 = $_POST['contrasenna2'];//Contrasenna2
                $errores = '';

                if(empty($usuario) or empty($contrasenna) or empty($contrasenna2))
                {
        //            $errores = '<p>Usuario o contrasenna vacios</p>';
                    echo '<p class="letraForm" >Usuario o contrasenna vacios</p>';
                }
                else if($contrasenna != $contrasenna2){
        //            $errores = '<p>Las contrasnnas son diferentes</p>';
                    echo '<p class="letraForm">Las contrasnnas son diferentes</p>';
                }
                else
                {
                        $conexion = new mysqli('localhost','restaura','uch49a','restaurante');
//                    $conexion = new mysqli('localhost','root','','restaurante');
                    $consulta = "SELECT * FROM cliente WHERE Nombre = '$usuario'";
                    $resultado = $conexion->query($consulta);

                    if($resultado->num_rows != 0) {
        //                $errores = '<p>El usuario ya existe</p>';
                        echo '<p class="letraForm">El usuario ya existe</p>';
                    }
                    else
                    {
                        $contrasenna = hash('md5','$o#'.$contrasenna.'@8!');
                        $consulta = "INSERT INTO cliente values (null,'$usuario','$direccion','$contrasenna')";
                        $conexion->query($consulta);
                        $conexion->close();

                        $conexion = new mysqli('localhost','restaura','uch49a','restaurante');
//                        $conexion = new mysqli('localhost','root','','restaurante');
                        $consulta = "SELECT * FROM cliente WHERE Nombre='$usuario'";
                        $resultado = $conexion->query($consulta);

        //                if($resultado->num_rows == 1)
        //                {
        //                    $row = mysqli_fetch_array($resultado);
        //                    $_SESSION['idCliente'] = $row['idCliente'];
        //                }
                        $conexion->close();
        //
        //                $_SESSION['usuario'] = $usuario;
                        header('Location: index.php');
                    }
                   $conexion->close();
                }
                echo $errores;
            } 
        ?>
               
            </div>
        <!--</div>-->
        <script>
            function showHint(str) {
                if (str.length == 0) { 
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "gethint.php?q=" + str, true);
                    xmlhttp.send();
                }
            }
        </script>
    </main>
    </div>
</body>
</html>