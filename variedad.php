<!DOCTYPE html>
<?php session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Variedad</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div class="contenedor">
        <header>
              <div class="contenedorMenu">
                  <div class="logo">
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
            <!--TODAS LAS CAJAS DEBEN DE IR DENTRO DEL MAIN-->
            <!--CAJAS QUE VAN EN VARIEDAD-->
            <div class="caja cajaVariedad ">
                <div class="cajaImagenVariedad claseFotoCat foto5"></div>
                <div class="cajaImagenVariedad cajaTextVar">
                    <H2>CHILES EN NOGADA</H2>
                    <p>El chile en nogada, es uno de los platillos típicos de la gastronomía mexicana, más concretamente del estado de Puebla.</p>
                </div>
            </div>

            <div class="caja cajaVariedad ">
                <div class="cajaImagenVariedad claseFotoCat foto4"></div>
                <div class="cajaImagenVariedad cajaTextVar">
                    <H2>COCHINITA PIBIL</H2>
                    <p>La cochinita pibil es un platillo de la gastronomía yucateca, basado en carne de cerdo adobada en achiote,
                        envuelta en hoja de plátano y cocida dentro de un horno de tierra. La cochinita pibil se acompaña con cebolla morada en naranja agria. Generalmente en tortas y tacos con un encurtido de chile habanero muy común en la región.</p>
                </div>
            </div>

            <div class="caja cajaVariedad ">
                <div class="cajaImagenVariedad claseFotoCat foto6"></div>
                <div class="cajaImagenVariedad cajaTextVar">
                    <H2>BARBACOA</H2>
                    <p>
                       En México, el término barbacoa hace referencia principalmente al método tradicional usado para preparar diversas carnes,
                       ya sea de vacuno, de oveja, de cabra y eventualmente de conejo, de pollo, de pescado, de venado y hasta de iguana, cociéndolas 
                       en su propio jugo o al vapor.
                    </p>
                </div>
            </div>

             <div class="caja cajaVariedad ">
                <div class="cajaImagenVariedad claseFotoCat foto3"></div>
                <div class="cajaImagenVariedad cajaTextVar">
                    <H2>ENCHILADAS</H2>
                    <p>
                       La enchilada es un plato que en México se elabora con tortilla de maíz bañada en alguna salsa picante utilizando chile en su preparación. 
                        Dependiendo del estilo, la enchilada puede ir acompañada o rellena de carnes pollo, pavo,res ó queso; además de ser acompañada de alguna 
                        guarnición adicional, que generalmente consiste en cebolla fresca picada o en rodajas, lechuga, crema de leche y queso.
                    </p>
                </div>
            </div>

            <div class="caja cajaVariedad ">
                <div class="cajaImagenVariedad claseFotoCat foto2"></div>
                <div class="cajaImagenVariedad cajaTextVar">
                    <H2>MOLE</H2>
                    <p>
                        La historia del mole se remonta a la época precolombina. Se narra que los aztecas preparaban para los grandes señores un platillo
                        complejo llamado "mulli", que significa potaje o mezcla. El Mole consiste principalmente en una salsa de una gran variedad de 
                        ingredientes vertida sobre piezas de carne que pueden ser desde un Guajolote hasta Cerdo.
                    </p>
                </div>
            </div>

             <div class="caja cajaVariedad ">
                <div class="cajaImagenVariedad claseFotoCat foto10"></div>
                <div class="cajaImagenVariedad cajaTextVar">
                    <H2>TACOS</H2>
                    <p>
                        El taco, como cualquier otra manifestación de cultura culinaria de México está directamente asociado a los ingredientes utilizados en 
                        cada región geográfica del país. Lo cierto es que en los últimos años los tacos se han convertido en uno de los platillos más reconocidos
                        de México en el mundo. 
                    </p>
                </div>
            </div>

            <div class="caja cajaVariedad ">
                <div class="cajaImagenVariedad claseFotoCat foto7"></div>
                <div class="cajaImagenVariedad cajaTextVar">
                    <H2>TAMALES</H2>
                    <p>
                        Según los expertos México es el país con más variedad de tamales de todo el mundo. Cada estado o ciudad o pueblo tiene decenas de tamales. 
                        Se calcula que la variedad de tamales podría alcanzar casi 5,000 en todo México. Se llaman de muchas formas: vaporcitos, nacatamales, chuchitos, 
                        chanchamitos, padzitos, estos es, tamales mexicanos.
                    </p>
                </div>
            </div>

             <div class="caja cajaVariedad ">
                <div class="cajaImagenVariedad claseFotoCat foto1"></div>
                <div class="cajaImagenVariedad cajaTextVar">
                    <H2>POZOLE</H2>
                    <p>
                        El pozole es un platillo difundido en casi todo el país, los más famosos son los de Jalisco, Michoacán, Tepic, Colima, 
                        Guanajuato y Guerrero. Entre los que se destacan, desde luego, el pozole blanco que es el básico, aunque también existen 
                        sus variantes en verde y rojo, curiosamente los tres colores de la bandera de México.
                    </p>
                </div>
            </div>

            <div class="caja cajaVariedad ">
                <div class="cajaImagenVariedad claseFotoCat foto8"></div>
                <div class="cajaImagenVariedad cajaTextVar">
                    <H2>TORTA AHOGADA</H2>
                    <p>
                       La torta ahogada es uno de los platillos más típicos y representativos del estado Jalisco en México, particularmente 
                       de la ciudad de Guadalajara; aunque su popularidad se ha extendido a diferentes regiones del país. 
                    </p>
                </div>
            </div>

             <div class="caja cajaVariedad ">
                <div class="cajaImagenVariedad claseFotoCat foto9"></div>
                <div class="cajaImagenVariedad cajaTextVar">
                    <H2>PESCADO ZARANDEADO</H2>
                    <p>
                      El Pecado Zarandeado es un platillo típico de las costas de Sinaloa y Nayarit, básicamente es un pescado preparado a 
                      las brasas con una interesante mezcla de especias, el pez más utilizado para preparar este platillo es el “Huachinango”, 
                      debido a su gran tamaño y su buen sabor.
                    </p>
                </div>
            </div>
            <!-- Fin de la caja -->

        </main>
</body>
</html>