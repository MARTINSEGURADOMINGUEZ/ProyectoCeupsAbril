$(document).ready(function()
{
    
    ocultar_tipocurso();
    
    //ESTE CODIGO BLOQUEA QUE SE REGISTRE PRESIONANDO EQUIVOCADAMENTE ENTER o INTRO
    $("#formRegistroCurso").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
    
    $("#horas").keypress(function(e){
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
    });
    
    $("#creditos").keypress(function(e){
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
    });
    
    $("#notamin").keypress(function(e){
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
    });
    
    $('#nombrecurso').change(function(e){
        e.preventDefault();
        var nombrecurso = $(this).val();
        
        if(nombrecurso.length<=0)
        {
         $('#idcurso').val("");   
        }
        
    });
    
    $('#nombrecurso').typeahead({
        source:function(query,result)
        { var $items = new Array;
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
    
    $("#registraCurso").click(function(e){
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
    
    $("#manticurso").click(function(e){
        e.preventDefault();
        lista();
    });
    
    $("#modificarCurso").click(function(e){
       e.preventDefault();
       
       var periodo = $("#modalperiodocurso").val();
       var finicio = $("#modalfechini").val();
       var ftermino = $("#modalfechfin").val();
       var horas = $("#modalhoras").val();
       var creditos = $("#modalcreditos").val();
       var notamin = $("#modalnotamin").val();
       
       $.ajax({
            url:'./CONTROLADOR/CursoControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
          dataType: "text",
          data : {op:'Update',periodo:periodo,finicio:finicio,ftermino:ftermino,horas:horas,creditos:creditos,notamin:notamin},
          success:function(response){
             
             if(response.indexOf('success')> -1)
             {
                    limpiarModalActualizar();
                    lista();
             }else if(response.indexOf('error')> -1)
             {
                    limpiarModalActualizar();
                    lista();
             }else
             {
                 alert("OCURRIO UN ERROR AL ACTUALIZAR");
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
       
    });
    
    $('#register').click(function(e){
        e.preventDefault();
        
        var idcurso = $('#idcurso').val();
        var fechini = $('#fechini').val();
        var fechfin = $('#fechfin').val();
        var horas = $('#horas').val();
        var credito = $('#creditos').val();
        var tipocurso = $('#tipocurso').val();
        var notamin = $('#notamin').val();
        
                
        if(idcurso==="" || idcurso===null)
        {
            alert("NO PROCEDE LA PROGRAMACIÓN DEL CURSO");
        }else
        {
            if(tipocurso === "1")
        {
           var pubgene =  $('#pubgeneral').val();
           var ceupseupg = $('#ceupseupg').val();
           var pregrado = $('#pregrado').val();
           var docenteyadmin = $('#docenteadmin').val();
           
           $.ajax({
            url:'./CONTROLADOR/CursoControlador.php',
          type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Registrar',nombre:idcurso,fechaini:fechini,fechafin:fechfin,horas:horas,credito:credito,notamin:notamin,tipocurso:tipocurso,cantpartici:'0',costogeneral:'0',pubgeneral:pubgene,ceupseupg:ceupseupg,pregrado:pregrado,docenteyadmin:docenteyadmin},
          success:function(response){
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             limpiarFormularioCurso();
             if(response.indexOf('success')> -1)
             {
                 swal('SE AH REGISTRADO UN NUEVO CURSO',
                'En hora buena , lo has logrado!',
                'success'
                     );
                    
             }else
             {}
          },fail: function(response)
          {console.log(typeof(response));}
          }).done(function(){
          console.log("success"); 
          }).fail(function(){
          console.log("error");
          }).always(function(){
           console.log("complete");});
            
        }else if(tipocurso === "2")
        {
            var costgeneral = $('#costogeneral').val();
            var cantpartici = $("#cantidadparticip").val();
            
           
            $.ajax({
            url:'./CONTROLADOR/CursoControlador.php',
          type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Registrar',nombre:idcurso,fechaini:fechini,fechafin:fechfin,horas:horas,credito:credito,notamin:notamin,tipocurso:tipocurso,cantpartici:cantpartici,costogeneral:costgeneral,pubgeneral:'0',ceupseupg:'0',pregrado:'0',docenteyadmin:'0'},
          success:function(response){
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             {
                 swal('SE AH REGISTRADO UN NUEVO CURSO',
                'En hora buena , lo has logrado!',
                'success'
                     );
             }else
             {}
          },fail: function(response)
          {console.log(typeof(response));}
          }).done(function(){
          console.log("success"); 
          }).fail(function(){
          console.log("error");
          }).always(function(){
           console.log("complete");});
        }
        }
        
        
    });
    
    $('#tipocurso').change(function(){
        var tipocurso = $(this).val();
        if(tipocurso === "1")
        {
          relevar_presencial();
        }else if(tipocurso === "2")
        {
            revelar_inhouse(); 
        }
        else if(tipocurso === "3")
        {
            revelar_semipresencial();
        }
        else if(tipocurso === "4")
        {
            revelar_virtual();
        }
        
    });
    
});

var lista = function ()
{
   var table = $("#dt_cursos").DataTable({
       "processing": true,
       "destroy":true,
       "order": [[2 , 'desc' ]],
             "ajax":{
                 "method":"POST",
                 "url":"./CONTROLADOR/CursoControlador.php",
                 "data":{op:'ListarCursos'}
                    },"columns":[
                 {"data":"curso"},
                 {"data":"fechaini"},
                 {"data":"fechafin"},
                 {"defaultContent":"<button type='button' class='editar btn btn-primary'><i class='zmdi zmdi-edit'></i></button><button type='button' class='infor btn btn-info'><i class='zmdi zmdi-search'></i></button><button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='zmdi zmdi-delete'></i></button>"}
             ],"language":idioma_spanish
       ,"dom": "<'row'<'form-inline' <'col-sm-offset-5'B>>>"
					 +"<'row' <'form-inline' <'col-sm-1'f>>>"
					 +"<rt>"
					 +"<'row'<'form-inline'"
					 +"<'col-sm-6 col-md-6 col-lg-6'l>"
					 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
                                 "buttons":[
                                            ]
   });
   obtener_data_modificar("#dt_cursos tbody",table);
}

var obtener_data_modificar = function(tbody,table)
{
    $(tbody).on("click","button.editar",function(){
        var data = table.row( $(this).parents("tr") ).data();
        
        $("#modalidcurso").val(data.idcurso);
        $("#modalperiodocurso").val(data.id);
        $("#modalfechini").val(data.fechaini);
        $("#modalfechfin").val(data.fechafin);
        $("#modalhoras").val(data.horas);
        $("#modalcreditos").val(data.credito);
        $("#modalnotamin").val(data.notamin);
        $("#modalnombrecurso").val(data.curso);
       
        $('#modalActualizarCurso').modal('show');
        
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

var limpiarModalActualizar = function()
{
        $("#modalidcurso").val("");
        $("#modalperiodocurso").val("");
        $("#modalfechini").val("");
        $("#modalfechfin").val("");
        $("#modalhoras").val("");
        $("#modalcreditos").val("");
        $("#modalnotamin").val("");
        $("#modalnombrecurso").val("");
    $("#modalActualizarCurso").modal("hide");
}

var limpiarModalCurso = function()
{
    $("#nom_curso").val("");
    $("#modalCurso").modal("hide");
}

var limpiarFormularioCurso = function()
{
    $('#idcurso').val("");
    $('#nombrecurso').val("");
    $('#fechini').val("");
    $('#fechfin').val("");
    $('#horas').val("");
    $('#creditos').val("");
    $('#tipocurso').val("");
    $('#notamin').val("");
    $('#pubgeneral').val("");
    $('#ceupseupg').val("");
    $('#pregrado').val("");
    $('#docenteadmin').val("");
}


var ocultar_tipocurso = function()
{
    $('#presencial').slideUp("slow");
    $('#inhouse').slideUp("slow");
    $('#semipresencial').slideUp("slow");
    $('#virtual').slideUp("slow");
}

var relevar_presencial = function()
{
    $('#presencial').slideDown("slow");
    $('#inhouse').slideUp("slow");
    $('#semipresencial').slideUp("slow");
    $('#virtual').slideUp("slow");
}

var revelar_inhouse = function ()
{
    $('#presencial').slideUp("slow");
    $('#inhouse').slideDown("slow");
    $('#semipresencial').slideUp("slow");
    $('#virtual').slideUp("slow");
}

var revelar_semipresencial = function()
{
    $('#presencial').slideUp("slow");
    $('#inhouse').slideUp("slow");
    $('#semipresencial').slideDown("slow");
     $('#virtual').slideUp("slow");
}

var revelar_virtual = function()
{
    $('#presencial').slideUp("slow");
    $('#inhouse').slideUp("slow");
    $('#semipresencial').slideUp("slow");
    $('#virtual').slideDown("slow");
}


