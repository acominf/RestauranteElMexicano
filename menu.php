<?php session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index1.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Obtenemos el nombre y el id del ususario.
        $usuario = $_SESSION['usuario'];
        $idCliente = $_SESSION['idCliente'];
        
        //Cuando elegimos un platillo.
//        $conexion = new mysqli('localhost','root','','restaurante');
        $conexion = new mysqli('localhost','restaura','uch49a','restaurante');
        $consulta = "INSERT INTO pedido values (null,0,$idCliente)";

        if ($conexion->query($consulta) === TRUE) {
            $last_id = $conexion->insert_id;//Obtenemos el ultimo insertado.
            if (isset($_POST['btnOrden1'])){
                $consulta2 = "INSERT INTO pedidoplatillo values (null,'$last_id',1)";//Nuevo pedidoPlatillo.
                $conexion->query($consulta2);//Crear la consulta.
                echo "<script>alert('Su platillo ha sido agregado con �xito!!!')</script>";
            }elseif(isset($_POST['btnOrden2'])) {
                $consulta2 = "INSERT INTO pedidoplatillo values (null,'$last_id',2)";//Nuevo pedidoPlatillo
                $conexion->query($consulta2);//Crear la consulta.
                echo "<script>alert('Su platillo ha sido agregado con �xito!!!')</script>";                
            }elseif (isset($_POST['btnOrden3'])) {
                $consulta2 = "INSERT INTO pedidoplatillo values (null,'$last_id',3)";//Nuevo pedidoPlatillo.
                $conexion->query($consulta2);//Crear la consulta.
                echo "<script>alert('Su platillo ha sido agregado con �xito!!!')</script>";                
            }elseif (isset($_POST['btnOrden4'])) {
                $consulta2 = "INSERT INTO pedidoplatillo values (null,'$last_id',4)";//Nuevo pedidoPlatillo.
                $conexion->query($consulta2);//Crear la consulta.
                echo "<script>alert('Su platillo ha sido agregado con �xito!!!')</script>";                
            }elseif (isset($_POST['btnOrden5'])) {
                $consulta2 = "INSERT INTO pedidoplatillo values (null,'$last_id',5)";//Nuevo pedidoPlatillo.
            }elseif (isset($_POST['btnOrden6'])) {
                $consulta2 = "INSERT INTO pedidoplatillo values (null,'$last_id',6)";//Nuevo pedidoPlatillo.
                $conexion->query($consulta2);//Crear la consulta.
                echo "<script>alert('Su platillo ha sido agregado con �xito!!!')</script>";                
            }elseif (isset($_POST['btnOrden7'])) {
                $consulta2 = "INSERT INTO pedidoplatillo values (null,'$last_id',7)";//Nuevo pedidoPlatillo.
                $conexion->query($consulta2);//Crear la consulta.
                echo "<script>alert('Su platillo ha sido agregado con �xito!!!')</script>";                
            }elseif (isset($_POST['btnOrden8'])) {
                $consulta2 = "INSERT INTO pedidoplatillo values (null,'$last_id',8)";//Nuevo pedidoPlatillo.
                $conexion->query($consulta2);//Crear la consulta.
                echo "<script>alert('Su platillo ha sido agregado con �xito!!!')</script>";                
            }elseif (isset($_POST['btnOrden9'])) {
                $consulta2 = "INSERT INTO pedidoplatillo values (null,'$last_id',9)";//Nuevo pedidoPlatillo.
                $conexion->query($consulta2);//Crear la consulta.
                echo "<script>alert('Su platillo ha sido agregado con �xito!!!')</script>";                
            }elseif (isset($_POST['btnOrden10'])) {
                $consulta2 = "INSERT INTO pedidoplatillo values (null,'$last_id',10)";//Nuevo pedidoPlatillo.
                $conexion->query($consulta2);//Crear la consulta.
                echo "<script>alert('Su platillo ha sido agregado con �xito!!!')</script>";                
            }
        } else {
            echo "Error: " . $consulta . "<br>" . $conexion->error;
        }
        $conexion->close();
    }
?>  
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catalogo</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div class="contenedor">
        <header>
          <div class="contenedorMenu">
                <div class="logo">
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
            <section>
                <div class="contenedorBtnMenu" id="info">
                    <p id="infoCompra">Informacion</p>
                    <center>
                        <button id="btnCarro"> Carrito </button>
                    </center> 
                </div>
                
                <div id="divCarro" class="contenedorBtnMenu serInvisible " >
                    <?php 
                        $usuario = $_SESSION['usuario'];
                        $idCliente = $_SESSION['idCliente'];
                        $conexion = new mysqli('localhost','restaura','uch49a','restaurante');
                        $consulta = "SELECT platillo.nombre FROM pedido INNER JOIN "
                                . "pedidoplatillo on pedido.idPedido=pedidoplatillo.idPedido "
                                . "INNER JOIN platillo on pedidoplatillo.idPlatillo=platillo.idPlatillo "
                                . "WHERE pedido.idCliente='$idCliente'";
                        $resultado = $conexion->query($consulta);

                        if($resultado->num_rows > 0){
                          echo '<h1>Pedidos realizados: </h1><br>';
                          echo '<form method="POST">';//AGREGADO
                          for($i = 0; $i < $resultado->num_rows; $i++){
                              $resultado->data_seek($i);
                              $renglon = $resultado->fetch_array(MYSQLI_ASSOC);
                              echo $i.'.-'. $renglon['nombre'];
                              echo '<input type="checkbox" value='.$renglon['nombre'].'name="datos5[]"/>'//A
                              . '<label> Cancelar </label><br/>';//A
                            }
                        echo '<input type="submit" name="eliminar" value=" Eliminar Seleccionados"/>';//A
                        echo '</form>'; //A
                        }
                        
                    ?>
                    
                  <?php  
                    //Eliminar Pedidos
                    $usuario = $_SESSION['usuario'];
                    $idCliente = $_SESSION['idCliente'];
                    
                    if (isset($_POST['eliminar'])){
                        if (is_array($_POST['platillos'])) {
                            $tamArr = count($_POST['platillos']);
                            $limite = 0;
                            $conexion = new mysqli('localhost','restaura','uch49a','restaurante');
                            foreach ($_POST['datos5'] as $key => $value){
                                if ($limite != $tamArr) {
                                    $consulta = "DELETE FROM pedido WHERE idPedido ='$value' AND"
                                            . "idCliente ='$idCliente'";//Eliminar
                                    $resultado = $conexion->query($consulta);
                                }
                            $limite++;
                            }
                        }
                    }
                ?>
                    <button id="back1"> Cerrar </button>
                </div>
             
                <div id="divCompra" class="contenedorBtnMenu serInvisible" >
                    
                </div>
                
              <div class="contenedorCatalogo">
                <div class="cajaCatalogo">
                    <h2>Pozole</h2>
                    <div class="divFoto claseFotoCat foto1" id="foto1"></div>
                    <p>$40</p>
                    <form method="POST">
                        <input type="submit" value=" Ordenar " name="btnOrden1" class="letraForm">
                    </form>
                    <button id="ver1">Ver platillo</button>
                </div>

                <div class="cajaCatalogo">
                    <h2>Mole poblano</h2>
                    <div class="divFoto claseFotoCat foto2" id="foto2"></div>
                    <p>$50</p>
                    <form method="POST">
                        <input type="submit" value=" Ordenar " name="btnOrden2" class="letraForm">
                    </form>
                    <button id="ver2">Ver platillo</button>
                </div>

                <div class="cajaCatalogo">
                    <h2>Enchiladas</h2>
                    <div class="divFoto claseFotoCat foto3" id="foto3"></div>
                    <p>$70</p>
                    <form method="POST">
                        <input type="submit" value=" Ordenar " name="btnOrden3" class="letraForm">
                    </form>
                    <button id="ver3">Ver platillo</button>
                </div>

                <div class="cajaCatalogo">
                    <h2>Cochinita pibil</h2>
                    <div class="divFoto claseFotoCat foto4" id="foto4"></div>
                    <p>$100</p>
                    <form method="POST">
                        <input type="submit" value=" Ordenar " name="btnOrden4" class="letraForm">
                    </form>
                    <button id="ver4">Ver platillo</button>
                </div>

                <div class="cajaCatalogo">
                    <h2>Chiles en noganda</h2>
                    <div class="divFoto claseFotoCat foto5" id="foto5"></div>
                    <p>$45</p>
                    <form method="POST">
                        <input type="submit" value=" Ordenar " name="btnOrden5" class="letraForm">
                    </form>
                    <button id="ver5">Ver platillo</button>
                </div>

                <div class="cajaCatalogo">
                    <h2>Barbacoa</h2>
                    <div class="divFoto claseFotoCat foto6" id="foto6"></div>
                    <p>$500</p>
                    <form method="POST">
                        <input type="submit" value=" Ordenar " name="btnOrden6" class="letraForm">
                    </form>
                    <button id="ver6">Ver platillo</button>
                </div>
        
                <div class="cajaCatalogo">
                    <h2>Tamales</h2>
                    <div class="divFoto claseFotoCat foto7" id="foto7"></div>
                    <p>$15</p>
                    <form method="POST">
                        <input type="submit" value=" Ordenar " name="btnOrden7" class="letraForm">
                    </form>
                    <button id="ver7">Ver platillo</button>
                </div>

                <div class="cajaCatalogo">
                    <h2>Torta Ahogada</h2>
                    <div class="divFoto claseFotoCat foto8" id="foto8"></div>
                    <p>$35</p>
                    <form method="POST">
                        <input type="submit" value=" Ordenar " name="btnOrden8" class="letraForm">
                    </form>
                    <button id="ver8">Ver platillo</button>
                </div>

                <div class="cajaCatalogo">
                    <h2>Pescado Zarandeado</h2>
                    <div class="divFoto claseFotoCat foto9" id="foto9"></div>
                    <p>$60</p>
                    <form method="POST">
                        <input type="submit" value=" Ordenar " name="btnOrden9" class="letraForm">
                    </form>
                    <button id="ver9">Ver platillo</button>
                </div>

                <div class="cajaCatalogo">
                    <h2>Tacos</h2>
                    <div class="divFoto claseFotoCat foto10" id="foto10"></div>
                    <p>$9</p>
                    <form method="POST">
                        <input type="submit" value=" Ordenar " name="btnOrden10" class="letraForm">
                    </form>
                    <button id="ver10">Ver platillo</button>
                </div>
              </div>
            </section>
          </main>
          <div class="platillo serInvisible" id="info1">
            <div class="contInfoPlatillo">
                <div class="Info" id="vi1">
                    <img class="rece1" src="Plato1.jpg" align="rigth" border="1" alt="" "logo="" css3"="">
                </div>
                <div class="Info"> 
                     <h2 class="titulo1">Pozole Rojo Receta</h2>
                         <ol class="ingre1 ">
                             1 kilo de maíz pozolero precocido<br>
                             1 cabeza de ajo<br>
                             1 kilo de carne de puerco, cortada en cubos<br>
                             1 jitomate grande<br>
                             100 gramos de chile mirasol (guajillo)<br>
                             1/4 cucharadita de orégano<br>
                             1 pizca de cominos<br>
                             1 diente de ajo<br>
                         </ol>
                         <br>
                         <ol class="Proc1">
                            Coloca el maíz en una olla grande, cubre con agua, agrega 1 cabeza de ajo y sal al gusto y cocina a fuego medio durante 2 horas.<br>
                            Después de ese tiempo, agrega la carne a la olla y cocina durante 1 hora o hasta que la carne esté bien suave. Desecha la cabeza de ajo.<br>
                            Mientras, hierve el jitomate hasta que se haya ablandado. Remoja los chiles en agua caliente hasta que estén suaves, quítales las semillas
                                y el rabo y muélelos junto con el jitomate, sal, orégano, cominos y 1 diente de ajo. Cuela.<br>
                            Cuando ya está suave la carne, sácala de la olla y deshébrala.<br>
                            Vierte la salsa roja dentro de la olla con el maíz y deja que suelte el hervor. Regresa la carne deshebrada a la olla, rectifica la sazón 
                                y deja que hierva unos minutos más antes de servir.<br>
                            Sirve con lechuga picada, cebolla picada y unas gotas de jugo de limón. Acompaña con tostadas.<br>
                         </ol>
                    <p></p>
                </div>
            </div>
            <button id="back1">Regresar</button>
          </div>

           <div class="platillo serInvisible" id="info2">
                <div class="contInfoPlatillo">
                    <div class="Info" id="vi2">
                        <!--Aqui va a ir el video-->
                        <img class="rece1" src="Plato2.jpg" align="rigth" border="1" alt="" "logo="" css3"="">
                    </div>
                    <div class="Info">

                        <h2 class="titulo1">Mole Poblano Receta</h2>
                         <ol class="ingre1 ">
                            Manteca de cerdo para freír,
                            1 kilo de chile mulato, despepitado y desvenado,
                            125 gramos de chile pasilla, despepitado y desvenado,
                            10 chiles anchos, despepitados y desvenados,
                            3 chiles mecos, despepitados y desvenados,
                            1/2 kilo de almendras,
                            1/2 kilo de pasas,
                            1/2 cucharada de pimienta entera,
                            3 rebanadas de pan bolillo, telera o baguette,
                            5 tabletas de chocolate de mesa y
                            3 jitomates, en trozos y sin semillas
                         </ol>
                         <br>
                         <ol class="Proc2">
                            Calienta la manteca en un sartén o cacerola grande a fuego medio-alto. Fríe todos los chiles cuidando que no se quemen. 
                            El chile chipotle debe quemarse ligeramente para evitar que el mole salga muy picoso. Retira del fuego y coloca en un tazón grande.
                            Agrega al mismo sartén las almendras y dóralas uniformemente, cuidando que no se quemen. Pásalas al tazón de los chiles. Sigue el mismo procedimiento con las pasas, luego el anís, cilantro, pimienta, clavos de olor y raja de canela.
                            Fríe en el mismo sartén las rebanadas de pan, luego la tortilla y, finalmente, el chocolate de mesa. Pasa los ingredientes al tazón de los chiles conforme los vayas sacando del sartén.
                            Fríe los trozos de jitomate en otro sartén con muy poca manteca. Una vez listos, pásalos al tazón con los otros ingredientes fritos.
                            Pela la cabeza de ajo y asa los dientes en un comal a fuego medio hasta que tomen un color café, aproximadamente 5 minutos. Agrega al tazón con el resto de los ingredientes.
                            Tuesta el azúcar en un sartén limpio a fuego medio-bajo, cuidando que no se disuelve, y colócala dentro del tazón con el resto de los ingredientes.
                            Muele todos los ingredientes de poco a poco en un procesador de alimentos (o metate, si prefieres). Mezcla bien hasta formar una pasta homogénea.
                            Tu mole está listo para usarse o para guardarse en un frasco de vidrio bien tapado.
                         </ol>
                  
                    </div>
                </div>
                <button id="back2">Regresar</button>
            </div>

           <div class="platillo serInvisible" id="info3">
                <div class="contInfoPlatillo">
                    <div class="Info" id="vi3">
                        <!--Aqui va a ir el video-->
                        <img class="rece1" src="Plato3.jpg" align="rigth" border="1" alt="" "logo="" css3"="">
                    </div>
                    <div class="Info">

                         <h2 class="titulo1">Enchiladas Receta</h2>
                         <ol class="ingre1 ">
                            1/4 taza de aceite vegetal<br>
                            4 tortillas de maíz<br>
                            125 gramos de pollo, desmenuzado<br>
                            3/4 taza de mole preparado<br>
                            Agua (opcional)<br>
                            Sal al gusto<br>
                            25 gramos queso freso o cotija, rallado<br>
                         </ol>
                         <br>
                        <ol class="Proc3">
                            Calienta el aceite en un sartén a fuego medio-alto. Una vez caliente, pasa las tortillas, una por una, hasta que se suavicen, pero cuidando que no se doren (aproximadamente 5 segundos).
                            Escurre y reserva.<br>
                            Coloca el pollo y el mole en un sartén mediano a fuego moderado y deja que hierva suavemente durante un par de minutos. Si se espesa demasiado, agrega agua a cucharadas para el mole a tu gusto. 
                            Si es necesario, agrega sal.<br>
                            Una vez listo el mole, mueve el pollo hacia un lado del sartén y pasa las tortilla por el mole cubriéndolas completamente de la salsa. Rellena las tortillas con pollo, enrolla y acomoda en un plato. 
                            Espolvorea con queso.<br>
                        </ol>
                    </div>
                </div>
                <button id="back3">Regresar</button>
            </div>  

           <div class="platillo serInvisible" id="info4">
                <div class="contInfoPlatillo">
                    <div class="Info" id="vi4">
                     <img class="rece1" src="Plato4.jpg" align="rigth" border="1" alt="" "logo="" css3"="">
                    </div>
                    <div class="Info">

                        <h2 class="titulo1">Cochinita Pibil Receta</h2>
                         <ol class="ingre1 ">
                            1 cebolla morada, en rebanadas delgadas,
                            5 chiles habaneros (o al gusto), rebanados,
                            20 limones agrios, su jugo,
                            Sal, al gusto,
                            100 gramos de chiles guajillos de los que no pican, desvenados y remojados,
                            1 cucharada de aceite vegetal,
                            1 1/2 kilos de cabeza de lomo de puerco en cubos de 2 centímetros,
                            3 tazas de jugo fresco de naranja dulce,
                            1 taza de vinagre,
                            1 cabeza de ajos, pelados,
                            1/2 barra (50 gramos) de achiote y
                            Sal, al gusto.
                         </ol>
                         <br>
                        <ol class="Proc3">
                            Mezcla la cebolla con los chiles y el jugo de limón en un tazón de vidrio o cerámica. Sazona con sal y deja reposar, moviendo de vez en cuando, hasta el momento de servir.<br>
                            Calienta el aceite en una olla de presión a fuego medio-alto. Salpimienta la carne y fríela en el aceite caliente, moviendo de vez en cuando, hasta que se haya dorado 
                            uniformemente, aproximadamente 15 minutos.<br>
                            Mientras, licua el jugo de naranja con los chiles, vinagre, ajo, achiote y sal, hasta tener una mezcla homogénea. Vierte sobre la carne sellada. 
                            Tapa la olla y reduce el fuego cuando empiece a sonar la válvula. Cocina durante 45 minutos.<br>
                            Apaga la olla y deja que baje la presión. Pasa la carne a un tazón y reserva los jugos en la olla. Deshebra la carne y vierte encima los jugos reservados.<br>
                        </ol>
                    </div>
                </div>
                <button id="back4">Regresar</button>
            </div>     

           <div class="platillo serInvisible" id="info5">
                <div class="contInfoPlatillo">
                    <div class="Info" id="vi5">
                        <!--Aqui va a ir el video-->
                        <img class="rece1" src="Plato5.jpg" align="rigth" border="1" alt="" "logo="" css3"="">
                    </div>
                    <div class="Info">

                        <h2 class="titulo1">Chiles en Nogada Receta</h2>
                         <ol class="ingre1 ">
                            2 cucharadas de aceite,
                            1 cebolla, picada,
                            2 dientes de ajo, picados,
                            2 zanahorias, peladas y picadas,
                            1 pera, cortada en cubos,
                            1 durazno, cortado en cubos,
                            1 rebanada piña, picada,
                            1 plátano macho, pelado y picado,
                            8 aceitunas, deshuesadas y picadas,
                            5 uvas pasa,
                            1 cucharada de acitrón y
                            500 gramos de carne molida de res
                         </ol>
                         <br>
                        <ol class="Proc3">
                            Calienta el aceite en una cacerola a fuego medio. Agrega la cebolla y el ajo, y sofríe hasta que se vean transparentes. 
                            Añade la zanahoria, pera, durazno, piña, plátano y aceitunas; cocina durante 8 minutos, moviendo constantemente. 
                            Incorpora la carne, mezcla bien y cocina, moviendo de vez en cuando, hasta que se haya cocido completamente, aproximadamente 20 minutos.
                            Apaga y agrega las pasas y el acitrón. Mezcla bien y deja reposar mientras preparas la nogada.<br>
                            Para preparar la nogada, licua las nueces y las almendras con la crema, queso, Jerez y azúcar, hasta tener una salsa espesa y homogénea.<br>
                            Rellena los chiles poblanos con el picadillo, baña con la salsa nogada y espolvorea con granos de granada y un cilantro picado.<br>
                        </ol>
                    </div>
                </div>
                <button id="back5">Regresar</button>
            </div>   

           <div class="platillo serInvisible" id="info6">
                <div class="contInfoPlatillo">
                    <div class="Info" id="vi6">
                        <!--Aqui va a ir el video-->
                        <img class="rece1" src="Plato6.jpg" align="rigth" border="1" alt="" "logo="" css3"="">
                    </div>
                    <div class="Info">
                         <h2 class="titulo1">Barbacoa Receta</h2>
                         <ol class="ingre1 ">
                            1 kilo de suadero,
                            1 chilacate,
                            3 chiles pasilla,
                            3 clavos,
                            ½ cucharadita de tomillo,
                            2 hojas de laurel,
                            10 pimientas gordas,
                            ½ cucharadita de comino,
                            3 dientes de ajo,
                            1 cucharada de sal,
                            Cebolla desflemada o picada y
                            Tortillas de maíz
                         </ol>
                         <br>
                        <ol class="Proc3">
                        Primero se remoja la carne en agua con sal durante media hora. Pasado ese tiempo se escurre y se pone a cocer con ajo, laurel y una cucharadita de sal.<br>
                        Aparte se remojan los chiles y se muelen en la licuadora con clavo, pimienta y cominos. Esta salsa se cuela.<br>
                        Ya cocida la carne se corta en trocitos pequeños y se baña con el chile licuado y caldo de la carne; se regresa al fuego unos minutos a que sazone.<br>
                        Se escurre la carne y se fríen los pedacitos. Las tortillas se mojan en la salsa, se arman los tacos y se calientan en comal o parrilla. 
                        Se ofrecen con cebolla desflemada y chile picante.<br>
                        </ol>                        
                    </div>
                </div>
                <button id="back6">Regresar</button>
            </div>

           <div class="platillo serInvisible" id="info7">
                <div class="contInfoPlatillo">
                    <div class="Info" id="vi7">
                        <!--Aqui va a ir el video-->
                        <img class="rece1" src="Plato7.jpg" align="rigth" border="1" alt="" "logo="" css3"="">
                    </div>
                    <div class="Info">
                        <h2 class="titulo1">Tamales Receta</h2>
                         <ol class="ingre1 ">
                            1/2 kilo de carne de pollo,
                            300 gramos de tomates verdes,
                            Chiles serranos verdes, al gusto,
                            1 cebolla chica,
                            1 diente de ajo,
                            3 cucharadas de hojas de cilantro,
                            1/4 kilo de manteca,
                            1/2 cucharada de polvo para hornear,
                            1/2 cucharada de sal,
                            3 tazas de caldo de pollo,
                            1/2 kilo de harina para tamales y
                            Hojas de maíz, remojadas en agua caliente y escurridas
                        </ol>
                         <br>
                        <ol class="Proc1">
                            Cuece la carne de pollo en una olla con agua y sal hasta que esté suave. Deshebra finamente.<br>
                            Coloca los tomates y los chiles en una olla, cúbrelos con agua y deja que hiervan hasta que los tomates hayan cambiado de color y estén suaves, pero no deshaciéndose. 
                            Licúa los tomates y los chiles junto con la cebolla, ajo y cilantro.<br>
                            Calienta 1 cucharada de manteca en una cacerola a fuego medio y vierte la salsa anterior; fríe durante unos minutos, luego agrega la carne de pollo deshebrada y sazona con sal al gusto.<br>
                            Bate el resto de la manteca en un tazón grande hasta que se esponje. Añade el polvo para hornear, sal, caldo de pollo y harina; sigue batiendo hasta que todos 
                            los ingredientes se hayan incorporado. La masa estará lista cuando una una bolita de la misma pueda flotar de un vaso con agua.<br>
                            Para armar los tamales, pon 2 cucharadas de masa y 1 cucharada de relleno en cada hoja de tamal. Dobla bien los tamales y acomódalos sobr ela parrilla de una olla vaporera con agua hirviendo. 
                            Tapa y cuece hasta que el tamal se desprenda fácilmente de la hoja, aproximadamente 1 hora.<br>
                        </ol>                        
                    </div>
                </div>
                <button id="back7">Regresar</button>
            </div>

           <div class="platillo serInvisible" id="info8">
                <div class="contInfoPlatillo">
                    <div class="Info" id="vi8">
                        <!--Aqui va a ir el video-->
                        <img class="rece1" src="Plato8.jpg" align="rigth" border="1" alt="" "logo="" css3"="">
                    </div>
                    <div class="Info">
                         <h2 class="titulo1">Torta Ahogada Receta</h2>
                         <ol class="ingre1">
                            250 gramos de chiles de árbol secos
                            15 dientes de ajo sin pelar
                            1 cucharadita de orégano seco
                            1 cucharada de sal
                        </ol>
                         <br>
                        <ol class="Proc1">
                        Tuesta los chiles en un comal a fuego medio-bajo, volteando una o dos veces y cuidando que no se quemen. Retira del comal y reserva.<br>
                        Tuesta los ajos en el mismo comal a fuego medio-alto, volteando de vez en cuando, hasta que la mayor parte de su cascara se haya quemado. 
                        Pela. Calienta el aceite en una cacerola grande a fuego medio. Cuando esté bien caliente, dora los ajos y retíralos. Apaga el fuego.
                        Agrega lo chiles y deja que se doren con el calor del aceite. Licua los ajos y la sal. Agrega un poco de agua, sólo la suficiente como para facilitar el proceso de licuado.  
                        Cuela y sirve.<br>
                        Licua los chiles con los ajos pelados, orégano, sal y suficiente agua como para tener una salsa ni muy aguada ni muy espesa. Cuela y rectifica el sazón.<br>
                        </ol>                        
                    </div>
                </div>
                <button id="back8">Regresar</button>
            </div>

           <div class="platillo serInvisible" id="info9">
                <div class="contInfoPlatillo">
                    <div class="Info" id="vi9">
                        <!--Aqui va a ir el video-->
                        <img class="rece1" src="Plato9.jpg" align="rigth" border="1" alt="" "logo="" css3"="">
                    </div>
                    <div class="Info">
                       <h2 class="titulo1">Pescado Zarandeado Receta</h2>
                         <ol class="ingre1">
                            1 pescado hachinango de 1 kilo, abierto y limpio,
                            1 cucharada de aceite,
                            1 trocito de jengibre fresco,
                            Chiles serranos verdes, al gusto,
                            2 dientes de ajo,
                            Sal, al gusto,
                            3 pimientas,
                            2 limones, su jugo y 
                            Salsa picante de botella (p. ej. Tamazula®, Valentina®, Huichol®)
                        </ol>
                         <br>
                        <ol class="Proc1">
                            Precalienta el asador a fuego medio y unta el aceite sobre el pescado.<br>
                            Coloca el jengibre, chiles, ajo, sal y pimienta en un molcajete o mortero; tritura hasta tener una pasta homogénea. 
                            Vierte la pasta dentro de un tazón chico y mezcla con el jugo de limón y la salsa de botella.<br>
                            Unta el pescado por todos lados con la mezcla y déjalo reposar durante 10 minutos, luego colócalo en una parrilla para asar, asegurándote de que quede bien prensado.
                             �?salo durante aproximadamente 10 minutos por lado.<br>
                            Deja que el pescado repose durante por lo menos 5 minutos antes de servir.<br>
                        </ol>                  
                    </div>
                </div>
                <button id="back9">Regresar</button>
            </div>

           <div class="platillo serInvisible" id="info10">
                <div class="contInfoPlatillo">
                    <div class="Info" id="vi10">
                        <!--Aqui va a ir el video-->
                        <img class="rece1" src="Plato10.jpg" align="rigth" border="1" alt="" "logo="" css3"="">
                    </div>
                    <div class="Info">
                            <h2 class="titulo1">Tacos</h2>
                         <ol class="ingre1">
                            2 kilos de cachete de res,
                            1 cebolla blanca, entera,
                            1 cabeza grande de ajo,
                            1 chile serrano verde
                            1 cucharadita de orégano seco molido,
                            1 cucharadita de laurel seco molido,
                            1 cucharadita de pimienta entera,
                            Sal, al gusto,
                            <h2>Para servir</h2>
                            Tortillas de maíz, calientes,
                            1 cebolla blanca, picada,
                            1 manojo de cilantro, sus hojas picadas,
                            1 repollo, finamente picado,
                            Limones,
                            Salsa para tacos (verde o roja),
                            </ol>
                         <br>
                        <ol class="Proc1">
                          Coloca coloca la carne, cebolla, ajo y chile en una olla "presto" o de presión. Agrega suficiente agua como para cubrir la carne y añade las especias y la sal. Tapa la olla y cuece a presión durante 1 1/2 horas (en una olla normal el cocimiento será de 3 horas, aproximadamente).<br>
                         Saca la carne de la olla y desmenúzala con un tenedor. Sírvela sobre tortillas calientes con cebolla picada, cilantro, repollo, unas gotas de jugo de limón y salsa taquera verde o roja.
                        </ol>     
                       
                    </div>
                </div>
                <button id="back10">Regresar</button>
            </div>
      </div>
  </div>
</body>
</html>