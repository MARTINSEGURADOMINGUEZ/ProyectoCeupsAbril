$(document).ready(function(){
    
    ocultar();
    
    $("#nuevo").click(function(e){
       e.preventDefault();
       $("#cuadro2").slideUp("slow");
       $("#cuadro1").slideDown("slow");
       $('#busquedacurso').val("");
       $('#busquedacurso').html("");
    });
    
    $("#consultarCurso").click(function(e){
        e.preventDefault();
    
        var idcurso = $('#idcurso').val();
        var periodo = $("#periodo").val();
        
        if(idcurso.length<=0)
        {
            alert("DEBE INGRESAR EL NOMBRE DEL CURSO");
        }else
        {
        
        $("#cuadro1").slideUp("slow");
        $("#cuadro2").slideDown("slow");
                
        $.ajax({
            url:'./CONTROLADOR/ConsultarPagoControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "json",
          data : {op:'ListarPagosCurso',cursoperiodo:idcurso},
          success:function(response){
             
              $("#dt_pagos").html('');
              var sumamonto = 0;
              var sumadeuda = 0;
              var sumabruto = 0;
              
              if(response!=null && $.isArray(response))
              {
                  $("#dt_pagos").append("<thead style='display: table-header-group'><tr><th><center>N°</center></th><th><center>DNI</center></th><th><center>NOMBRE</center></th><th><center>FECHA</center></th><th><center>RECIBO</center></th><th><center>MONTO</center></th><th><center>DEUDA</center></th><th><center>TIPO ALUMNO</center></th></tr></thead>");
                  $.each(response,function(index,value){
                      $("#dt_pagos").append("<tbody><tr><th><center>"+parseInt(index+1)+"</center></th><th>" + value.dni + "</th><th>" + value.nombre + "</th><th>" + value.fecha + "</th><th>" + value.recibo + "</th><th>"+ value.monto + "</th><th><FONT COLOR='RED'><B>"+ value.deuda + "</B></FONT></th><th>"+ value.tipoalumno+ "</th><tr></tbody>");
                      sumamonto = sumamonto + parseFloat(value.sumamonto);
                      sumadeuda = sumadeuda + parseInt(value.deuda);
                  });
                  $("#dt_pagos").append("<tfoot><tr><th colspan='5' ><h3><B>TOTAL PAGADO</B></h3></th><th id='totalmonto' name='totalmonto' style='color:green;' colspan='2' ><h3><B>"+'S./'+parseInt(sumamonto)+' Soles'+"</B></h3></th></tr>"
                  +"<tr><th colspan='5' ><h3><B>TOTAL DEUDA</B></h3></th><th id='totaldeuda' name='totaldeuda' colspan='2' ><h3><B>"+'S./'+parseInt(sumadeuda)+' Soles'+"</B></h3></th></tr>"
                  +"<tr><th colspan='5' ><h3><B>TOTAL BRUTO</B></h3></th><th id='totalbruto' name='totalbruto' colspan='2' ><h3><B>"+'S./'+(parseInt(sumamonto)+parseInt(sumadeuda))+' Soles'+"</B></h3></th></tr></tfoot><br>");
                                 
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
    
    $("#reportepago").click(function(e){
        e.preventDefault();
        
        $(location).attr('href','ReporteConsultaPagosCurso.php');
        
    });
    
    $('#busquedacurso').typeahead({
       source:function(query,result)
        {
            var periodo = $("#periodo").val();
            var $items = new Array;
            $items = [""];
              $.ajax({
                url:"./CONTROLADOR/CursoControlador.php",
                method:"POST",
                data:{op:'ListarConFiltro',busqueda:query,periodo:periodo},
                dataType: 'json',
                success: function (data) {
                    //console.log(data);
                    $.map(data,function(data){
                       var group;
                       
                       group = 
                               {
                                   id:data.id,
                                   nombre:data.nombre,
                                   nombrelimpio:data.nombrelimpio,
                                   toString : function()
                                    {
                                        return JSON.stringify(this);
                                    },
                                    toLowerCase : function ()
                                    {
                                        return this.nombre.toLowerCase();
                                    },
                                    indexOf: function (string) {
                                    return String.prototype.indexOf.apply(this.nombre, arguments);
                                    },
                                    substr: function(string)
                                    {
                                        var value = '';
                                        value += this.nombre;
                                         if(typeof(this.level) != 'undefined') {
                                        value += ' <span class="pull-right muted">';
                                        value += this.level;
                                        value += '</span>';
                                        }
                                    //return String.prototype.substr.apply('<a style="padding: 10px; font-size: 1.5em;">' + value + '</a>', arguments);
                                    return String.prototype.substr.apply(value, arguments);
                                    //recordar siempre cambiar la function replace por substr , parece que funciona con esta version de JQUERY
                                    }
                         };
                       
                       $items.push(group);
                    });
                    
                    result($items);
                }
            });
        },
        property: 'nombre',
        items: 10,
        minLength: 1,
        updater: function (data) {
            var item = JSON.parse(data);
            console.log(data.nombrelimpio); 
            $('#idcurso').val(data.id);
            $('#nombre').html("<B>"+data.nombrelimpio+"</B>");
            return data.nombre;
        }
       
    });
    
    //funcion para obtener el id -> periodo del curso
    $('#periodo').change(function(){
        var periodo = $(this).val();
        
    });
    
});

var lista = function (curso,periodo)
{
   var table = $("#dt_pagos").DataTable({
       "destroy":true,
             "ajax":{
                 "method":"POST",
                 "url":"./CONTROLADOR/CursoControlador.php",
                 "data":{op:'ObtenerIdCursosPorPeriodos',curso:curso,periodo:periodo}
                    },"columns":[
                 {"data":"dni"},
                 {"data":"nombre"},
                 {"data":"fecha"},
                 {"data":"recibo"},
                 {"data":"monto"},
                 {"data":"deuda"},
                 {"data":"tipoalumno"}
             ]
             ,"language":idioma_spanish
       ,"dom": "<'row'<'form-inline' <'col-sm-offset-5'B>>>"
					 +"<'row' <'form-inline' <'col-sm-1'f>>>"
					 +"<rt>"
					 +"<'row'<'form-inline'"
					 +"<'col-sm-6 col-md-6 col-lg-6'l>"
					 +"<'col-sm-6 col-md-6 col-lg-6'p>>>"
   });
}

var ObtenerNombreLimpio = function(idcurso)
{
    
    if(idcurso.length<=0)
    {
        alert("NO HAY NOMBRE DEL CURSO");
    }else
    {
        $.ajax({
            url:'./CONTROLADOR/CursoControlador.php',
          type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "json",
          data : {op:'ObtenerNombreCurso',idcurso:idcurso},
          success:function(response){
          
           $("#nombre").html('<h2><B><center>'+response[0]['nombre']+'</center></B></h2>'); 
          
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
  
}


var ocultar = function ()
{
    $("#cuadro2").slideUp("slow");
}