<?php require_once "vistas/parte_superior_don.php"?>

<?php

$nombre=$_SESSION['nombre'];
$apellidos=$_SESSION['apellidos'];
$telefono=$_SESSION['telefono'];
$direccion=$_SESSION['direccion'];
$correo=$_SESSION['correo'];

?>


<div class="container">
    <br>
    <h1>Perfil De Usuario</h1>
    <br>    
    <button id="btnAtras" type="button" class="btn btn-success" onclick="location.href='panel_donador.php'"><i class="fas fa-arrow-alt-circle-left"></i> Regresar </button>    
    <button id="btnEditar" type="button" class="btn btn-primary" onclick="location.href='actualizar_donador.php'"><i class="fas fa-user-circle"></i> Editar Perfil </button>    
    <button id="btnEditar" type="button" class="btn btn-danger" onclick="location.href='cerrar_cuenta_don.php'"><i class="fas fa-window-close"></i> Borrar Cuenta </button>    
</div>

<div align="center">
<img style="width:300px;height:300px" class="img-profile rounded-circle" src="https://garfieldparkacademy.org/wp-content/uploads/2018/04/hand_heart_donate_icon.png">
<h1><strong><br>Donador</strong><h1>
</div>


<div class="container">
    <br>
    <h3><strong>Nombre: </strong> <?php echo $nombre?> <?php echo $apellidos?></h3>    
    <br>
    <h3><strong>Teléfono: </strong><?php echo $telefono?></h3>    
    <br>
    <h3><strong>Dirección: </strong><?php echo $direccion?></h3>    
    <br>
    <h3><strong>Correo: </strong><?php echo $correo?></h3>    
</div>



<?php require_once "vistas/parte_inferior_don.php"?>