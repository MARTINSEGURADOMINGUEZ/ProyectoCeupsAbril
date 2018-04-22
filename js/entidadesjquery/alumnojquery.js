$(document).ready(function()
{
        lista();
        
        //funcion para inhabilitar la tecla ENTER y evitar que no se oprima de manera descuidada.
        //En el formulario de registro
        $("#registroalumno").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
        });
        
        //funcion para inhabilitar la tecla ENTER y evitar que no se oprima de manera descuidada
        //En el modal
        $("#detalleAlumno").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
        });
        
        $("#celular").keypress(function(e){
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        });
        
        //valida que en el campo dni* del formulario de registro solo se ingresen numeros
        $("#dni").keypress(function(e){
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        });
        
        //valida que en el campo DNI* del modal de actualizar solo se ingresen numeros
        $("#DNIACTUA").keypress(function(e){
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        });
        
        //Aqui validamos que en el campo dni* del formulario de registro , cuando ingresamos un dni se verifique por ajax
        //si existe un dni identico o no.
        $("#dni").change(function(){
           
           var dni = $("#dni").val();
           
           if(dni.length<=0)
           {
               $("#busquedadni").html(""); 
           }else
           {
               $.ajax({
            url:'./CONTROLADOR/AlumnoControlador.php',
            type:'POST',
            contentType:'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
          data : {op:'VerificarAlumno',dni:dni},
          success:function(response){
              
                var estado = response[0]['estado'];
                
                if(estado === "success")
                {
                $("#busquedadni").html("<FONT COLOR='RED'><B>!Alerta! Existe un alunno con este dni</B></FONT><br><FONT COLOR='RED'><B>Nombre:"+response[0]['nombre']+"</B></FONT>");
                $('#register').attr("disabled", true);
                }
                else
                {
                 $("#busquedadni").html("<FONT COLOR='BLACK'><B>El dni no esta registrado.</B></FONT>");
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
        
        //Aqui validamos que en el campo DNI* del modal de actualización , cuando ingresamos un dni se verifique por ajax
        //si existe un dni identico o no.
        $("#DNIACTUA").change(function(){
           
           var dni = $("#DNIACTUA").val();
           
           if(dni.length<=0)
           {
               $("#busquedadniactua").html(""); 
           }else
           {
               $.ajax({
            url:'./CONTROLADOR/AlumnoControlador.php',
            type:'POST',
            contentType:'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
          data : {op:'VerificarAlumno',dni:dni},
          success:function(response){
              
                var estado = response[0]['estado'];
                
                if(estado === "success")
                {
                $("#busquedadniactua").html("<FONT COLOR='RED'><B>!Alerta! Existe un alunno con este dni</B></FONT><br><FONT COLOR='RED'><B>Nombre:"+response[0]['nombre']+"</B></FONT>");
                $('#actualizarAlumno').attr("disabled", true);
                }
                else
                {
                 $("#busquedadniactua").html("<FONT COLOR='BLACK'><B>El dni no esta registrado.</B></FONT>");
                 $('#actualizarAlumno').attr("disabled", false);
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
        
        $("#cerrarmodal").click(function(e){
            e.preventDefault();
            limpiarModal();
        });
        
        //SOLO DARA DE BAJA AL ALUMNO NO LO ELIMINARA, RECORDAR QUE HAY ALUMNOS YA MATRICULADOS EN CURSOS ASI QUE SUS DATOS NO PODRAN SER REEMPLAZADOS
        $("#eliminarAlumno").click(function(e){
           e.preventDefault();
           
           var id = $("#ideliminar").val();
           
           $.ajax({
            url:'./CONTROLADOR/AlumnoControlador.php',
          type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Delete',id:id},
          success:function(response){
             
             if(response.indexOf('success')> -1)
             {
                    swal('SE DIO DE BAJA EL ALUMNO CORRECTAMENTE',
                'En hora buena , lo has logrado!',
                'success'
                     );
                $('#modalAlumnoEliminar').modal('hide');
                lista();
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
           
        });
        
        $("#actualizarAlumno").click(function(e){
            e.preventDefault();
            
            var id = $("#id").val();
            var dni = $("#DNIACTUA").val();
            var apellido = $("#APELLIDOS").val();
            var nombre = $("#NOMBRES").val();
            var telefono = $("#TELEFONOS").val();
            var celular = $("#CELULARES").val();
            var domicilio = $("#DOMICILIOS").val();
            var distrito = $("#distritoactua").val();
            var emailperso = $("#emailpersonal").val();
            var emailinstitu = $("#emailinstitucional").val();
            var empresa = $("#EMPRESAS").val();
            var cargo = $("#CARGOS").val();
            var telefonoempresa = $("#TELEFONOEMPRESAS").val();
            var direccionempresa = $("#DIRECCIONES").val();
            var distritoempresa = $("#distritoempresaactua").val();
            
            if(dni.length<=0 || nombre.length<=0 || apellido.length<=0 || emailperso.length<=0)
       {
            alert("HAY CAMPOS VACIOS, VERIFIQUE LOS CAMPOS");
            
       }else
       {
           $.ajax({
            url:'./CONTROLADOR/AlumnoControlador.php',
          type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Update',id:id,dni:dni,nombre:nombre,apellido:apellido,celular:celular,telefono:telefono,domicilio:domicilio,distrito:distrito,emailpersonal:emailperso,emailinsti:emailinstitu,empresa:empresa,cargo:cargo,telefonoempresa:telefonoempresa,direccionempresa:direccionempresa,distritoempresa:distritoempresa},
          success:function(response){
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             {
                 swal('SE AH ACTUALIZADO UN NUEVO ALUMNO',
                'En hora buena , lo has logrado!',
                'success'
                     );
                limpiarModal();
                lista();
             }else
             {
                 alert("OCURRIO UN PROBLEMA");
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
       //FIN CONDICIONAL
        }
            
        });
    
    $('#register').click(function(e){
        e.preventDefault();
        
        var dni = $('#dni').val();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var celular = $('#celular').val();
        var telefono = $('#telefono').val();
         var domicilio = $('#domicilio').val();
        var distrito = $('#distrito').val();
        var emailpersonal = $('#emailperso').val();
        var emailintitucional = $('#emailinsti').val();
        
        var empresa = $('#empresa').val();
        var carogoarea = $('#cargo').val();
        var telefonoempresa = $('#telefonoempresa').val();
        var direccionempresa = $('#direccionempresa').val();
        var distritoempresa = $('#distritoempresa').val();
        
        var observacion = "";
        
       if(dni.length<=0)
       {
            alert("VERIFIQUE TODOS LOS CAMPOS! CAMPOS VACIOS");
            
       }else
       {
        $.ajax({
            url:'./CONTROLADOR/AlumnoControlador.php',
          type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Create',dni:dni,nombre:nombre,apellido:apellido,celular:celular,telefono:telefono,domicilio:domicilio,distrito:distrito,emailpersonal:emailpersonal,emailinsti:emailintitucional,empresa:empresa,cargoarea:carogoarea,telefonoempresa:telefonoempresa,direccionempresa:direccionempresa,distritoempresa:distritoempresa,observacion:observacion},
          success:function(response){
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             {
                 swal({
                 title: "REGISTRO DE ALUMNO EXITOSO",
                 text: "SE REGISTRO AL ALUMNO CORRRECTAMENTE",
                 type: "success",
                 showCancelButton: false,
                 confirmButtonClass: "btn-success",
                 confirmButtonText: "Deacuerdo!",
                 closeOnConfirm: true
               },
               function(){
                limpiarFormulario();
               });
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
       //FIN CONDICIONAL
       }
    });
    
});


var lista = function ()
{
   var table = $("#dt_alumno").DataTable({
       "processing": true,
       "destroy":true,
       "order": [[ 1, 'asc' ]],
             "ajax":{
                 "method":"POST",
                 "url":"./CONTROLADOR/AlumnoControlador.php",
                 "data":{op:'Listar'}
                 }
                 ,"columns":[
                 {"data":"dni"},
                 {"data":"nombres"},
                 {"data":"emailperso"},
                 {"defaultContent":"<button type='button' class='editar btn btn-primary'><i class='zmdi zmdi-edit'></i></button><button type='button' class='eliminar btn btn-danger'><i class='zmdi zmdi-delete'></i></button>"}
             ],"deferRender": true,"language":idioma_spanish
       ,"dom": "<'row'<'form-inline' <'col-sm-offset-5'B>>>"
					 +"<'row' <'form-inline' <'col-sm-1'f>>>"
					 +"<rt>"
					 +"<'row'<'form-inline'"
					 +"<'col-sm-6 col-md-6 col-lg-6'l>"
					 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
                                 "buttons":[
                                        'excelHtml5',
                                        'pdfHtml5'
                                 ]
   });
   
    obtener_data_modificar("#dt_alumno tbody",table);
    obtener_id_eliminar("#dt_alumno tbody",table);
}
 
var obtener_data_modificar = function(tbody,table)
{
    $(tbody).on("click","button.editar",function(){
        var data = table.row( $(this).parents("tr") ).data();
        
        console.log(data);
        
        $("#id").val(data.id)
        $("#DNIACTUA").val(data.dni);
        $("#APELLIDOS").val(data.apellido);
        $("#NOMBRES").val(data.nombre);
        $("#TELEFONOS").val(data.telefono);
        $("#CELULARES").val(data.celular);
        $("#DOMICILIOS").val(data.domicilio);
        //RECORDAR SIEMPRE ESTE TRUCO
        $("#distritoactua option[value="+'"'+data.distrito+'"'+"]").attr("selected",true);
        $("#emailpersonal").val(data.emailperso);
        $("#emailinstitucional").val(data.emailinsti);
        $("#EMPRESAS").val(data.empresa);
        $("#CARGOS").val(data.cargo);
        $("#TELEFONOEMPRESAS").val(data.telefonoempresa);
        $("#DIRECCIONES").val(data.direccionempresa);
        //RECORDAR SIEMPRE ESTE TRUCO
        $("#distritoempresaactua option[value="+'"'+data.distritoempresa+'"'+"]").attr("selected",true);  
        $('#modalAlumno').modal('show');
        
    });
}

var obtener_id_eliminar = function (tbody,table)
{
    $(tbody).on("click","button.eliminar",function(){
        var data = table.row( $(this).parents("tr") ).data();
        var dni = data.dni;
        if(dni===null)
        {dni="NO REGISTRADO"}
        $("#ideliminar").val(data.id);
        $("#alumnoeliminar").html("<Font color='RED'>¿SEGURO QUE DESEA DAR DE BAJA AL ALUMNO?<br>NOMBRE: "+data.nombres+"<br>DNI: "+dni+"</FONT>")
        $('#modalAlumnoEliminar').modal('show');
    });
    
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

var cerrarModal = function ()
{
    limpiarModal();
}
        
var limpiarModal = function()
{
        $("#id").val("")
        $("#DNIACTUA").val("");
        $("#APELLIDOS").val("");
        $("#NOMBRES").val("");
        $("#TELEFONOS").val("");
        $("#CELULARES").val("");
        $("#DOMICILIOS").val("");
        //$("#distritoactua").val($('#distritoactua > option:first').val());
        $("#emailpersonal").val("");
        $("#emailinstitucional").val("");
        $("#EMPRESAS").val("");
        $("#CARGOS").val("");
        $("#TELEFONOEMPRESAS").val("");
        $("#DIRECCIONES").val("");
        //$("#distritoempresaactua").val($('#distritoempresaactua > option:first').val());
       
       $("#busquedadniactua").html("");
       $('#actualizarAlumno').attr("disabled", false);
       $('#modalAlumno').modal('hide');
}

var limpiarFormulario = function()
{
        $("#dni").val("");
        $("#nombre").val("");
        $("#apellido").val("");
        $("#telefono").val("");
        $("#celular").val("");
        $("#domicilio").val("");
       $("#distrito").val("");
       $("#emailpersonal").val("");
       $("#emailinsti").val("");
       $("#empresa").val("");
       $("#cargo").val("");
       $("#telefonoempresa").val("");
       $("#direccionempresa").val("");
       $("#distritoempresa").val("");  
}




