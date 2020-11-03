<?php

$servidor="localhost";
$usuario="root";
$password="";
$bd="donation-center";

$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

$correo=$_POST['correo'];
$password=$_POST['constraseña']; 	

$password=hash('sha512',$password);			

$query1 = mysqli_query($conexion,"SELECT * FROM `usuarios` where correo='$correo' AND contraseña='$password' AND id_rol='1'");
$donador=mysqli_num_rows($query1);

$query2 = mysqli_query($conexion,"SELECT * FROM `usuarios` where correo='$correo' AND contraseña='$password' AND id_rol='2'");
$distribuidor=mysqli_num_rows($query2);

if($donador>0) {
	
	session_start();
	$data = mysqli_fetch_array($query1);
			$_SESSION['active']=true;
			$_SESSION['id_usuario']=$data['id_usuario'];
			$_SESSION['nombre']=$data['nombre'];
			$_SESSION['apellidos']=$data['apellidos'];
			$_SESSION['telefono']=$data['telefono'];
			$_SESSION['direccion']=$data['direccion'];
			$_SESSION['latitud']=$data['latitud'];
			$_SESSION['longitud']=$data['longitud'];			
			$_SESSION['correo']=$data['correo'];
			$_SESSION['contraseña']=$data['contraseña'];
			$_SESSION['id_rol']=$data['id_rol'];
			
			header("Location:panel_donador.php");
			exit(); 


}else if($distribuidor>0) {

	session_start();
	$data = mysqli_fetch_array($query2);
			$_SESSION['active']=true;
			$_SESSION['id_usuario']=$data['id_usuario'];
			$_SESSION['nombre']=$data['nombre'];
			$_SESSION['apellidos']=$data['apellidos'];
			$_SESSION['telefono']=$data['telefono'];
			$_SESSION['direccion']=$data['direccion'];
			$_SESSION['latitud']=$data['latitud'];
			$_SESSION['longitud']=$data['longitud'];			
			$_SESSION['correo']=$data['correo'];
			$_SESSION['contraseña']=$data['contraseña'];
			$_SESSION['id_rol']=$data['id_rol'];
			
			header("Location:panel_distribuidor.php");
			exit(); 

}else{
	$mensajeaccesoincorrecto = "El usuario y la contraseña son incorrectos, por favor vuelva a introducirlos.";
   	echo $mensajeaccesoincorrecto;

}

?>



