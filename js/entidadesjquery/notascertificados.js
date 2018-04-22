$(document).ready(function(){
    
    ocultar();
    
    $('#campnotas').typeahead({
        source:function(query,result)
        {
            $.ajax({
                url:"./CONTROLADOR/CursoControlador.php",
                method:"POST",
                data:{op:'Listar',busqueda:query},
                dataType: 'json',
                success: function (data) {
                    result($.map(data,function(item){
                        return item.nombre;
                    }))
                }
            })
        }
    });
    
    $('#campcertificado').typeahead({
        source:function(query,result)
        {
            $.ajax({
                url:"./CONTROLADOR/CursoControlador.php",
                method:"POST",
                data:{op:'Listar',busqueda:query},
                dataType: 'json',
                success: function (data) {
                    result($.map(data,function(item){
                        return item.nombre;
                    }))
                }
            })
        }
    });
             $('#datoscertificado').click(function(e){
             e.preventDefault();
        
             var curso = $('#campcertificado').val();
             
            $("#nombrecurso").html("CURSO : "+curso);
             
             $("#cuadro2").slideUp("slow");
             $("#cuadro3").slideDown("slow");
             
             lista(curso);
             
             });
    
        $("#plantilla").click(function(e){
            e.preventDefault();
            
            var path = "./Descargas/certificado_unfv_ceups_2016_8.cdr";
            window.location.href=path;
            
        })
    
});

var ocultar = function()
    {
        $("#cuadro3").slideUp("slow");
    }
    
var lista = function (curso)
{
    var curso = curso;
    
   var table = $("#dt_certificado").DataTable({
       "destroy":true,
             "ajax":{
                 "method":"POST",
                 "url":"./CONTROLADOR/AsistenciaControlador.php",
                 "data":{op:'ObtenerCertificado',curso:curso}
                    },"columns":[
                 {"data":"dni"},
                 {"data":"nombre"},
                 {"data":"tipoalu"},
                 {"data":"observacion"}
             ],"language":idioma_spanish
       ,"dom": "<'row'<'form-inline' <'col-sm-offset-5'B>>>"
					 +"<'row' <'form-inline' <'col-sm-1'f>>>"
					 +"<rt>"
					 +"<'row'<'form-inline'"
					 +"<'col-sm-6 col-md-6 col-lg-6'l>"
					 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
                                 "buttons":[{           "extend" : 'csvHtml5',
							"text" : "<i class='zmdi zmdi-account-add'> EXPORTAR DATOS CERTIFICADOS</i>",
							"titleAttr": "Exportar Datos",
							"className": "btn btn-success",
							"titleAttr" : 'CSV'
                                                        }]
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

var limpiar = function (text)
{
      var text = text.toLowerCase(); // a minusculas
      text = text.replace(/[áàäâå]/, 'a');
      text = text.replace(/[éèëê]/, 'e');
      text = text.replace(/[íìïî]/, 'i');
      text = text.replace(/[óòöô]/, 'o');
      text = text.replace(/[úùüû]/, 'u');
      text = text.replace(/[ýÿ]/, 'y');
      text = text.replace(/[ñ]/, 'n');
      text = text.replace(/[ç]/, 'c');
      text = text.replace(/['"]/, '');
      text = text.replace(/[^a-zA-Z0-9-]/, ''); 
      text = text.replace(/\s+/, '-');
      text = text.replace(/' '/, '-');
      text = text.replace(/(_)$/, '');
      text = text.replace(/^(_)/, '');
      return text;
}
