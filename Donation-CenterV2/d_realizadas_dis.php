<?php require_once "vistas/parte_superior_dis.php"?>

<?php

$id_dis=$_SESSION['id_usuario'];

?>

<div class="container">
    <br>
    <h1>Donaciones Realizadas</h1>
    <br>    
    <button id="btnAtras" type="button" class="btn btn-success" onclick="location.href='panel_distribuidor.php'"><i class="fas fa-arrow-alt-circle-left"></i> Regresar </button>
    <br>
    <br>
</div>

<?php

include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT a.id_donacion, a.nombre, a.cantidad, a.unidades, CONCAT(b.nombre,' ',b.apellidos) AS donador, a.evidencia FROM donaciones AS a, usuarios AS b WHERE a.id_donador=b.id_usuario AND id_distribuidor=$id_dis AND a.estado=3";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

$datos = $resultado->fetch(PDO::FETCH_ASSOC)["id_donacion"]; // Se recuperan los resultados.




?>



<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <!--<button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    -->
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>                                                            
                                <th>Nombre</th>                                
                                <th>Cantidad</th>                                
                                <th>Unidades</th>  
                                <th>Donador</th>                                                                            
                                <th>Evidencia</th>   
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                                                        
                            ?>
                            <tr>                                                            
                                <td><?php echo $dat['nombre'] ?></td>                                
                                <td><?php echo $dat['cantidad'] ?></td>    
                                <td><?php echo $dat['unidades'] ?></td>    
                                <td><?php echo $dat['donador'] ?></td>                                                                   
                                <td> <img src="obtenerfotografia.php?id=<?php echo $dat['id_donacion']; ?>" high='Img blob desde MySQL' width="100"/> </td>                                                                                                
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
        </div>  



<?php require_once "vistas/parte_inferior_dis.php"?>

