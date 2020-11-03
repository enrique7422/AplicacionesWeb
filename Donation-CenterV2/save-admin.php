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


// Obtención del objeto PDO para la interaccion con DB.
$db = getPdo();  



// Comando SQL para insertar el registro.
$sqlCmd = 'INSERT INTO administradores(nombre, apellidos, telefono, correo, contraseña) 
VALUES (:nombre, :apellidos, :telefono, :correo, :password)';

// Obtención del objeto Statement para hacer la ejecución a la DB.
$stmt = $db->prepare($sqlCmd);

// Paso de parámetros al comando SQL de insert.
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellidos', $apellidos);
$stmt->bindParam(':telefono', $telefono);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':password', $contraseña);


// Ejecución de la instruccion a DB.
$stmt->execute();

?>

<script src="js/registro_admin.js"></script>


    
