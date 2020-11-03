<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id = $_GET["id"];

$consulta = "DELETE FROM rutas WHERE id_ruta='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                                   


        

?>

<script src="js/ruta_eliminada.js"></script>



