
<script src="js/confirmar_eliminar_admin.js"></script>


<?php

session_start();
$id=$_SESSION['id_admin'];

?>


<?php


include_once 'BD/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "DELETE FROM administradores WHERE id_admin='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  

        session_destroy();
    
?>

<script src="js/cuenta_admin_eliminada.js"></script>