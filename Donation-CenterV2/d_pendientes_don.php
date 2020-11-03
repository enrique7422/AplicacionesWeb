<?php require_once "vistas/parte_superior_don.php"?>

<?php

$id_don=$_SESSION['id_usuario'];


?>

<div class="container">
    <br>
    <h1>Donaciones Pendientes</h1>
    <br>    
    <button id="btnAtras" type="button" class="btn btn-success" onclick="location.href='panel_donador.php'"><i class="fas fa-arrow-alt-circle-left"></i> Regresar </button>
    <br>
    <br>
</div>

<?php

include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT a.nombre, a.descripcion, a.cantidad, a.unidades, CONCAT(b.nombre,' ',b.apellidos) AS distribuidor FROM donaciones AS a, usuarios AS b WHERE a.id_distribuidor=b.id_usuario AND a.estado=2 AND a.id_donador=$id_don";
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
                        <table id="tablaPendientes" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>                                                            
                                <th>Nombre</th>                                
                                <th>Descripción</th>           
                                <th>Cantidad</th>                                
                                <th>Unidades</th>  
                                <th>Distribuidor</th>                                                                                                  
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>                                                            
                                <td><?php echo $dat['nombre'] ?></td>                                
                                <td><?php echo $dat['descripcion'] ?></td>                                
                                <td><?php echo $dat['cantidad'] ?></td>    
                                <td><?php echo $dat['unidades'] ?></td>    
                                <td><?php echo $dat['distribuidor'] ?></td>                                                        
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>      
    
        
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>    

    <script type="text/javascript">
    
    $(document).ready(function(){
    tablaPendientes = $("#tablaPendientes").DataTable({
               
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
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    
    document.MiForm.id_don.value = id;

    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    
    $(".modal-title").text("Evidencia De Entrega");            
    $("#modalCRUD").modal("show");  
    
});


});
        
    </script>     










    </div>    






<?php require_once "vistas/parte_inferior_dis.php"?>