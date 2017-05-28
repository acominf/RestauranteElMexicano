<?php  session_start();
$usuario = $_SESSION['usuario'];
session_destroy();
    
    echo "<h1>Adios $usuario Sesion Cerrada</h1>";
    //echo "<a href = 'index.php'>Regresar al inicio</a>";
    header('Location: index.php');
  
?>