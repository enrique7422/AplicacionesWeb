

<?php

include_once '../BD/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id_ruta = filter_input(INPUT_POST, 'id_dis');
$direccion = filter_input(INPUT_POST, 'direccion');
$lat = filter_input(INPUT_POST, 'lat');
$lon = filter_input(INPUT_POST, 'lon');



$consulta = "UPDATE rutas SET direccion='$direccion', latitud='$lat', longitud='$lon' WHERE id_ruta='$id_ruta' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
?>

<script src="../js/actualizacion_ruta.js"></script>
