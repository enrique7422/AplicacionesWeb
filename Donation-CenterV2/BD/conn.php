<?php

$host='localhost';
$user='root';
$password='';
$db='donation-center';


$connection = @mysqli_connect($host,$user,$password,$db);

if (!$connection) {
	echo "Error en coneccion a base de datos";
}

?>