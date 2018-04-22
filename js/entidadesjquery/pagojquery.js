$(document).ready(function(){
  
    //ESTA FUNCION ESTA PARA PENSARLA LUEGO.
  /*$('#buscaralumno').change(function(){
     
      var alumno = $('#buscaralumno').val();
      
      if(alumno===""|| alumno===" ")
      {
        $('#idalumno').val(0);
      }else
      {}
    });  */
    
    lista();
    
    $("#formRegistroPago").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
        });
    
    $("#formActualizarPago").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
        
   $("#montopago").keypress(function(e){
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        });
        
    $("#montopagoactua").keypress(function(e){
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
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
            
            $('#idcurso').val(data.id);
            return data.nombre;
        }
    });
        
  $('#buscarAlumno').typeahead({
       source:function(query,result)
       {var $items = new Array;
            $items = [""];
              $.ajax({
                url:"./CONTROLADOR/AlumnoControlador.php",
                method:"POST",
                data:{op:'Obtener',busqueda:query},
                dataType: 'json',
                success: function (data) {
                    //console.log(data);
                    $.map(data,function(data){
                       var group;
                       
                       group = 
                               {
                                   id:data.id,
                                   nombre:data.nombre,
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
            //console.log(data.nombrelimpio); 
            $('#idalumno').val(data.id);
            return data.nombre;
        }
  });
  
  $('#buscarPagosCursoPeriodo').click(function(e){
        e.preventDefault();
        
        var curso = $('#idcurso').val();
        var nombrecurso = $('#busquedacurso').val();
        var periodo = $('#periodo').val();
        
        if(curso.length<=0 || nombrecurso<=0)
        {
            $('#idcurso').val('')
            //alert("DEBE INGRESAR EL NOMBRE DEL CURSO");
            lista();
        }else
        {
            listaconfiltro(curso,periodo);  
        }
        
    });
  
    
  $("#buscarDeudasAlumno").click(function(e){
     e.preventDefault();
     
    var alumno = $('#idalumno').val();
    
    if(alumno.length<=0)
    {
            alert("DEBE BUSCAR UN ALUMNO PRIMERO");
    }else
    {
     
        $.ajax({
            url:'./CONTROLADOR/PagoControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "json",
          data : {op:'ConsultarCursoPago',alumno:alumno},
          success:function(response){
             
              $("#dt_cursopago").html('');
             
              if(response!=null && $.isArray(response))
              {
                  $("#dt_cursopago").append("<thead><tr><th><center>CURSO</center></th><th><center>FECHA INICIO</center></th><th><center>FECHA TERMINO</center></th><th><center>DEUDA</center></th><th><center>REGISTRAR</center></th></tr></thead>");
                  $.each(response,function(index,value){
                      $("#dt_cursopago").append("<tbody><tr><th><CENTER><B>"+value.nombrecurso+"</B></CENTER></th><th><CENTER><B>"+value.finicio+"</B></CENTER></th><th><CENTER><B>"+value.ftermino+"</B></CENTER></th><th style='color:red;'><CENTER><B>"+value.deuda+"</B></CENTER></th><th><CENTER><a type='button' href='./FrmRegistrarPago.php?estudiante="+value.nombreestudiante+"&idmatricula="+value.idmatricula+"&finicio="+value.finicio+"&ftermino="+value.ftermino+"&deuda="+value.deuda+"&nombrecurso="+value.nombrecurso+"&dni="+value.dni+"' class='btn btn-lg btn-primary'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></a></CENTER></th><tr></tbody>");
                  });
              }/*else if(response===null || response.length<=0)
              {
                  //POR EL MOMENTO NO RECONOCE ESTA CONDICIONAL
               $("#dt_cursopago").html('');
               $("#mensaje").html("<H1>NO SE OBTUBO RESULTADOS</H1>");
              }*/
             
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
  
  $('#tipopago').change(function(){
        var tipocurso = $(this).val();
        
        if(tipocurso === "1")
        {
          $("#numeropago").attr('placeholder','N° de Liquidación');
          $("#numeropago").prop('disabled', false);
          
        }else
        {
           $("#numeropago").attr('placeholder','N° de Documento');
           $("#numeropago").prop('disabled', false);
        }
    });
    
    $("#numeropago").change(function(){
           
           var numeropago = $("#numeropago").val();
           
           $("#verificarNumeroPago").html('');
           
           if(numeropago.length<=0)
           {
               $("#verificarNumeroPago").html("NO SE INGRESARON LOS DIGITOS ADECUADOS"); 
           }else if(numeropago.length>=5)
           {
           
           $.ajax({
            url:'./CONTROLADOR/PagoControlador.php',
            type:'POST',
            contentType:'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: "json",
          data : {op:'ConsultarNumeroPago',numeropago:numeropago},
          success:function(response){
              
              var estado = response[0]['estado'];
              
             if(estado === "success")
             {
                 $("#verificarNumeroPago").html("<FONT COLOR='RED'><B>!Atención! Este documento fue registrado anteriormente.</B></FONT><br><FONT COLOR='RED'><B>Curso:"+response[0]['nombre']+" Fecha :"+response[0]['fecha']+"</B></FONT>");
                 $('#registerPago').attr("disabled", true);
                 $('#modificarPago').attr("disabled", true);
             }else
             {
                 $("#verificarNumeroPago").html("<FONT COLOR='BLACK'><B>El documento no fue registrado.</B></FONT>")
                 $('#registerPago').attr("disabled", false);
                 $('#modificarPago').attr("disabled", false);
                 
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
    
    $("#montopago").change(function(){
        var montopago = $("#montopago").val();
        var precio = $("#deuda").val()
        
        $("#calculonuevadeuda").val("0");
        
        if(parseInt(montopago)>parseInt(precio))
        {
          $("#comparamonto").html("<FONT COLOR='RED'><B>!UY! Se acaba de exceder en el monto Ingresado! Ingrese Nuevamente</B></FONT>");
          //$("#deuda").val('00.00');
          $('#registerPago').attr("disabled", true);
        }else if(montopago===precio)
        {
          $("#comparamonto").html("<FONT COLOR='BLACK'><B>Todo en Orden! Puede registrar el pago.</B></FONT>");  
          //$("#deuda").val('00.00');
          $('#registerPago').attr("disabled", false);
          }else
          {
            $("#comparamonto").html("<FONT COLOR='RED'><B>Adeuda: S./"+(precio-montopago)+" Soles <B/></FONT>");  
            $("#calculonuevadeuda").val(precio-montopago);
            $('#registerPago').attr("disabled", false);
          }
        });
  
  $("#registerPago").click(function(e){
        e.preventDefault();
        
        var matriculaid = $("#idmatricula").val();
        var calculonuevadeuda = $("#calculonuevadeuda").val();
        var montopago = $("#montopago").val();
        var numeropago = $("#numeropago").val();
        var tipopago = $("#tipopago").val();
        var fechapago = $("#fechapago").val();
        
        if(tipopago === "" || tipopago === null || fechapago === "" || fechapago === null)
        {
            alert("VERIFIQUE TODOS LOS DATOS");
        }else
        {
            $.ajax({
            url:'./CONTROLADOR/PagoControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'RealizarPagoDeuda',idmatricula:matriculaid,tipopago:tipopago,numeropago:numeropago,fechapago:fechapago,calculonuevadeuda:calculonuevadeuda,montopago:montopago},
          success:function(response){
             
             //ESTA ES LA MANERA CORRECTA EN LA QUE SE PODRA SEGUIR MATRICULANDO EN EL MISMO CURSO O EN UNO DIFERENTE.
             
             if(response.indexOf('success')> -1)
             {
              swal({
              title: "REGISTRO DE PAGO EXITOSO",
              text: "Desea seguir en el registrando? ",
              type: "success",
              showCancelButton: false,
              confirmButtonClass: "#00FF00",
              cancelButtonClass: "FF0000",
              confirmButtonText: "SEGUIR REGISTRANDO",
              cancelButtonText: "REGRESAR",
              closeOnConfirm: true,
              closeOnCancel: true
            },
            function(isConfirm) {
              if (isConfirm) {
                
              }else{
                  
              }
            });
                
            }else if(response.indexOf('error')> -1)
             {
                 alert("OCURRIO UN PROBLEMA EN EL SERVIDOR \n RED INESTABLE");
             }else
             {
                alert("NO SE PUDO REALIZAR EL PAGO");
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
      
  });
  
        $("#modificarPago").click(function(e){
        e.preventDefault();
        
            var idpago = $("#idpagomatricula").val();
            var tipopago = $("#tipopago").val();
            var documento = $("#numeropago").val();
            var fechapago = $("#fechapago").val();
            var montopago = $("#montopagoactua").val();
            
            if(tipopago===null || tipopago === "" || fechapago===null || fechapago === "" || montopago.length<=0)
            {
             alert("HAY CAMPOS VACIOS");   
            }else
            {
                $.ajax({
            url:'./CONTROLADOR/PagoControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'ActualizarPago',idpago:idpago,tipopago:tipopago,documento:documento,fechapago:fechapago,montopago:montopago},
          success:function(response){
             
             //ESTA ES LA MANERA CORRECTA EN LA QUE SE PODRA SEGUIR MATRICULANDO EN EL MISMO CURSO O EN UNO DIFERENTE.
             
             if(response.indexOf('success')> -1)
             {
              
                limpiarModal();
                lista();
                
            }else if(response.indexOf('error')> -1)
             {
                alert("OCURRIO UN PROBLEMA EN EL SERVIDOR \n RED INESTABLE");
                limpiarModal();
             }else
             {
                alert("NO SE PUDO ACTUALIZAR EL PAGO");
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
        
            });
          
});

var lista = function ()
{
   var table = $("#dt_listapagos").DataTable({
       "processing": true,
       "destroy":true,
       "order": [[2, 'desc' ]],
             "ajax":{
                 "method":"POST",
                 "url":"./CONTROLADOR/PagoControlador.php",
                 "data":{op:'ListarPagos'}
                    },"columns":[
                 {"data":"dni"},
                 {"data":"nombre"},
                 {"data":"fpago"},
                 {"data":"documento"},
                 {"data":"monto"},
                 {"defaultContent":"<button type='button' class='editar btn btn-primary'><i class='zmdi zmdi-edit'></i></button><button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='zmdi zmdi-delete'></i></button>"}
             ],"oLanguage":idioma_spanish,
             "buttons":['excelHtml5','pdfHtml5']
   });
   obtener_data_modificar("#dt_listapagos tbody",table); 
}

var listaconfiltro = function (curso,periodo)
{
   var table = $("#dt_listapagos").DataTable({
       "processing": true,
       "destroy":true,
       "order": [[1 , 'asc' ]],
             "ajax":{
                 "method":"POST",
                 "url":"./CONTROLADOR/PagoControlador.php",
                 "data":{op:'ListarPagosConFiltro',curso:curso,periodo:periodo}
                    },"columns":[
                 {"data":"dni"},
                 {"data":"nombre"},
                 {"data":"fpago"},
                 {"data":"documento"},
                 {"data":"monto"},
                 {"defaultContent":"<button type='button' class='editar btn btn-primary'><i class='zmdi zmdi-edit'></i></button><button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='zmdi zmdi-delete'></i></button>"}
             ],"oLanguage":idioma_spanish,
             "buttons":['excelHtml5','pdfHtml5']
   });
    obtener_data_modificar("#dt_listapagos tbody",table); 
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
    "sSearch":         "BUSCAR POR CRITERIOS EN NEGRITA DE LA TABLA: ",
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

var obtener_data_modificar = function(tbody,table)
{
    $(tbody).on("click","button.editar",function(){
        var data = table.row( $(this).parents("tr") ).data();
        
        //parece que siempre voy a tener que limpiar y volver a cargar
        $("#tipopago").val('');
        $("#verificarNumeroPago").html('');
        $('#registerPago').attr("disabled", true);
        
        $("#idpagomatricula").val(data.idpago);
        $("#ALUMNO").val(data.nombre);
        $("#DNI").val(data.dni);
        $("#CURSO").val(data.curso);
        $("#fechaini").val(data.finicio);
        $("#fechafin").val(data.ftermino);
        
        $("#tipopago").val(data.tipopago);
        $("#tipopago option[value="+'"'+data.tipopago+'"'+"]").attr("selected",true);
        
        $("#numeropago").val(data.documento);
        $("#fechapago").val(data.fpago);
        $("#montopagoactua").val(data.monto);
        
        $('#modalPagos').modal('show');
        
    });
}

var limpiarModal = function()
{
    $('#modalPagos').modal('hide');
}


