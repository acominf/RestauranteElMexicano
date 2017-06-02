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

     <div class="HistoriaDes">

                  <p class="Ph1">
                       Hablar de la gastronomía mexicana es hacer un viaje en el tiempo para aprender acerca de los elementos culturales más importantes no solo en la historia de América Latina, sino de todo el mundo. 
                       Con el reciente nombramiento por parte de la UNESCO como Patrimonio Cultural Intangible de la Humanidad, esta cocina en particular finalmente ha destacado en el mundo para reclamar su lugar en 
                       nuestros tiempos modernos, pero lo ha logrado respetando sus tradiciones y honrando sus más de 1,000 años de historia. Caminar por esta misma historia que hace que cada platillo sea único y 
                       espectacular no solo en términos de sabores y aromas, sino en espíritu e identidad. 
                       La cocina auténtica de México no es lo que puedes encontrar en tu restaurante mexicano promedio. Para hallarla, primero debemos entender de dónde viene y cómo ha cambiado y creado hasta leyendas 
                       e historias que se cuentan de generación en generación.

                  </p>

                  <p>
                      Primero, debe quedarnos claro que México no fue una colonia, sino un virreinato, lo que causo que la colisión de dos formas de entender la comida fuera inmensa. Antes de la llegada de los españoles, la dieta de las culturas prehispánicas se basaba ampliamente en platillos de maíz con chiles y hierbas, usualmente complementados con frijoles, jitomates o nopales. También incluían vainilla, tomatillos, aguacate, guayaba, papaya, sapote, mamey, piña, jícama, calabaza, papa dulce, cacahuates, achiote, huitlacoche, pavo y pescados. Para la segunda década del siglo XVI, la invasión española también significó la llegada de unas grandes variedades de animales, como el ganado, gallinas, cabras, ovejas y cerdos. Y no solo eso, pues también llegó el arroz, el trigo, la avena, el aceite de oliva, el vino, almendras, perejil y muchas especias que se fusionaron con la cultura y, eventualmente, se convirtieron en parte de la cocina indígena.

                  </p>

                  <p>
                      Sin embargo, no debemos confundir esto como una fusión completa, pues los españoles no alteraron la comida mexicana, sino que trajeron ingredientes que sólo exponenciaron su potencial. La cocina mexicana que se desarrolló a través de este intercambio es compleja y una de las razones por las que es una de las más grandes cocinas de todo el mundo.

                  </p>

                  <p>
                     Los primeros registros de lo que los españoles encontraron en su camino por México se conoce gracias a la detallada descripción que uno de los hombres de Hernán Cortés hizo. Bernal Díaz del Castillo escribió en su libro “Historia Verdadera de la Conquista de la Nueva España” su asombro con la cantidad de ingredientes y tradiciones alrededor de cada comunidad indígena que cruzaban en su recorrido. Díaz del Castillo habla sobre lo que el empreador Moctezuma comía y cómo era presentado:

                  </p>

                  <p>
                      Díaz describe la alimentación tan rica que podía ser fácil abandonar por ella hasta sacrificios rituales. También había cacao y en grandes cantidades. Había pasteles, como Díaz los llamaba, hechos de maíz y “eran traídos en platos cubiertos con servilletas limpias.” Descibre   los pasteles de maíz como hechos con huevos y otros ingredientes.
                  </p>
                   
                   <p>
                        Los primeros nativos de México no tenían hornos, en lugar de ello calentaban la comida sobre fuego, usando sartenes de hierro y de cerámica. Otro método utilizado era al vapor. Suspendían la carne envuelta en hojas de cactus o de plátano sobre agua hirviendo en un pozo profundo y también utilizaban la grasa para freír como un método muy popular.

                   </p>

                   <p>
                        Utilizaban el metate, una herramienta hecha con piedra volcánica que se usaba como una piedra de moler o el molcajete, que era más pequeño y que se utilizaba como el mortero para moler y machacar ingredientes en un molcajete que podía ser de piedra, madera, cerámica o mármol.

                   </p>

                   <p>
                        Cuando la Nueva España fue establecida, la gastronomía se reservó para los conventos en donde las comunidades indígenas ahora servían como amas de llaves y personal de cuidado y fueron quienes, a través de las tradiciones orales, mantuvieron vivas las recetas y las técnicas por más de un siglo. Es importante entender que el primer libro de recetas del que se tiene registro en el México virreinal fue escrito por Sor Juana Inés de la Cruz. Durante años, el conocimiento se dividió en tres: los conventos que iban adaptando las técnicas españolas y europeas a la vasta cantidad de ingredientes de México. Aquí, los más importantes platillos dulces eran hechos y, hasta ahora, la cocina de postres mexicana es una de las más importantes alrededor del mundo; en segundo lugar, la cocina prehispánica sobrevivió hasta nuestros días debido a las múltiples comunidades étnicas desde Baja California hasta Chiapas, donde actualmente podemos disfrutar de platillos de la misma forma en que han sido preparados por más de 3,000 años. La otra parte de nuestra gastronomía se encontraba en las haciendas, donde la cocina multicultural tomó forma gracias a la cosmopolita cantidad de trabajadores que llegaron a México con sus técnicas y sabores, además de sus ingredientes, originarios de Asia y África.

                   </p>

                   <p>
                       Sin embargo, la cocina Mexicana sufrió un verdadero abandono por muchos años. En la década de 1970, se pensaba que la gastronomía nacional no debía llegar a las grandes mesas, una idea aprendida, quizá, de la época de principios de siglo cuando todo lo que tenía un mínimo de importancia o prestigio era de origen francés, tanto en la comida como en las artes o la arquitectura, una idea concebida e impulsada por el presidente Porfirio Díaz, quien durante sus más de 30 años en el poder, concibió una nueva clase de aristocracia y los llevó al poder tanto económico como social en México, convencidos de que las maneras francesas y europeas eran lo mejor que había en el planeta, dejando a un lado las tradiciones nacionales y los ingredientes. Como consecuencia de este vacío de casi un siglo, muchos ingredientes tradicionales de la cocina prehispánica comenzaron a desaparecer y a extinguirse y, debido a esto, hoy en día hay un movimiento nuevo de cocineros y académicos que tienen una sola misión: rescatar y restaurar la grandeza de nuestra cocina para las nuevas generaciones. Gente como Alicia Gironella, Ricardo Muñoz Zurita, Carmen Ramírez Degollado y muchos otros han estado trabajando incansablemente por más de 20 años tratando –exitosamente en muchas ocasiones- de crear nuevas maneras de apoyar y hacer sustentable la cadena de producción de la gastronomía nacional. El trabajo de investigación exposición, restauración y hasta redención de la cocina indigente finalmente está llegando a buen puerto en la industria a nivel mundial. Es importante mencionar que el nombramiento de la UNESCO llegó como resultado de un proyecto principalmente basado en exacerbar no sólo la cocina mexicana contemporánea, sino principalmente la prehispánica, mostrando lo que se sigue haciendo en estados como Michoacán, Estado de México, Jalisco, Oaxaca y Chiapas.
                  </p>
                  
                  <p>     
                    La cocina mexicana es más que moles, salsas o tortillas. Es algo lleno de sabores e ingredientes de una gran variedad que, incluso el chef peruano Gastón Acurio se ha preguntado si hay otro lugar en el planeta en donde la variedad de productos sea “tan asombrosamente vasta”. Debido a esto, no es sorpresa como puede uno encontrar anécdotas como la que cuenta que la primera receta de sushi extranjera aprobada por un maestro japonés fue una creada en México a final de la década de los 70, o aquella en la que un cocinero regional descubrió en las comunidades indígenas que las cocineras aún preparan sus platillos de acuerdo al peso del ingrediente principal medido con el peso de piedras de río que utilizan en un balancín para preparar un platillo que se hace religiosamente sólo una vez al año en la ribera del lago de Pátzcuaro, dentro de las comunidades creadas por Vasco de Quiroga en el siglo XVI.
                  </p>

                  <p>
                      Esto es lo que hace a la gastronomía mexicana una estrella en el mundo. Las tradiciones son lo suficientemente fuertes para defenderse en el vórtice de un mundo moderno que busca desesperadamente simplificar todos los procesos. Y, justo así, con esta defensa a ultranza, los moles, panuchos, corundas, mixiotes, tamales y otros platillos, observan desde la orilla del camino esperando que esta velocidad detenga un poco su dinámica y se pregunte de dónde viene ese aroma mágico y, atraída al mismo, tome un descanso para sentarse a una mesa servida por más de 3,000 años lista para sorprender a cualquiera con la suficiente curiosidad para entrar a un mundo de sabores del que nunca querrán salir.

                  </p>
                   

              </div>
      <main>  
      </main>
  </div>
</body>
</html>