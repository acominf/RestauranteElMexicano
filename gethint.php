<?php
// Array with names
$conexion = new mysqli('localhost','root','','restaurante');
$consulta = "SELECT Nombre FROM cliente";
$resultado = $conexion->query($consulta);

for($i = 0 ;$i < $resultado->num_rows; $i++){
    $resultado->data_seek($i);
    $renglon = $resultado->fetch_array(MYSQLI_ASSOC);
    $a[] = $renglon['Nombre'];
}

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>