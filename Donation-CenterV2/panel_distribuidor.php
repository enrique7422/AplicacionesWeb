<?php require_once "vistas/parte_superior_dis.php"?>

<!--INICIO del cont principal-->

<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT id_usuario, nombre, apellidos, telefono, direccion, latitud, longitud FROM usuarios WHERE id_rol='1'";
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
    <h1>Donadores Disponibles</h1> 
    <br>
    
    <button id="btnMapa" type="button" class="btn btn-success" onclick="document.getElementById('leaflet-modal').style.display='block'; setTimeout(map.invalidateSize(), 1000);""><i class="fas fa-location-arrow  icon"></i> Ver Mapa De Donadores</button>    
    <div id="leaflet-modal" class="w3-modal">
    <div class="w3-modal-content w3-card-8">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('leaflet-modal').style.display='none'" 
        class="w3-closebtn">&times;</span>
        <br>
        <h5>Seleccione un punto ubicación para ver el nombre del donador.</h5>
        <br>
      </header>
      <div class="w3-container">
        <div>
            <div id="mapid" style="height: 600px;"></div>

            <script type="text/javascript">

            var i = 0;

            var latitud = [];
            var longitud = [];

            var map = L.map('mapid').setView([23.7369202, -99.1409509], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            map.setZoom(14);
            map.doubleClickZoom.disable();

            <?php                            
                foreach($data as $coorde) {                                                        
            ?>  

                var latitud = "<?php echo $coorde['latitud'] ?>";    
                var longitud = "<?php echo $coorde['longitud'] ?>";            

                var nombre = "<?php echo $coorde['nombre'] ?>";            
                var apellidos = "<?php echo $coorde['apellidos'] ?>";            

                var marker = L.marker([latitud, longitud]).addTo(map)
                .bindPopup(''+nombre+'.<br>'+apellidos)                
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
                                <th>Nombre</th>
                                <th>Apellidos</th>                                
                                <th>Teléfono</th>                                
                                <th>Dirección</th>  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>                            
                            <tr>
                                <td><?php echo $dat['id_usuario'] ?></td>                                                            
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['apellidos'] ?></td>
                                <td><?php echo $dat['telefono'] ?></td>    
                                <td><?php echo $dat['direccion'] ?></td>                                    
                                
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

<script type="text/javascript" src="js/main_dis.js"></script> 
    
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior_dis.php"?>