$(document).ready(function() {
var user_id, opcion;
opcion = 4;
    
tablaUsuarios = $('#tablaUsuarios').DataTable({  
    "ajax":{            
        "url": "../bd/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },

    "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
    },

    "columns":[
        {"data": "user_id"},
        {"data": "username"},
        {"data": "first_name"},
        {"data": "last_name"},
        {"data": "gender"},
        {"data": "password"},
        {"data": "status"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     

var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formUsuarios').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    username = $.trim($('#username').val());    
    first_name = $.trim($('#first_name').val());
    last_name = $.trim($('#last_name').val());    
    gender = $.trim($('#gender').val());    
    password = $.trim($('#password').val());
    status = $.trim($('#status').val());                            
        $.ajax({
          url: "../bd/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {user_id:user_id, username:username, first_name:first_name, last_name:last_name, gender:gender, password:password ,status:status ,opcion:opcion},    
          success: function(data) {
            tablaUsuarios.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    user_id=null;
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css( "background-color", "#007bff");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Alta de Usuario");
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    username = fila.find('td:eq(1)').text();
    first_name = fila.find('td:eq(2)').text();
    last_name = fila.find('td:eq(3)').text();
    gender = fila.find('td:eq(4)').text();
    password = fila.find('td:eq(5)').text();
    status = fila.find('td:eq(6)').text();
    $("#username").val(username);
    $("#first_name").val(first_name);
    $("#last_name").val(last_name);
    $("#gender").val(gender);
    $("#password").val(password);
    $("#status").val(status);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Usuario");		
    $('#modalCRUD').modal('show');		   	   
});

//Borrar otra opción que muestra el alert del navegador
// $(document).on("click", ".btnBorrar", function(){
//     fila = $(this);        
//     user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;	
//     username = $(this).closest('tr').find('td:eq(1)').text();	
    
//     $("#user_id").val(user_id);	
//     opcion = 3; //eliminar        
//     var respuesta = confirm("¿Está seguro que desea borrar a "+username+"?");                
//     if (respuesta) {            
//         $.ajax({
//           url: "../bd/crud.php",
//           type: "POST",
//           datatype:"json",    
//           data:  {opcion:opcion, user_id:user_id},    
//           success: function() {
//               tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
//            }
//         });	
//     }
//  });

var fila2; //captura la fila, eliminar
//submit para eliminación
$('#formUsuariosEliminar').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    username = $.trim($('#username').val(username));                             
        $.ajax({
          url: "../bd/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {user_id:user_id, username:username, opcion:opcion},    
          success: function(data) {
            tablaUsuarios.ajax.reload(null, false);
           }
        });			        
    $('#modalCrudEliminar').modal('hide');
    
});

//Borrar        
$(document).on("click", ".btnBorrar", function(){		        
    opcion = 3;//eliminar
    fila2 = $(this).closest("tr");	        
    user_id = parseInt(fila2.find('td:eq(0)').text()); //capturo el ID		            
    username = fila2.find('td:eq(1)').text();
    $("#username").val(username);
    $(".modal-header").css("background-color", "#D14040");
    // $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );	
    $(".modal-title").text("¿Está seguro que desea borrar a "+username+"?");		
    $('#modalCrudEliminar').modal('show');		   
});
     
});    

