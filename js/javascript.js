$(document).ready(function()
{
    
    $('#login').click(function(e){
       
       e.preventDefault();
       
       var usuario = $('#username').val();
       var password = $('#password').val();
       //var tipo = $('#tipo').val();
       
       if(usuario === "" && password === "")
       {
        swal(
                'CREDENCIALES VACIAS',
                'Verifique todos los datos ,porfavor!',
                'error'
              );           
       }
       else{
       
       $.ajax({
          
          url:'./CONTROLADOR/UsuarioControlador.php',
          type:'POST',
          dataType: "JSON",
          data : {op:'login',username:usuario,password:password},
          success: function (response)
          {
              
              //aprender sobre tipo de datos de respuesta es muy importante , siempre estar atento en eso 
              //,jquery es muy util pero un poco inseguro 
              //, veremos cuanto mas puedo llegar con esto.
              
              //console.log(response);
              //SIEMPRE CUANDO HAYA PROBLEMAS EN EL RESPONSE NO SE IMPRIMIRA , Y AHI DEBO HACER UNA PRUEBA UNITARIA EN MI JSON con PHP
              
              var estado = response[0].estado;
              
              if(estado === "failed")
              {
                  swal('CREDENCIALES INCORRECTAS',
                'Verifique todos los datos ,porfavor!',
                'error'
                     );
              }else
              {
                  $(location).attr('href','home.php');
                  
              }

          },
          fail: function(response)
          {
              console.log(response);
          }
            
       }).done(function(){
          console.log("success"); 
       }).fail(function(){
           console.log("error");
       }).always(function(){
           console.log("complete");
       });
       
       // fin del sino
        }
    
    //fin de evento click
    });
    
//fin de ejecucion de codigo  

    /*$('#register').click(function(e){
        
        e.preventDefault();
        
        
     
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var email = $('#email').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var rptpassword = $('#rptpassword').val();
        var nivel = $('#nivel').val();
        
        alert(nombre+' / '+apellido+' / '+email+' / '+username+' / '+password+' / '+rptpassword+' / '+nivel);
        
        /*if(password!==rptpassword)
        {
           alert('Las contraseñas deben ser iguales');
        }else
        {
           //alert('todo en orden');
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
                 swal('TODO EN ORDEN!!!',
                'En hora buena , lo has logrado!',
                'success'
                     );
             }else
             {
                 
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
            */

});


