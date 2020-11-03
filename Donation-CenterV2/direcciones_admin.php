

<?php require_once "vistas/parte_superior_admin.php"?>

<!--INICIO del cont principal-->

<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT id_ruta, direccion, CONCAT(latitud, ' , ' ,longitud) AS coordenadas FROM rutas";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);


$consultaII = "SELECT latitud, longitud, direccion FROM rutas";
$resultadoII = $conexion->prepare($consultaII);
$resultadoII->execute();
$dataII=$resultadoII->fetchAll(PDO::FETCH_ASSOC);


?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<div class="container">
    <h1><button id="btnNuevo" type="button" class="btn btn-success" onclick="location.href='registro_ruta.php'">+</button> Direcciones De Destino De Donativos</h1>
    
    <br>
    
    
  
  <button id="btnRutas" type="button" class="btn btn-primary" onclick="document.getElementById('leaflet-modal-rutas').style.display='block'; setTimeout(map.invalidateSize(), 1000);""><i class="fas fa-map icon"></i> Ver Mapa De Entregas </button>
    <div id="leaflet-modal-rutas" class="w3-modal">
    <div class="w3-modal-content w3-card-8">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('leaflet-modal-rutas').style.display='none'" 
        class="w3-closebtn">&times;</span>
        <br>
        <h5>Seleccione un punto de ubicación para ver la direccion de entrega.</h5>
        <br>
      </header>
      <div class="w3-container">
        <div>
            <div id="mapid-r" style="height: 600px;"></div>

            <script type="text/javascript">

            var i = 0;

            var latitud = [];
            var longitud = [];

            var map = L.map('mapid-r').setView([23.7369202, -99.1409509], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            map.setZoom(14);
            map.doubleClickZoom.disable();
          
            <?php                            
                foreach($dataII as $rutas) {                                                        
            ?>  

                var latitud = "<?php echo $rutas['latitud'] ?>";    
                var longitud = "<?php echo $rutas['longitud'] ?>";            
                
                var direccion = "<?php echo $rutas['direccion'] ?>";            

                var marker = L.marker([latitud, longitud]).addTo(map)
                .bindPopup(''+direccion+'')                
                .openPopup();
                     
            <?php
                }
            ?>
            L.marker;


        </script>
    
        </div>
      </div>
      <footer class="w3-container w3-teal">
        <p>
        <br>
        </p>        
      </footer>
    </div>
            
  </div>
  
    
<br><br>
    


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
                                <th>Dirección</th>  
                                <th>Coordenadas</th>  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>                            
                            <tr>
                                <td><?php echo $dat['id_ruta'] ?></td>                                                            
                                <td><?php echo $dat['direccion'] ?></td>
                                <td><?php echo $dat['coordenadas'] ?></td>                                                                
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
        "defaultContent": "<div class='text-center'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnEliminar'>Eliminar</button></div></div>"  
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

$(document).on("click", ".btnEliminar", function(){    
fila = $(this);   
 
id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    
var res = confirm("¿Seguro Que Desea Eliminar Esta Ruta De Destino?");    
if(res){
    
    window.location.href = "eliminar_ruta.php? id="+id;  
}  

});

$(document).on("click", ".btnEditar", function(){    
fila = $(this);   
 
id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        
    window.location.href = "actualizar_ruta.php? id="+id;  


});


    
});
        
    </script>     
    

</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior_admin.php"?>
