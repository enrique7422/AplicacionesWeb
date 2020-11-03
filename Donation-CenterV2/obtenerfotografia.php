<?php

if ($_GET['id'] > 0)
{
    $id = $_GET['id'];
    $conexion = new PDO('mysql:host=localhost;dbname=donation-center;charset=UTF8', 'root', '');
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
	$consulta = "SELECT evidencia FROM donaciones WHERE id_donacion=$id";
	$hacerConsulta = $conexion->prepare($consulta); // Se crea un objeto PDOStatement.
	$hacerConsulta->execute(); // Se ejecuta la consulta.
	$datos = $hacerConsulta->fetch(PDO::FETCH_ASSOC)["evidencia"]; // Se recuperan los resultados.
	$hacerConsulta->closeCursor(); // Se libera el recurso.
 
    header("Content-type: image/jpg"); 
        echo $datos; 
    }else{
        echo 'Imagen no existe...';
    }

?>