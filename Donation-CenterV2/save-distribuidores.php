<?php

include 'BD/config.php';
include 'BD/db.php';

$nombre = filter_input(INPUT_POST, 'nombre');
if ($nombre === NULL || $nombre === false || $nombre === '') {
    header('Location: registro-donador.php');
    exit();
}

$apellidos = filter_input(INPUT_POST, 'apellidos');
if ($apellidos === NULL || $apellidos === false || $apellidos === '') {
    
    exit();
}

$telefono = filter_input(INPUT_POST, 'telefono');
if ($telefono === NULL || $telefono === false || $telefono === '') {
    header('Location: ../registro-donadores.php/');
    exit();
}

$direccion = filter_input(INPUT_POST, 'direccion');
if ($direccion === NULL || $direccion === false || $direccion === '') {
    header('Location: ../registro-donadores.php/');
    exit();
}

$correo = filter_input(INPUT_POST, 'correo');
if ($correo === NULL || $correo === false || $correo === '') {
    header('Location: ../registro-donadores.php/');
    exit();
}

$contraseña = filter_input(INPUT_POST, 'contraseña');
if ($contraseña === NULL || $contraseña === false || $contraseña === '') {
    header('Location: ../registro-donadores.php/');
    exit();
}

$contraseña=hash('sha512',$contraseña);

$lat = filter_input(INPUT_POST, 'lat');
if ($lat === NULL || $lat === false || $lat === '') {
    header('Location: ../registro-donadores.php/');
    exit();
}

$lon = filter_input(INPUT_POST, 'lon');
if ($lon === NULL || $lon === false || $lon === '') {
    header('Location: ../registro-donadores.php/');
    exit();
}

// Obtención del objeto PDO para la interaccion con DB.
$db = getPdo();  

$id_rol = 2;

// Comando SQL para insertar el registro.
$sqlCmd = 'INSERT INTO usuarios(nombre, apellidos, telefono, direccion, latitud, longitud, correo, contraseña, id_rol) 
VALUES (:nombre, :apellidos, :telefono, :direccion, :lat, :lon, :correo, :password, :id_rol)';

// Obtención del objeto Statement para hacer la ejecución a la DB.
$stmt = $db->prepare($sqlCmd);

// Paso de parámetros al comando SQL de insert.
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellidos', $apellidos);
$stmt->bindParam(':telefono', $telefono);
$stmt->bindParam(':direccion', $direccion);
$stmt->bindParam(':lat', $lat);
$stmt->bindParam(':lon', $lon);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':password', $contraseña);
$stmt->bindParam(':id_rol', $id_rol);

// Ejecución de la instruccion a DB.
$stmt->execute();

?>

<script src="js/registro.js"></script>


    
