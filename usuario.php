<?php session_start(); ?>

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
      </div>
    </header>
    <main>
          <div class = "inicioSesion" >
            <div class="divDatos">
            <h1>Bienvenido <?php echo $_SESSION['usuario']; ?>   </h1>
                <form method="POST" class="letraForm">
                    <fieldset>
                        <legend>El MEXICANO</legend><br>
                        <center>
                            <input type="submit" name="pedidos" value=" Pedidos " class="letraForm" ><br>
                            <input type="submit" name="reservacion" value=" Reservaciones " class="letraForm" ><br>
                        </center>
                   </fieldset> 
                </form>
            </div>
        </div>
        
        <div class="tablaReserv">
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    
                    $usuario = $_SESSION['usuario'];//Nombre
                    $idCliente = $_SESSION['idCliente'];//Nombre
                    //Administradores
                    if ($usuario != "Yahir" AND $usuario != "Rodolfo") {
                        if(isset($_POST['reservacion'])) {
                           $conexion = new mysqli('localhost','root','','restaurante');
                           $consulta = "SELECT * FROM reservacion WHERE idCliente='$idCliente'";
                           $resultado = $conexion->query($consulta);

                           if($resultado->num_rows > 0){
                               echo '<h1>Reservaciones realizadas: </h1>';
                               echo '<table>';
                               echo '<form method="POST">';
                               echo '<tr>';
                               	//<td class=\"cellgreen\">".$datares['Numero_Hab']."</td>/
                                   echo '<td class="cellblueF"><strong> idReservacion </strong></td>';
                                   echo '<td class="cellblueF"><strong> idCliente  </strong></td>';
                                   echo '<td class="cellblueF"><strong> Personas  </strong></td>';
                                   echo '<td class="cellblueF"><strong> Mesa  </strong></td>';
                                   echo '<td class="cellblueF"><strong> Fecha  </strong></td>';
                                   echo '<td class="cellblueF"><strong> Hora  </strong></td>';
                               echo '</tr>';
                               for($i = 0; $i < $resultado->num_rows; $i++){
                                   $resultado->data_seek($i);
                                   $renglon = $resultado->fetch_array(MYSQLI_ASSOC);
                                   echo '<tr>';
                                   echo '<td class="cellblue">'.$renglon['idReservacion'].'</td>';
                                   echo '<td class="cellblue">'.$renglon['idCliente'].'</td>';
                                   echo '<td class="cellblue">'.$renglon['numeroPersonas'].'</td>';
                                   echo '<td class="cellblue">'.$renglon['numMesa'].'</td>';
                                   echo '<td class="cellblue">'.$renglon['Fecha'].'</td>';
                                   echo '<td class="cellblue">'.$renglon['Hora'].'</td>';
                                   echo '<td class="cellblue">  <input type="checkbox" value='.$renglon['idReservacion'].' name="datos4[]"/>'
                                      . '<label> Cancelar </label><br/>  <td>';                                  
                                   echo '</tr>';
                                 }
                            echo '<input type="submit" name="eliminar4" value=" Cancelar Seleciconados " />';
                            echo '</form>';                                 
                               echo '</table>';
                           }else{
                               echo "No hay reservaciones";
                           }
                       }

                       if (isset($_POST['pedidos'])) {
                           $conexion = new mysqli('localhost','root','','restaurante');
                           $consulta = "SELECT cliente.idCliente , Nombre , Direccion , pedido.idPedido "
                                       . "FROM cliente INNER JOIN pedido on cliente.idCliente=pedido.idCliente "
                                       . "WHERE cliente.idCliente = "
                                       . "'$idCliente'";
                           $resultado = $conexion->query($consulta);

                           if($resultado->num_rows > 0){
                             echo '<h1>Pedidos realizados: </h1>';
                             echo '<table>';
                             echo '<form method="POST">';
                             echo '<tr>';
                                 echo '<td class="cellRed"><strong> idCliente  </strong></td>';
                                 echo '<td class="cellRed"><strong> Nombre </strong></td>';
                                 echo '<td class="cellRed"><strong> Direccion </strong></td>';
                                 echo '<td class="cellRed"><strong> Pedido </strong></td>';
                             echo '</tr>';
                             for($i = 0; $i < $resultado->num_rows; $i++){
                                 $resultado->data_seek($i);
                                 $renglon = $resultado->fetch_array(MYSQLI_ASSOC);
                                 echo '<tr>';
                                 echo '<td class="cellOrange">'.$renglon['idCliente'].'</td>';
                                 echo '<td class="cellOrange">'.$renglon['Nombre'].'</td>';
                                 echo '<td class="cellOrange">'.$renglon['Direccion'].'</td>';
                                 echo '<td class="cellOrange">'.$renglon['idPedido'].'</td>';
                                 echo '<td class="cellOrange">  <input type="checkbox" value='.$renglon['idPedido'].' name="datos3[]"/>'
                                      . '<label> Cancelar </label><br/>  <td>'; 
                                 echo '</tr>';
                               }
                            echo '<input type="submit" name="eliminar3" value=" Cancelar Seleciconados " />';
                            echo '</form>';
                            echo '</table>';
                           }else{
                               echo "No hay pedidos.";
                           }
                       }                       
                    }else{
                           if(isset($_POST['reservacion'])) {
                            $conexion = new mysqli('localhost','root','','restaurante');
                            $consulta = "SELECT * FROM reservacion";
                            $resultado = $conexion->query($consulta);

                            if($resultado->num_rows > 0){
                                echo '<h1>Reservaciones realizadas: </h1>';
                                echo '<table>';
                                echo '<form method="POST">';
                                echo '<tr>';
                                    echo '<td class="cellGreen"><strong> Reservacion </strong></td>';
                                    echo '<td class="cellGreen"><strong> idCliente  </strong></td>';
                                    echo '<td class="cellGreen"><strong> Personas  </strong></td>';
                                    echo '<td class="cellGreen"><strong> Mesa  </strong></td>';
                                    echo '<td class="cellGreen"><strong> Fecha  </strong></td>';
                                    echo '<td class="cellGreen"><strong> Hora  </strong></td>';
                                echo '</tr>';
                                for($i = 0; $i < $resultado->num_rows; $i++){
                                    $resultado->data_seek($i);
                                    $renglon = $resultado->fetch_array(MYSQLI_ASSOC);
                                    echo '<tr>';
                                    echo '<td class="cellYello">'.$renglon['idReservacion'].'</td>';
                                    echo '<td class="cellYellow">'.$renglon['idCliente'].'</td>';
                                    echo '<td class="cellYellow">'.$renglon['numeroPersonas'].'</td>';
                                    echo '<td class="cellYellow">'.$renglon['numMesa'].'</td>';
                                    echo '<td class="cellYellow">'.$renglon['Fecha'].'</td>';
                                    echo '<td class="cellYellow">'.$renglon['Hora'].'</td>';
                                    echo '<td>  <input type="checkbox" value='.$renglon['idReservacion'].' name="datos2[]"/>'
                                      . '<label> Eliminar </label><br/>  <td>';                                    
                                    echo '</tr>';
                                  }
                                echo '<input type="submit" name="eliminar2" value=" Eliminar Seleciconados " />';
                                echo '</form>';
                                echo '</table>';
                            }else{
                                echo "<script>alert('No hay reservaciones.')</script>";
                            }
                       }

                       if (isset($_POST['pedidos'])) {
                           $conexion = new mysqli('localhost','root','','restaurante');
                           $consulta = "SELECT * FROM pedido";
                           $resultado = $conexion->query($consulta);

                           if($resultado->num_rows > 0){
                             echo '<h1>Pedidos realizados: </h1>';
                             echo '<table>';
                             echo '<form method="POST">';
                             echo '<tr>';
                                 echo '<td class="cellblue"><strong> idCliente  </strong></td>';
                                 echo '<td class="cellblue"><strong> Pedido </strong></td>';
                             echo '</tr>';
                             echo '<form>';
                             for($i = 0; $i < $resultado->num_rows; $i++){
                                 $resultado->data_seek($i);
                                 $renglon = $resultado->fetch_array(MYSQLI_ASSOC);
                                 echo '<tr>';
                                 echo '<td class="cellOrange">'.$renglon['idCliente'].'</td>';
                                 echo '<td class="cellOrange">'.$renglon['idPedido'].'</td>';
                                 echo '<td class="cellOrange">  <input type="checkbox" value='.$renglon['idPedido'].' name="datos[]"/>'
                                      . '<label> Eliminar </label><br/>  <td>';
                                 echo '</tr>';
                               }
                                echo '<input type="submit" name="eliminar1" value=" Eliminar Seleciconados " />';
                                echo '</form>';
                                echo '</table>';
                           }else{
                               echo "<script>alert('No hay reservaciones.')</script>";
                           }
                       }  
                    }
                }
            ?>
            <?php 
                //Pedidos
                if (isset($_POST['eliminar1'])){
                    if (is_array($_POST['datos'])){
                        $tamArr = count($_POST['datos']);
                        $limite = 0;
                        $conexion = new mysqli('localhost','root','','restaurante');
                        foreach ($_POST['datos'] as $key => $value){
                            if ($limite != $tamArr) {
                                $consulta = "DELETE FROM pedido WHERE idPedido ='$value'";//Eliminar
                                $resultado = $conexion->query($consulta);
                            }
                        $limite++;
                        }
                    }
                }
                //Reservaciones
                if (isset($_POST['eliminar2'])){
                    if (is_array($_POST['datos2'])){
                        $tamArr = count($_POST['datos2']);
                        $limite = 0;
                        $conexion = new mysqli('localhost','root','','restaurante');
                        foreach ($_POST['datos2'] as $key => $value){
                            if ($limite != $tamArr) {
                                $consulta = "DELETE FROM reservacion WHERE idReservacion ='$value'";//Eliminar
                                $resultado = $conexion->query($consulta);
                            }
                        $limite++;
                        }
                    }
                }
                if (isset($_POST['eliminar3'])){
                    if (is_array($_POST['datos3'])){
                        $tamArr = count($_POST['datos3']);
                        $limite = 0;
                        $conexion = new mysqli('localhost','root','','restaurante');
                        foreach ($_POST['datos3'] as $key => $value){
                            if ($limite != $tamArr) {
                                $consulta = "DELETE FROM pedido WHERE idPedido ='$value'";//Eliminar
                                $resultado = $conexion->query($consulta);
                            }
                        $limite++;
                        }
                    }
                }
                
                if (isset($_POST['eliminar4'])){
                    if (is_array($_POST['datos4'])){
                        $tamArr = count($_POST['datos4']);
                        $limite = 0;
                        $conexion = new mysqli('localhost','root','','restaurante');
                        foreach ($_POST['datos4'] as $key => $value){
                            if ($limite != $tamArr) {
                                $consulta = "DELETE FROM reservacion WHERE idReservacion ='$value'";//Eliminar
                                $resultado = $conexion->query($consulta);
                            }
                        $limite++;
                        }
                    }
                }
            ?>
        </div>
    </main>
  </div>
</body>
</html>

