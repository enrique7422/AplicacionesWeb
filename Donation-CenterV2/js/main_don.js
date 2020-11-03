$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
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
    
$("#btnNuevo").click(function(){
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Donativo");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(2)').text();
    cantidad = parseInt(fila.find('td:eq(3)').text());
    unidades = fila.find('td:eq(4)').text();
    
    $("#nombre").val(nombre);
    $("#descripcion").val(descripcion);
    $("#cantidad").val(cantidad);
    $("#unidades").val(unidades);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Dontivo");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",   
            data: {opcion:opcion, id:id},
            success: function(){
                tablaPersonas.row(fila.parents('tr')).remove().draw();                
            }
        });
        alert('¡Donativo Eliminado Con Éxito!');                        
    }
    window.location.href="panel_donador.php";
    
});
    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    descripcion = $.trim($("#descripcion").val());
    cantidad = $.trim($("#cantidad").val());    
    unidades = $.trim($("#unidades").val());  
    id_don = $.trim($("#id_donador").val());  
    
    estado = 1;
    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, descripcion:descripcion, cantidad:cantidad, unidades:unidades, id_don:id_don, estado:estado,  id:id, opcion:opcion},
        success: function(data){  
            console.log(data);            
            id_donacion = data[0].id_donacion;            
            nombre = data[0].nombre;
            descripcion = data[0].descripcion;
            cantidad = data[0].cantidad;
            unidades = data[0].unidades;
            if(opcion == 1){tablaPersonas.row.add([id_donacion,nombre,descripcion,cantidad,unidades ]).draw();}
            else{tablaPersonas.row(fila).data([id_donacion,nombre,descripcion,cantidad,unidades]).draw();}            
            alert('¡Operación Realizada Con Éxito!');
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});