$(document).ready(function(){
    
    ObtenerCantidades();
    
    $("#estudiantes").click(function(){
       
       $("#detallecantidad").html('');
       
      $.ajax({
            url:'./CONTROLADOR/UsuarioControlador.php',
            type:'POST',
            contentType:'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
            data : {op:'ObtenerDataDetalladaHome',tipo:'alumnos'},
          success:function(response){
              if(response!=null && $.isArray(response))
              {
                  $("#detallecantidad").append("<thead><tr><th><center>N°</center></th><th><center>CURSO</center></th><th><center>CANTIDAD</center></th></tr></thead>");
                  $.each(response,function(index,value){
                      $("#detallecantidad").append("<tbody><tr><th><center>"+parseInt(index+1)+"</center></th><th>" + value.nombre + "</th><th>" + value.cantidad + "</th><tr></tbody>");
                  });
              }
          },fail: function(response)
          { console.log(typeof(response)); }
           }).done(function(){
          console.log("success"); 
       }).fail(function(){
           console.log("error");
       }).always(function(){
           console.log("complete");
       }); 
   });
   
   $("#admin").click(function(){
       
       $("#detallecantidadadmin").html('');
       
      $.ajax({
            url:'./CONTROLADOR/UsuarioControlador.php',
            type:'POST',
            contentType:'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
            data : {op:'ObtenerDataDetalladaHome',tipo:'admin'},
          success:function(response){
              if(response!=null && $.isArray(response))
              {
                  $("#detallecantidadadmin").append("<thead><tr><th><center>N°</center></th><th><center>NOMBRE</center></th><th><center>USUARIO</center></th><th><center>EMAIL</center></th></tr></thead>");
                  $.each(response,function(index,value){
                      $("#detallecantidadadmin").append("<tbody><tr><th><center>"+parseInt(index+1)+"</center></th><th>" + value.nombre+ "</th><th>" + value.usuario+ "</th><th>"+value.email+"</th><tr></tbody>");
                  });
              }
          },fail: function(response)
          { console.log(typeof(response)); }
           }).done(function(){
          console.log("success"); 
       }).fail(function(){
           console.log("error");
       }).always(function(){
           console.log("complete");
       }); 
   });
   
   $("#personal").click(function(){
       
       $("#detallecantidadpersonal").html('');
       
      $.ajax({
            url:'./CONTROLADOR/UsuarioControlador.php',
            type:'POST',
            contentType:'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
            data : {op:'ObtenerDataDetalladaHome',tipo:'personal'},
          success:function(response){
                if(response!=null && $.isArray(response))
                    {
                        $("#detallecantidadpersonal").append("<thead><tr><th><center>N°</center></th><th><center>NOMBRE</center></th><th><center>USUARIO</center></th><th><center>EMAIL</center></th></tr></thead>");
                        $.each(response,function(index,value){
                            $("#detallecantidadpersonal").append("<tbody><tr><th><center>"+parseInt(index+1)+"</center></th><th>" + value.nombre+ "</th><th>" + value.usuario+ "</th><th>"+value.email+"</th><tr></tbody>");
                        });
                    }
          },fail: function(response)
          { console.log(typeof(response)); }
           }).done(function(){
          console.log("success"); 
       }).fail(function(){
           console.log("error");
       }).always(function(){
           console.log("complete");
       }); 
   });
    
});

var ObtenerCantidades = function()
{
    
    $.ajax({
            url:'./CONTROLADOR/UsuarioControlador.php',
            type:'POST',
            contentType:'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
          data : {op:'ObtenerDataHome'},
          success:function(response){
              
                var cantadmin = response[0]['cantadmin'];
                var cantperso = response[0]['cantperso'];
                var cantiestudiantes = response[0]['cantalumno'];
                //var cantiprofesores = response[0][''];
                
                $("#admin").html(cantadmin);
                $("#personal").html(cantperso);
                $("#estudiantes").html(cantiestudiantes);
                $("#docentes").html("7");
                /*$("#estudiantes").value("<H2>"+cantiestudiantes+"</H2>");
                $("#docentes").value("<H2>XYZ</H2>");*/
          
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
