$(document).ready(function(){
    
    lista();
    
    $("#registropreinscrito").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
        
    $("#detalleNuevoCurso").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
    
    $("#cerrarmodal").click(function(e){
            e.preventDefault();
            limpiarModalPreIns();
        });
        
    $("#cerrarmodalcurso").click(function(e){
            e.preventDefault();
            limpiarModalCurso();
        });
    
    //ESTE ES PARA EL FORMULARIO
     $('#cursopreins').typeahead({
        source:function(query,result)
        {
            var $items = new Array;
            $items = [""];
              $.ajax({
                url:"./CONTROLADOR/CursoControlador.php",
                method:"POST",
                data:{op:'Listar',busqueda:query},
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
            $('#idcurso').val(data.id);
            return data.nombre;
        }
        
    });
   
    
    //ESTE ES PARA LOS MANTENIMIENTOS
    $('#busquedacursopreins').typeahead({
        source:function(query,result)
        {
             var $items = new Array;
            $items = [""];
              $.ajax({
                url:"./CONTROLADOR/CursoControlador.php",
                method:"POST",
                data:{op:'Listar',busqueda:query},
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
            $('#idcursobusqueda').val(data.id);
            return data.nombre;
        }
    });
    
    ///PARA EL MODAL cursopreinsmodal
    
    
    
    
    $('#alumnopreins').typeahead({
       source:function(query,result)
       {
           var $items = new Array;
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
                                   email:data.email,
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
            $('#alumnoid').val(data.id);
            //$('#emailpreins').html(data.email);
             $('#emailpreins').val(data.email);
             console.log(data.email);
            return data.nombre;
        }
    });
    
    $("#registrarCurso").click(function(e){
       e.preventDefault(); 
        
       var tipocurso = $("#tipo_curso").val();
       var nombrecurso = $("#nom_curso").val();
       var taller = $('input:radio[name=taller]:checked').val();
       
        //alert(nombrecurso+" - "+tipocurso+" - "+taller);
       if(nombrecurso===""||tipocurso===null)
       {
            alert("VERIFIQUE LOS DATOS");
       }else
            {
          $.ajax({
            url:'./CONTROLADOR/CursoControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
          dataType: "text",
          data : {op:'Create',curso:nombrecurso,tipocurso:tipocurso,taller:taller},
          success:function(response){
             
             if(response.indexOf('success')> -1)
             {  swal('TODO EN ORDEN!!!','Se registro al Curso!','success');
                $("#cursopreins").val(nombrecurso);
                limpiarModalCurso();
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
            }
        
    });
    
    $("#registrarPreIns").click(function(e){
       e.preventDefault();
       
       var apellido = $("#apellido").val();
       var nombre = $("#nombre").val();
       var emailp = $("#email_p").val();
       var emaili = $("#email_i").val();
       var celular = $("#celular_e").val();
       var telefono = $("#telefono_e").val();
       var anexo = $("#anexo_pre").val();
       
        //alert(apellido+" - "+nombre+" - "+emailp+" - "+emaili+" - "+celular+" - "+telefono+" - "+anexo);
       
       if(apellido.length <=0 ||nombre.length <=0 ||emailp.length <=0){
            alert("DATOS INCOMPLETOS");
       }else
       {
           $.ajax({
            url:'./CONTROLADOR/AlumnoControlador.php',
          type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'CreatePreIns',nombre:nombre,apellido:apellido,celular:celular,telefono:telefono,emailpersonal:emailp,emailinsti:emaili,anexo:anexo},
          success:function(response){
             
             if(response.indexOf('success')> -1)
             {
                 swal('SE REGISTRO UN NUEVO PREINSCRITO',
                'En hora buena , lo has logrado!',
                'success'
                     );
                        limpiarModalPreIns();
             }else
             {
                        alert("NO SE REGISTRO PREINSCRITO");
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
    
    $('#buscarPreInsCurso').click(function(e){
        e.preventDefault();
        
        var curso = $('#idcursobusqueda').val();
        var periodo = $('#periodo').val();
        
        if(curso==="" || curso ===" " || periodo=== null || periodo ==="NULL")
        {
            alert("DATOS INCORRECTOS \n VUELVA A INGRESAR"); 
        }else
        {
            listaconfiltro(curso,periodo);  
        }
        
        
    });
    
    $('#register').click(function(e){
        e.preventDefault();
        
        var curso = $("#idcurso").val();
        var nombrecurso = $("#cursopreins").val();
        var condicion = $("#condicion").val();
        var alumno = $("#alumnoid").val();
        var nombrealumno = $("#alumnopreins").val();
        var fecha = $("#fechacont").val();
        var fechacont = $('input:radio[name=fuera_de_fecha]:checked').val();
        var difucion = $("#difucion").val();
        var observacion = $("#observacion").val();
        
        if(curso.length<=0 || alumno.length<=0 || difucion === null)
        {
            alert("VERIFIQUE BIEN LOS DATOS");
        }else
        {
            $.ajax({
            url:'./CONTROLADOR/PreInscritoControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
          dataType: "text",
          data : {op:'Create',curso:curso,condicion:condicion,alumno:alumno,fecha:fecha,fechacont:fechacont,difucion:difucion,observacion:observacion},
          success:function(response){
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             { swal('TODO EN ORDEN!!!','En hora buena , se registro al PreInscrito!','success');
               limpiarFormularioPreIns();
             }else if(response.indexOf('error')> -1)
             {
                 alert("EL PREINSCRITO "+nombrealumno+" YA ESTA MATRICULADO EN \n"+nombrecurso+"\n VUELVA A INGRESAR");
             }else
             {
                alert("NO SE PUDO REALIZAR LA MATRICULA");
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
   var table = $("#dt_preinscrito").DataTable({
       "processing": true,
       "destroy":true,
       "order": [[0 , 'desc' ]],
             "ajax":{
                 "method":"POST",
                 "url":"./CONTROLADOR/PreInscritoControlador.php",
                 "data":{op:'Listar'}
                    },"columns":[
                 {"data":"fecha"},
                 {"data":"nombre"},
                 {"data":"email"},
                 {"data":"celular"},
                 {"data":"curso"},
                 {"data":"observacion"},
                 {"defaultContent":"<button type='button' class='editar btn btn-primary'><i class='zmdi zmdi-edit'></i></button><button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='zmdi zmdi-delete'></i></button>"}
             ],"language":idioma_spanish
       ,"dom": "<'row'<'form-inline' <'col-sm-offset-5'B>>>"
					 +"<'row' <'form-inline' <'col-sm-1'f>>>"
					 +"<rt>"
					 +"<'row'<'form-inline'"
					 +"<'col-sm-6 col-md-6 col-lg-6'l>"
					 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
                                 "buttons":['excelHtml5',
                                            'pdfHtml5'
                                            ]
   });
   obtener_data_modificar("#dt_preinscrito tbody",table); 
}

var listaconfiltro = function (curso,periodo)
{
   var table = $("#dt_preinscrito").DataTable({
       "processing": true,
       "destroy":true,
       "order": [[0 , 'desc' ]],
             "ajax":{
                 "method":"POST",
                 "url":"./CONTROLADOR/PreInscritoControlador.php",
                 "data":{op:'ListarConFiltro',curso:curso,periodo:periodo}
                    },"columns":[
                 {"data":"fecha"},
                 {"data":"nombre"},
                 {"data":"email"},
                 {"data":"celular"},
                 {"data":"tipoinscri"},
                 {"data":"observacion"},
                 {"defaultContent":"<button type='button' class='editar btn btn-primary'><i class='zmdi zmdi-edit'></i></button><button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='zmdi zmdi-delete'></i></button>"}
             ],"language":idioma_spanish
       ,"dom": "<'row'<'form-inline' <'col-sm-offset-5'B>>>"
					 +"<'row' <'form-inline' <'col-sm-1'f>>>"
					 +"<rt>"
					 +"<'row'<'form-inline'"
					 +"<'col-sm-6 col-md-6 col-lg-6'l>"
					 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
                                 "buttons":['excelHtml5',
                                            'pdfHtml5'
                                            ]
   });
   obtener_data_modificar("#dt_preinscrito tbody",table);
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

var obtener_data_modificar = function(tbody,table)
{
    $(tbody).on("click","button.editar",function(){
        var data = table.row( $(this).parents("tr") ).data();
        
        $("#preinsidmodal").val(data.id);
        $("#modalfechacont").val(data.fecha);
        $("#alumnopreinsmodal").val(data.nombre);
        $("#modaldifucion option[value="+'"'+data.difu+'"'+"]").attr("selected",true);
        $('#modalModificarPreInscrito').modal('show');
        
    });
}

var limpiarModalPreIns = function ()
{
       $("#apellido").val("");
       $("#nombre").val("");
       $("#email_p").val("");
       $("#email_i").val("");
       $("#celular_e").val("");
       $("#telefono_e").val("");
       $("#anexo_pre").val("");
       $('#modalAlumnoPreIns').modal('hide');
}

var limpiarModalCurso = function ()
{
    $("#nom_curso").val("");
    $('#modalCurso').modal('hide');
}

var limpiarFormularioPreIns = function ()
{
    $("#cursopreins").val("");
    $("#condicion").val("");
    $("#alumnopreins").val("");
    $("#fechacont").val("");
    //$('input:radio[name=fuera_de_fecha]:checked').val()
    $("#difucion").val("");
    $("#observacion").val("");
    $('#modalModificarPreInscrito').modal('hide');
}



