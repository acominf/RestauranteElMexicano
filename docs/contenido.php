<?php session_start();
 

 if(!isset($_SESSION['usuario'])){
     header('Location: index.php');
}

//  if(!isset($_SESSION['usuario'])){
//     echo '<h1>no has iniciado sesion </h1>';
//      header('Location: index.php');
// }
// else{
//     $usuario = $_SESSION['usuario'];
//     echo "<h1>Hola $usuario Sesion iniciada</h1>";
//     echo "<a href='cerrar.php'>Cerrar session</a>";
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contenido</title>
</head>
<body>
    <p>Lorem</p>
    <a href='cerrar.php'>Cerrar session</a>

</body>
</html>