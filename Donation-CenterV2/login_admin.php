

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <title>Donation Center</title> 
    
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    	
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="css/estilos.css">
	

</head>  
<body>

    <br><br><br><br>
    <br><br><br>


    <form class="formulario" method="POST" action="validar_sesion_admin.php">
    
    <h1>Bienvenido</h1>
     <div class="contenedor">
                   
         <div class="input-contenedor">
         <i class="fas fa-envelope icon"></i>
         <input name="correo" type="text" placeholder="Correo Electronico">
         
         </div>
         
         <div class="input-contenedor">
        <i class="fas fa-key icon"></i>
         <input name="constraseña" type="password" placeholder="Contraseña">
         
         </div>        


         <input type="submit" value="Accesar" class="button">         
         <br>       
         <p  class="link" style="color:blue; text-align: center"><a class="link" href="index.html">Volver</a></p>                
                  
     </div>
    </form>
</body>
</html>