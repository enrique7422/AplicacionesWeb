<?php require_once "vistas/parte_superior_dis.php"?>

<?php

$id_dis=$_SESSION['id_usuario'];

?>

<?php

include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id = $_GET["id"];

$consulta = "SELECT id_donacion, nombre, descripcion, cantidad, unidades FROM donaciones WHERE id_donador=$id AND estado='1'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

$consultaII = "SELECT nombre, apellidos FROM usuarios WHERE id_usuario=$id";
$resultadoII = $conexion->prepare($consultaII);
$resultadoII->execute();
$dataII=$resultadoII->fetchAll(PDO::FETCH_ASSOC);


?>



<div class="container">
<h1>Donaciones Disponibles</h1> 
<?php                            
    foreach($dataII as $dat) {                                                        
?>    
    <h3>Donador: <?php echo $dat['nombre'] ?> <?php echo $dat['apellidos'] ?></h3> 
<?php
    }
?> 
     
    <br>
    <br>
    <button id="btnAtras" type="button" class="btn btn-success" onclick="location.href='panel_distribuidor.php'"><i class="fas fa-arrow-alt-circle-left"></i> Regresar </button>
    <br>
    <br>

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
                                <th>Descripción</th>                                
                                <th>Cantidad</th>                                
                                <th>Unidades</th>  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>                            
                                <td><?php echo $dat['id_donacion'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['descripcion'] ?></td>
                                <td><?php echo $dat['cantidad'] ?></td>    
                                <td><?php echo $dat['unidades'] ?></td>    
                                <td></td>
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
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><button class='btn btn-primary btnDonativos'>Llevar Donativo  </button></div></div>"  
       }],
        
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

    var fila; //capturar la fila para editar o borrar el registro    

    $(document).on("click", ".btnDonativos", function(){    
    fila = $(this);   
     
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    id_dist = "<?php echo $id_dis; ?>";    
    id_donador = "<?php echo $id; ?>";    
        
    var res = confirm("¿Seguro Que Desea Transaladar Este Donativo?");
    alert("¡Gracias Por Ayudar!");    
    if(res){
        
        window.location.href = "recibir.php? id="+id+"&id_dist="+id_dist+"&id_donador="+id_donador;  
    }  

    });
});
        
    </script>     
    
</div>



<?php require_once "vistas/parte_inferior_dis.php"?>
<!--FIN del cont principal-->

