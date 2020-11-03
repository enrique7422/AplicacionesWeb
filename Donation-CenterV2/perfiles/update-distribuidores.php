<?php
session_start();

$contraseña_sesion=$_SESSION['contraseña'];

?>


<?php

include_once '../BD/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id_dis = filter_input(INPUT_POST, 'id_dis');
$nombre = filter_input(INPUT_POST, 'nombre');
$apellidos = filter_input(INPUT_POST, 'apellidos');
$telefono = filter_input(INPUT_POST, 'telefono');
$direccion = filter_input(INPUT_POST, 'direccion');
$correo = filter_input(INPUT_POST, 'correo');

$contraseña = filter_input(INPUT_POST, 'contraseña');

if($contraseña!=$contraseña_sesion){
        $contraseña=hash('sha512',$contraseña);        
}

$lat = filter_input(INPUT_POST, 'lat');
$lon = filter_input(INPUT_POST, 'lon');



$consulta = "UPDATE usuarios SET nombre='$nombre', nombre='$nombre', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', correo='$correo', contraseña='$contraseña', latitud='$lat', longitud='$lon'
WHERE id_usuario='$id_dis' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
?>

<script src="../js/actualizacion.js"></script>

