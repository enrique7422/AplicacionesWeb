<?php
session_start();
$id=$_SESSION['id_admin'];
$nombre=$_SESSION['nombre'];
$apellidos=$_SESSION['apellidos'];
$telefono=$_SESSION['telefono'];
$correo=$_SESSION['correo'];
$contraseña=$_SESSION['contraseña'];

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title> 
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
 <link rel="stylesheet" href="css/estilos.css">
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css">
 <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
 <link rel="stylesheet" href="css/w3-styles.css">
 <link href="css/entradas.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin="" />
   
   <link rel="stylesheet" href="css/font-awesome.css">	
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	 rel="stylesheet">	

</head>  
<body> 
        
<form action="perfiles/update-admin.php" method="POST" class="formulario">
<div class="w3-container">

    <h2 style="text-align:center;">Actualice Su Perfil</h2>
    <br>

      <div class="col-sm-8">
        <input type="hidden" class="form-control" id="id_admin" name="id_admin" value="<?php echo $id; ?>">         
      </div>

     <div class="input-contenedor">
         <i class="fas fa-user icon"></i>
         <input id="txtNombre" type="text" name="nombre" value="<?php echo $nombre; ?>" required >         
      </div>

         <div class="input-contenedor">
            <i class="fas fa-user icon"></i>
            <input id="txtApellidos" type="text"  name="apellidos" value="<?php echo $apellidos; ?>" required >         
        </div>

        <div class="input-contenedor">
            <i class="fas fa-phone icon"></i>
            <input id="txtTelefono" type="text" placeholder="Telefono" name="telefono" value="<?php echo $telefono; ?>" required>         
        </div>        

        <div class="input-contenedor">
            <i class="fas fa-envelope icon"></i>
            <input id="txtCorreo" type="text" placeholder="Correo" name="correo" value="<?php echo $correo; ?>" required>         
        </div>                
         
         <div class="input-contenedor">
            <i class="fas fa-key icon"></i>
            <input id="txtContraseña" type="password" placeholder="Contraseña" name="contraseña" value="<?php echo $contraseña; ?>" required>         
         </div>
                                                
          
        <div id="outer" styele="width:100%; text-align: center;">

              <div class="inner" style="display: inline-block;">
                <a href="panel_admin.php"><input type="button" class="button" value="Cancelar" style="width:227px; text-align:center"></a>
              </div>     
              <div class="inner" style="display: inline-block;"><input type="submit" value="Actualizar" class="button" style="width:227px"></div>               
        </div>

        </div>
         
     </div>
</form>  
</body>
</html>



