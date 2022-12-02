<?php

function ConectarBD(){

$servidor = "localhost";
$baseDatos = "edus";
$usuario = "root";
$clave = "";

return mysqli_connect($servidor, $usuario, $clave, $baseDatos);
}

function CierreBD($enlace){
mysqli_close($enlace);
}



?>
