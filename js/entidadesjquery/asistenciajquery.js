$(document).ready(function()
{
    var periodo = "2018";
    
  $('#curso').typeahead({
      
        source:function(query,result)
        {
           var $items = new Array;
            $items = [""];
              $.ajax({
                url:"./CONTROLADOR/CursoControlador.php",
                method:"POST",
                data:{op:'ListarConFiltroSinFecha',busqueda:query,periodo:periodo},
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
    
    $('#cursocontrol').typeahead({
        source:function(query,result)
        {
           var $items = new Array;
            $items = [""];
              $.ajax({
                url:"./CONTROLADOR/CursoControlador.php",
                method:"POST",
                data:{op:'ListarConFiltroSinFecha',busqueda:query,periodo:periodo},
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
            
            $('#idcursocontrol').val(data.id);
            return data.nombre;
        }
    });
    
    
    
     $('#listado').click(function(e){
        e.preventDefault();
        
        var curso = $('#idcurso').val();
        var sesion = $('#sesion').val();
        var fecha = $('#fecha').val();
        
        if(curso.length<=0 || fecha==="" || fecha === null)
        {
            alert("VERIFIQUE TODOS LOS DATOS"); 
        }else
        {
           $.ajax({
            url:'./CONTROLADOR/AsistenciaControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Imprimir',curso:curso,sesion:sesion,fecha:fecha},
          success:function(response){
              
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             {
                window.location.href = "./ListadoAsistencia.php"; 
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
     
     $("#listacontrol").click(function(e){
        e.preventDefault();
        
        var curso = $('#idcursocontrol').val();
        
       $.ajax({
            url:'./CONTROLADOR/AsistenciaControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'ListaControl',curso:curso},
          success:function(response){
              
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             {
                window.location.href = "./ListadoControlCurso.php"; 
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



