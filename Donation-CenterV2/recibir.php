<?php

include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id = $_GET["id"];
$id_dist = $_GET["id_dist"];
$id_donador = $_GET["id_donador"];

$consulta = "UPDATE donaciones SET id_distribuidor='$id_dist', estado='2' WHERE id_donacion='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        


$consulta = "SELECT id_donacion, nombre, descripcion, cantidad, unidades FROM donaciones WHERE id_donador=$id";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

settype($id, 'int');

header("Location: panel_donativos.php?id=".$id_donador);  
die();


?>