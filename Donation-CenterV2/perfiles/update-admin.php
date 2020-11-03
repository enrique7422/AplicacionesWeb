<?php
session_start();

$contraseña_sesion=$_SESSION['contraseña'];

?>


<?php

include_once '../BD/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id_admin = filter_input(INPUT_POST, 'id_admin');
$nombre = filter_input(INPUT_POST, 'nombre');
$apellidos = filter_input(INPUT_POST, 'apellidos');
$telefono = filter_input(INPUT_POST, 'telefono');
$correo = filter_input(INPUT_POST, 'correo');

$contraseña = filter_input(INPUT_POST, 'contraseña');

if($contraseña!=$contraseña_sesion){
        $contraseña=hash('sha512',$contraseña);        
}


$consulta = "UPDATE administradores SET nombre='$nombre', apellidos='$apellidos', telefono='$telefono',  correo='$correo', contraseña='$contraseña' WHERE id_admin='$id_admin' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
?>

<script src="../js/actualizacion_admin.js"></script>

