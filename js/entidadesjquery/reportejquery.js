$(document).ready(function()
{
    obtenerDatos();
    
    $("#reporte").click(function(e){
        e.preventDefault();
       $.ajax({
            url:'./CONTROLADOR/ReporteControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Obtener'},
          success:function(response){
              
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             {
                 window.location.href = "./FrmReporte.php";
             }else
             {}
          },fail: function(response)
          {console.log(typeof(response));}
           }).done(function(){
          console.log("success"); 
       }).fail(function(){
           console.log("error");
       }).always(function(){
           console.log("complete");
       });
        
    });
    
});

var obtenerDatos = function ()
{
    
    //alert("ESTO ES UNA PRUEBA");
    $.ajax({
            url:'./CONTROLADOR/ConsultarPagoControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "html",
          data : {op:'Reporte'},
          success:function(response){
            $("#respuestaReporte").html(response);
          },fail: function(response)
          {
              
          }
           }).done(function(){
          console.log("success"); 
       }).fail(function(){
           console.log("error");
       }).always(function(){
           console.log("complete");
       });
}