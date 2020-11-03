<?php

$servidor="localhost";
$usuario="root";
$password="";
$bd="donation-center";

$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

$correo=$_POST['correo'];
$password=$_POST['constraseña']; 	

$password=hash('sha512',$password);			

$query1 = mysqli_query($conexion,"SELECT * FROM `administradores` where correo='$correo' AND contraseña='$password'");
$donador=mysqli_num_rows($query1);


if($donador>0) {
	
	session_start();
	$data = mysqli_fetch_array($query1);
			$_SESSION['active']=true;
			$_SESSION['id_admin']=$data['id_admin'];
			$_SESSION['nombre']=$data['nombre'];
			$_SESSION['apellidos']=$data['apellidos'];
			$_SESSION['telefono']=$data['telefono'];							
			$_SESSION['correo']=$data['correo'];
			$_SESSION['contraseña']=$data['contraseña'];			
			
			header("Location:panel_admin.php");
			exit(); 


}else{
	header("Location:login_admin.php");	
}

?>



