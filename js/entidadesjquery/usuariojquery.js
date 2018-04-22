$(document).ready(function()
{
    lista();
    
    $("#formusuario").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
        });
        
    $("#actualizarUsuario").click(function(e)
    {
        e.preventDefault();
       
       var idusuario = $("#idusuario").val();
       var password = $("#passwordactua").val();
       var rptpassword = $("#rptpasswordactua").val();

       if(password.length<=0 || rptpassword<=0)
       {
            alert("CAMPOS VARIOS");  
       }else
       {
           if(password!==rptpassword)
        {
            alert("LAS CONTRASEÑAS DEBEN SER IGUALES");
        }else
        {
           $.ajax({
            url:'./CONTROLADOR/UsuarioControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Update',idusuario:idusuario,password:password},
          success:function(response){
           
             if(response.indexOf('success')> -1)
             {
                 swal('SE REGISTRO UN NUEVO USUARIO',
                'En hora buena , lo has logrado!',
                'success');
             limpiarModalUsuario();
             }else
             {
                 alert("NO SE PUDO REGISTRAR EL USUARIO");
             }
          },fail: function(response)
          {console.log(typeof(response));}
           }).done(function(){
          console.log("success"); 
       }).fail(function(){
           console.log("error");
       }).always(function(){
           console.log("complete");
       });
        }
       }
        
        
    });
        
    $("#username").change(function(){
           
           var usuario = $("#username").val();
           
           if(usuario.length<=0)
           {
               $("#comprobarusuario").html(""); 
           }else
           {
               $.ajax({
            url:'./CONTROLADOR/UsuarioControlador.php',
            type:'POST',
            contentType:'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
          data : {op:'comprobarUsuario',usuario:usuario},
          success:function(response){
              
                var estado = response[0]['estado'];
                
                if(estado === "success")
                {
                $("#comprobarusuario").html("<FONT COLOR='RED'><B>!Alerta! Existe un usuario con este nick!</B></FONT>");
                $('#register').attr("disabled", true);
                }
                else
                {
                 $("#comprobarusuario").html("<FONT COLOR='BLACK'><B>El nickname no esta registrado</B></FONT>");
                 $('#register').attr("disabled", false);
                }
              
          },fail: function(response)
          {
              console.log(typeof(response));
          }
           }).done(function(){
          console.log("success"); 
       }).fail(function(){
           console.log("error");
       }).always(function(){
           console.log("complete");
       });
           }
        });    
        
    
    $('#register').click(function(e){
        e.preventDefault();
        
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var email = $('#email').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var rptpassword = $('#rptpassword').val();
        var nivel = $('#nivel').val();
        
        //alert(nombre+' / '+apellido+' / '+email+' / '+username+' / '+password+' / '+rptpassword+' / '+nivel);
       
        if(email.length<=0 || username.length<=0 || password.length <=0 || nivel === "" || nivel === null)
        {
            alert("FALTAN INGRESO DE DATOS!")
        }else
        {
            if(password!==rptpassword)
        {
           alert('Las contraseñas deben ser iguales');
        }else
        {
           $.ajax({
            url:'./CONTROLADOR/UsuarioControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Create',nombre:nombre,apellido:apellido,email:email,username:username,password:password,nivel:nivel},
          success:function(response){
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             {
                 swal('SE REGISTRO UN NUEVO USUARIO',
                'En hora buena , lo has logrado!',
                'success');
             }else
             {
                 alert("NO SE PUDO REGISTRAR EL USUARIO");
             }
          },fail: function(response)
          {console.log(typeof(response));}
           }).done(function(){
          console.log("success"); 
       }).fail(function(){
           console.log("error");
       }).always(function(){
           console.log("complete");
       });
        }
        }
        
    });
    
              
});

var lista = function ()
   
   {    
      
    var table = $("#dt_usuario").DataTable({
                "destroy":true,
             "ajax":{
                 "method":"POST",
                 "url":"./CONTROLADOR/UsuarioControlador.php",
                 "data":{op:'Listar'}
                    },
             "columns":[
                 {"data":"nombre"},
                 {"data":"email"},
                 {"data":"usuario"},
                 {"data":"tipousunombre"},
                 {"defaultContent":"<button type='button' class='editar btn btn-primary'><i class='zmdi zmdi-edit'></i></button><button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='zmdi zmdi-delete'></i></button>"}
             ],"language":idioma_spanish,
             "dom": "<'row'<'form-inline' <'col-sm-offset-5'B>>>"
					 +"<'row' <'form-inline' <'col-sm-1'f>>>"
					 +"<rt>"
					 +"<'row'<'form-inline'"
					 +"<'col-sm-6 col-md-6 col-lg-6'l>"
					 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
				"buttons":[]    
            });
            obtener_data_modificar("#dt_usuario tbody",table);
            
   }

        
var obtener_data_modificar = function (tbody,table)
{
        $(tbody).on("click","button.editar",function(){
        var data = table.row( $(this).parents("tr") ).data();
        
        //console.log(data);
        
         $("#idusuario").val(data.id);
        $("#usuarionick").val(data.usuario);
        $('#modalUsuario').modal('show');
        
    });
    
}

var limpiarModalUsuario = function ()
{
        $("#usuarionick").val("");
        $("#password").val("");
        $("#rptpassword").val("");
        $('#modalUsuario').modal('hide');
}


var idioma_spanish = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
