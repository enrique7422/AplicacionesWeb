
<script src="js/confirmar_eliminar_don.js"></script>


<?php

session_start();
$id=$_SESSION['id_usuario'];

?>


<?php


include_once 'BD/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "DELETE FROM usuarios WHERE id_usuario='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();  

        session_destroy();
    
?>

<script src="js/cuenta_admin_eliminada.js"></script>