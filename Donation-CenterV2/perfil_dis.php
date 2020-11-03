<?php require_once "vistas/parte_superior_dis.php"?>

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
    <button id="btnAtras" type="button" class="btn btn-success" onclick="location.href='panel_distribuidor.php'"><i class="fas fa-arrow-alt-circle-left"></i> Regresar </button>    
    <button id="btnEditar" type="button" class="btn btn-primary" onclick="location.href='actualizar_distribuidor.php'"><i class="fas fa-user-circle"></i> Editar Perfil </button>    
    <button id="btnEditar" type="button" class="btn btn-danger" onclick="location.href='cerrar_cuenta_dis.php'"><i class="fas fa-window-close"></i> Borrar Cuenta </button>    
</div>

<div align="center">
<img style="width:300px;height:300px" class="img-profile rounded-circle" src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-and-shapes-7/177800/315-512.png">

<h1><strong><br>Distribuidor</strong><h1>
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



<?php require_once "vistas/parte_inferior_dis.php"?>