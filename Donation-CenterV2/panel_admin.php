<?php require_once "vistas/parte_superior_admin.php"?>

<?php

$id=$_SESSION['id_admin'];

?>


<!--INICIO del cont principal-->
<div class="container">
<h1><button id="btnNuevo" type="button" class="btn btn-success" onclick="location.href='registro_admin.php'">+</button> Administradores</h1>
    
    
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT id_admin, nombre, apellidos, telefono, correo FROM administradores WHERE id_admin!='$id'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
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
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>                                
                                <th>Telefono</th>                                
                                <th>Correo</th>                                                                  
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>                            
                                <td><?php echo $dat['id_admin'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['apellidos'] ?></td>
                                <td><?php echo $dat['telefono'] ?></td>    
                                <td><?php echo $dat['correo'] ?></td>                                                                    
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
    



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>    


<script type="text/javascript">
    
    $(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
               
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
});
        
    </script> 
    
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior_admin.php"?>