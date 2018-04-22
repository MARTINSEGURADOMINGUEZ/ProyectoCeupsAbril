$(document).ready(function()
{
    $('#curso').typeahead({
        source:function(query,result)
        {
             var $items = new Array;
            $items = [""];
              $.ajax({
                url:"./CONTROLADOR/CursoControlador.php",
                method:"POST",
                data:{op:'ListarCursoMatricula',busqueda:query},
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
            $('#idcurso').val(data.id);
            return data.nombrelimpio;
        }
    });
    
    $('#docente').typeahead({
        source:function(query,result)
        {
             var $items = new Array;
            $items = [""];
              $.ajax({
                url:"./CONTROLADOR/ProfesorControlador.php",
                method:"POST",
                data:{op:'ListarDocentes',busqueda:query},
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
            $('#iddocente').val(data.id);
            return data.nombrelimpio;
        }
    });
    
    $("#registrarDocente").click(function(e){
       e.preventDefault();
       
       var dni = $("#").val();
       var apellido = $("#").val();
       var nombre = $("#").val();
       var telefono = $("#").val();
       var celular = $("#").val();
       var email = $("#").val();
       var domicilio = $("#").val();
       var distrito = $("#").val();
       
       //AQUI SUPUESTAMENTE YA VALIDE EL INGRESO;
       
       $.ajax({
            url:'./CONTROLADOR/ProfesorControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'RegistrarDocente',idcurso:idcurso,iddocente:iddocente,finicio:finicio,ftermino:ftermino,observaciones:observaciones},
          success:function(response){
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             {
                
             }
              
          },fail: function(response)
          {
              console.log(typeof(response));
          }
           });
       
       
    });
    
    $("#registrar").click(function(e){
       e.preventDefault();
      
      var idcurso = $("#idcurso").val();
      var curso = $("#curso").val();
      var iddocente = $("#iddocente").val();
      var docente = $("#docente").val();
      var finicio = $("#fechainicio").val();
      var ftermino = $("#fechatermino").val();
      var observaciones = $("#observacion").val();
      
      if(finicio===null || ftermino === null|| curso==="" || docente === "")
      {
          alert("CAMPOS VACIOS!");
      }else
      {
          $.ajax({
            url:'./CONTROLADOR/ProfesorControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Registrar',idcurso:idcurso,iddocente:iddocente,finicio:finicio,ftermino:ftermino,observaciones:observaciones},
          success:function(response){
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             {
                
             }
              
          },fail: function(response)
          {
              console.log(typeof(response));
          }
           });
      }
      
    });
    
    
    $('#').click(function(e){
        e.preventDefault();
        
        var dni = $('#dni').val();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var celular = $('#celular').val();
        var telefono = $('#telefono').val();
        var cargo = $('#cargo').val();
         var domicilio = $('#domicilio').val();
        var distrito = $('#distrito').val();
        var emailpersonal = $('#emailperso').val();
        var curso = $('#curso').val();
        
        $.ajax({
            url:'./CONTROLADOR/ProfesorControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Create',dni:dni,nombre:nombre,apellido:apellido,celular:celular,telefono:telefono,cargo:cargo,domicilio:domicilio,distrito:distrito,emailpersonal:emailpersonal,curso:curso},
          success:function(response){
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             {
                swal('TODO EN ORDEN!!!',
                'En hora buena , se registro el Docente!',
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

    });
    
    
});

var lista = function ()
{
   var table = $("#dt_profesor").DataTable({
       "destroy":true,
             "ajax":{
                 "method":"POST",
                 "url":"./CONTROLADOR/ProfesorControlador.php",
                 "data":{op:'Listar'}
                    },"columns":[
                 {"data":"dni"},
                 {"data":"nombre"},
                 {"data":"cargo"},
                 {"data":"curso"},
                 {"defaultContent":"<button type='button' class='editar btn btn-primary'><i class='zmdi zmdi-edit'></i></button><button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='zmdi zmdi-delete'></i></button>"}
             ],"language":idioma_spanish
       ,"dom": "<'row'<'form-inline' <'col-sm-offset-5'B>>>"
					 +"<'row' <'form-inline' <'col-sm-1'f>>>"
					 +"<rt>"
					 +"<'row'<'form-inline'"
					 +"<'col-sm-6 col-md-6 col-lg-6'l>"
					 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
                                 "buttons":[]
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
