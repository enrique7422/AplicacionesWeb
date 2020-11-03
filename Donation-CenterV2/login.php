

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

        <header>
            <div class="container-fluid px-lg-4">
                <nav class="py-4">                                                
                            <ul class="menu mt-md-3"> 
                            <br>                           
                            <p  class="link" style="color:blue; position:absolute; top:40px; right: 70px;"><a class="link"  style="color:blue" href="login_admin.php">Soy Administrador</a></p>                                                        
                            </ul>
                        </nav>
            </div>
        </header>


    <form class="formulario" method="POST" action="validar_sesion.php">
    
    <h1>Iniciar Sesion</h1>
     <div class="contenedor">
                   
         <div class="input-contenedor">
         <i class="fas fa-envelope icon"></i>
         <input name="correo" type="email" placeholder="Correo Electronico">
         
         </div>
         
         <div class="input-contenedor">
        <i class="fas fa-key icon"></i>
         <input name="constraseña" type="password" placeholder="Contraseña">
         
         </div>        


         <input type="submit" value="Accesar" class="button">         
         <br>       
         <p  class="link" style="color:blue; text-align: center">¿No tienes una cuenta? <br><a class="link" href="selececcion_usuario.html">Registrate Aquí</a></p>                
         <p  class="link" style="color:blue; text-align: center"><a class="link" href="index.html">Volver</a></p>                
     </div>
    </form>
</body>
</html>