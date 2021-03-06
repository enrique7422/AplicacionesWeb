<?php
session_start();
$id=$_SESSION['id_usuario'];
$nombre=$_SESSION['nombre'];
$apellidos=$_SESSION['apellidos'];
$telefono=$_SESSION['telefono'];
$correo=$_SESSION['correo'];
$contraseña=$_SESSION['contraseña'];

$contraseña=hash('sha512',$contraseña);

$direccion=$_SESSION['direccion'];
$latitud=$_SESSION['latitud'];
$longitud=$_SESSION['longitud'];


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
        
<form action="perfiles/update-distribuidores.php" method="POST" class="formulario">
<div class="w3-container">

    <h2 style="text-align:center;">Actualice Su Perfil!</h2>
    <br>

      <div class="col-sm-8">
        <input type="hidden" class="form-control" id="id_dis" name="id_dis" value="<?php echo $id; ?>">         
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
            <i class="fas fa-street-view icon"></i>
            <input id="txtDireccion" type="text" placeholder="Dirección" name="direccion" value="<?php echo $direccion; ?>" required>         
        </div>

        <div class="input-contenedor">
            <i class="fas fa-envelope icon"></i>
            <input id="txtCorreo" type="text" placeholder="Correo" name="correo" value="<?php echo $correo; ?>" required>         
        </div>                
         
         <div class="input-contenedor">
            <i class="fas fa-key icon"></i>
            <input id="txtContraseña" type="password" placeholder="Contraseña" name="contraseña" value="<?php echo $contraseña; ?>" required>         
         </div>
        
        <h3 style="text-align: center; color: gray;"> <i class="fa fa-map-marker" aria-hidden="true"></i> Ubicación:</h3> 
        
        <h3 style="text-align: right; color: gray; font-size: 19px;">Latitud
        <input id="txtLatitud" type="text" name="lat" value="<?php echo $latitud; ?>" required></h3>

        <h3 style="text-align: right; color: gray; font-size: 19px;">Longitud 
        <input id="txtLongitud" type="text" name="lon" value="<?php echo $longitud; ?>" required></h3>

         <div class="input-contenedor">            
            <button type="button" onclick="document.getElementById('leaflet-modal').style.display='block'; setTimeout(map.invalidateSize(), 1000);" 
            class="button_p"><i class="fa fa-map" aria-hidden="true"></i> Obtener Coordenadas</button>  

            <div id="leaflet-modal" class="w3-modal">
                <div class="w3-modal-content w3-card-8">
                  <header class="w3-container w3-teal">                     
                    <h4>Seleccione una ubicacion</h4>
                  </header>
                  <div class="w3-container">
                    <div>
                      <div id="mapid" style="height: 400px"></div>
                      <script src="js/modal.js"></script>
                    </div>
                  </div>
                  <footer class="w3-container w3-teal">
                    <span onclick="document.getElementById('leaflet-modal').style.display='none'" class="w3-closebtn">&times;</span>                    
                  </footer>
                </div>
              </div>            
         </div>

         <div id="outer" styele="width:100%; text-align: center;">
            <div class="inner" style="display: inline-block;">
                <a href="panel_distribuidor.php"><input type="button" class="button" value="Cancelar" style="width:227px; text-align:center"></a>
            </div>     
            <div class="inner" style="display: inline-block;"><input type="submit" value="Actualizar" class="button" style="width:227px"></div>               
        </div>                               
                   
        </div>
         
     </div>
</form>  
</body>
</html>



