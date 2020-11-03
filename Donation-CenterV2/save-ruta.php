<?php

include 'BD/config.php';
include 'BD/db.php';



$direccion = filter_input(INPUT_POST, 'direccion');

$lat = filter_input(INPUT_POST, 'lat');

$lon = filter_input(INPUT_POST, 'lon');


// Obtención del objeto PDO para la interaccion con DB.
$db = getPdo();  

// Comando SQL para insertar el registro.
$sqlCmd = 'INSERT INTO rutas(direccion, latitud, longitud) VALUES (:direccion, :lat, :lon)';

// Obtención del objeto Statement para hacer la ejecución a la DB.
$stmt = $db->prepare($sqlCmd);

// Paso de parámetros al comando SQL de insert.

$stmt->bindParam(':direccion', $direccion);
$stmt->bindParam(':lat', $lat);
$stmt->bindParam(':lon', $lon);


// Ejecución de la instruccion a DB.
$stmt->execute();

?>

<script src="js/registro_ruta.js"></script>


    
