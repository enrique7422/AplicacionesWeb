<?php require_once "vistas/parte_superior_dis.php"?>

<?php

$id_dis=$_SESSION['id_usuario'];


?>

<div class="container">
    <br>
    <h1>Donaciones Pendientes</h1>
    <br>    
    <button id="btnAtras" type="button" class="btn btn-success" onclick="location.href='panel_distribuidor.php'"><i class="fas fa-arrow-alt-circle-left"></i> Regresar </button>
    <br>
    <br>
</div>

<?php

include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT a.id_donacion, a.nombre, a.cantidad, a.unidades, CONCAT(b.nombre,' ',b.apellidos) AS donador FROM donaciones AS a, usuarios AS b WHERE a.id_donador=b.id_usuario AND id_distribuidor=$id_dis AND a.estado=2";
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
                                <th>Cantidad</th>                                
                                <th>Unidades</th>  
                                <th>Donador</th>  
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
                                <td><?php echo $dat['cantidad'] ?></td>    
                                <td><?php echo $dat['unidades'] ?></td>    
                                <td><?php echo $dat['donador'] ?></td>
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
    
    <!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form name="MiForm" id="MiForm" method="post" action="evidencia/cargar.php" enctype="multipart/form-data" style="width=400px">
                <br>
                <div class="col-sm-8">
                    <br>
                    <h5>Seleccione Por Favor Una Imagen Para Marcar El Donativo Como Entregado</h5>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>                    
                <div class="col-sm-8">
                    <input type="file" class="form-control" id="image" name="image" multiple>                    
                </div>
                <div class="col-sm-8">
                    <input type="hidden" class="form-control" id="id_don" name="id_don">                    
                </div>
                <div class="col-sm-8">
                    <br>
                    <button name="submit" class="btn btn-primary">Guardar</button>
                </div>
                </div>
            </form>

        
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>                
            </div>
        </form>    
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
        "defaultContent": "<div class='text-center'><button class='btn btn-primary btnDonativos'>Marcar Como Entregado</button><button class='btn btn-danger btnCancelar'>Cancelar Translado</button></div></div>"  
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
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    
    document.MiForm.id_don.value = id;

    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    
    $(".modal-title").text("Evidencia De Entrega");            
    $("#modalCRUD").modal("show");  
    
});

$(document).on("click", ".btnCancelar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());        

    window.location.href = "cancelar_translado.php? id="+id;  
});


});
        
    </script>     










    </div>    






<?php require_once "vistas/parte_inferior_dis.php"?>