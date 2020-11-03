<?php
include_once '../BD/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';
$unidades = (isset($_POST['unidades'])) ? $_POST['unidades'] : '';

$id_don = (isset($_POST['id_don'])) ? $_POST['id_don'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';



switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO donaciones (nombre, descripcion, cantidad, unidades, id_donador, estado) VALUES('$nombre', '$descripcion', '$cantidad', '$unidades','$id_don', '$estado') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id_donacion, nombre, descripcion, cantidad, unidades FROM donaciones ORDER BY id_donacion DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE donaciones SET nombre='$nombre', descripcion='$descripcion', cantidad='$cantidad', unidades='$unidades' WHERE id_donacion='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_donacion, nombre, descripcion, cantidad, unidades FROM donaciones WHERE id_donacion='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM donaciones WHERE id_donacion='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;   
    case 4: //modificación
        $consulta = "UPDATE donaciones SET id_distribuidor='$id_dist' WHERE id_donacion='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_donacion, nombre, descripcion, cantidad, unidades FROM donaciones WHERE id_donacion='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
