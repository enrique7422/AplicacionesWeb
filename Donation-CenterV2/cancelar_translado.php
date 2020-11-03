<?php

if ($_GET['id'] > 0)
{
    $id = $_GET['id'];

    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "UPDATE donaciones SET id_distribuidor='0', estado='1' WHERE id_donacion='$id' ";		
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();        
            
    }

    
?>

<script src="js/translado_cancelado.js"></script>