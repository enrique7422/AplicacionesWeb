<?php require_once "vistas/parte_superior_don.php"?>


<?php

$id=$_SESSION['id_usuario'];

?>

<!--INICIO del cont principal-->
<div class="container">
    <h1><button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">+</button> Mis Donaciones</h1>
    
    
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT id_donacion, nombre, descripcion, cantidad, unidades FROM donaciones WHERE estado='1' AND id_donador=$id";
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
    


<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="descripcion" class="col-form-label">Descripción:</label>
                <input type="text" class="form-control" id="descripcion">
                </div>                
                <div class="form-group">
                <label for="cantidad" class="col-form-label">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad">
                </div>            
                <div class="form-group">
                <label for="unidades" class="col-form-label">Unidades:</label>
                <input type="text" class="form-control" id="unidades">
                </div>            
                <input type="hidden" class="form-control" id="id_donador" value="<?php echo $id; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>    
<script type="text/javascript" src="js/main_don.js"></script> 
    
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior_don.php"?>