$(document).ready(function()
{
       lista();
       ocultarCorporativo();
       
       //ESTO SOLO REFRESCARA PARA PODER VER EL MATRICULADO RECIENTEMENTE.
        $("#mantenimientodepal").click(function(e){
           e.preventDefault();
           lista();
        });
    
        $("#clear").click(function(e){
           e.preventDefault();
           limpiarMatricula();
        });
    
        $("#formmatricula").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
        });
        
        $("#detalleAlumno").keypress(function(e){
            if (e.which == 13) {
            return false;
            }
        });
        
        //ESTA ES UNA FUNCION PARA DETECTAR LOS ENTERS E IMPRIMIR ESPACIOS EN BLANCO.
        $("#observacion").keypress(function(e) {
            var contenido;
        if(e.which == 13) {
            contenido = $("#observacion").val();
            contenido = contenido+"\n";
            $("#observacion").val(contenido);
        }
        });
        
        //ESTA ES UNA FUNCION PARA DETECTAR LOS ENTERS E IMPRIMIR ESPACIOS EN BLANCO EN EL MODAL.
        $("#observacionmatri").keypress(function(e) {
            var contenido;
        if(e.which == 13) {
            contenido = $("#observacion").val();
            contenido = contenido+"\n";
            $("#observacion").val(contenido);
        }
        });
        
        $("#montopago").keypress(function(e){
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        });
        
        //FUNCIÓN PARA SOLO OBTENER NUMEROS Y NO LETRAS
        $("#DNI").keypress(function(e){
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        });
        
        //FUNCIÓN PARA SOLO OBTENER NUMEROS Y NO LETRAS PARA EL MODAL
        $("#DNIACTUA").keypress(function(e){
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        });
        
        //FUNCIÓN PARA VALIDAR SI EXISTE EL DNI
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
            dataType: "json",
          data : {op:'VerificarAlumno',dni:dni},
          success:function(response){
              
              var estado = response[0]['estado'];
              
             if(estado === "success")
             {
                 $("#busquedadniactua").html("<FONT COLOR='RED'><B>!Alerta! Existe un alunno con este dni</B></FONT><br><FONT COLOR='RED'><B>Nombre:"+response[0]['nombre']+"</B></FONT>");
                 $('#ingresarAlumno').attr("disabled", true);
             }else
             {
                 $("#busquedadniactua").html("<FONT COLOR='BLACK'><B>El dni no esta registrado.</B></FONT>")
                 $('#ingresarAlumno').attr("disabled", false);
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
        
        $("#modificarMatricula").click(function(e){
           e.preventDefault();
           
       var id= $("#idmatricula").val();
       var curso = $("#CURSO").val();
       var fechaini =$("#fechaini").val();
       var fechafin = $("#fechafin").val();
       var alumno = $("#ALUMNO").val();
       var condicion = $("#condicion").val();
       var observacion = $("#OBSERVACION").val();
       var situacion = $("#situacion").val();
       var documento = $("#documento").val()
       var recogio = $("#recogio").val();
       
        //alert(id+" - "+curso+" - "+fechaini+" - "+fechafin+" - "+alumno+" - "+condicion+" - "+observacion+" - "+situacion+" - "+documento+" - "+recogio)
       
       $.ajax({
            url:'./CONTROLADOR/MatriculaControlador.php',
          type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Update',id:id,condicion:condicion,observacion:observacion,situacion:situacion,documento:documento,recogio:recogio},
          success:function(response){
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             {
                 swal('SE AH ACTUALIZADO LA MATRICULA',
                'En hora buena , lo has logrado!',
                'success'
                     );
                     limpiarCerrarModalModificar();
                  lista();
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
        
    $("#ingresarAlumno").click(function(e){
       e.preventDefault();
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
       
       var observacion = $("#observacionmatri").val();
       
       if(nombre.length<=0 || apellido.length<=0)
       {
            alert("HAY CAMPOS VACIOS, VERIFIQUE LOS CAMPOS");
            
       }else
       {
           $.ajax({
            url:'./CONTROLADOR/AlumnoControlador.php',
          type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Create',dni:dni,nombre:nombre,apellido:apellido,celular:celular,telefono:telefono,domicilio:domicilio,distrito:distrito,emailpersonal:emailperso,emailinsti:emailinstitu,empresa:empresa,cargoarea:cargo,telefonoempresa:telefonoempresa,direccionempresa:direccionempresa,distritoempresa:distritoempresa,observacion:observacion},
          success:function(response){
             //ESTA FUNCION indexOF es importante para comparar o buscar en la cadena un contenido 
             //retorna -1 si no lo encuentra , es muy util cuando hay callback de tipo string.
             if(response.indexOf('success')> -1)
             {
                 swal({
              title: "REGISTRO EXITOSO",
              text: "Desea seguir registrando Alumnos:",
              type: "success",
              showCancelButton: true,
              confirmButtonClass: "success",
              cancelButtonClass: "danger",
              confirmButtonText: "SEGUIR REGISTRANDO",
              cancelButtonText: "CERRAR",
              closeOnConfirm: true,
              closeOnCancel: true
            },
            function(isConfirm) {
              if (isConfirm) {
                limpiarModalAgain();
              } else {
                limpiarModal();
              }
            });
                     
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
                                   idcatecurso:data.idcatecurso,
                                   costogeneral:data.costogeneral,
                                   cantipartici:data.cantipartici,
                                   
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
            $("#costogeneral").val(data.costogeneral);
            $("#cantipartici").val(data.cantipartici);
            $("#idcatecurso").val(data.idcatecurso);
            
            $("#nombrecurso").val(data.nombrelimpio);
            $('#idcurso').val(data.id);
            return data.nombre;
        }
    });
    
    $('#alumno').typeahead({
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
            $('#idalumno').val(data.id);
            //$('#emailpreins').html(data.email);
            
             console.log(data.email);
            return data.nombre;
        }
        
       });
       
    $('#tipopago').change(function(){
        var tipocurso = $(this).val();
        
        if(tipocurso === "1")
        {
          $("#numeropago").attr('placeholder','N° de Liquidación');
          $("#numeropago").prop('disabled', false);
          
        }else if(tipocurso === "6")
        {
           $("#numeropago").attr('placeholder','CC: 110-01-0416304');
           $("#numeropago").prop('disabled', true);
        }else
        {
           $("#numeropago").attr('placeholder','N° de Documento');
           $("#numeropago").prop('disabled', false);
        }
    });
    
    $('#curso').change(function(){
        
        var idcatecurso = $('#idcatecurso').val();
        
         $('#tipoalumno').html('');
        
        if(idcatecurso==="1")
        {
          $('#tipoalumno').append('<option value="" disabled="" selected="">Seleccione el tipo de Alumno</option>');  
          $('#tipoalumno').append('<option value="6" >PUBLICO GENERAL</option>');
          $('#tipoalumno').append('<option value="8">ALUMNO CEUPS - EUPG UNFV</option>');
          $('#tipoalumno').append('<option value="3" >ALUMNO UNIV. PREGRADO</option>');
          $('#tipoalumno').append('<option value="5">ADMINIST. Y DOCENTES</option>');
          $('#tipoalumno').append('<option value="7">COORPORATIVO</option>');
        }else if(idcatecurso === "2")
        {
            $('#tipoalumno').append('<option value="" disabled="" selected="">Seleccione el tipo de Alumno</option>');
            $('#tipoalumno').append('<option value="11">CURSO INHOUSE</option>');
        }else
        {
           
        }
        
    });
    
    $('#tipoalumno').change(function(){
        
         var tipoalumno = $(this).val();
         //var idcatecurso = $('#idcatecurso').val();
         
         if(tipoalumno==="11")
         {
          var costogeneral = $("#costogeneral").val();
          var cantidadalumnos = $("#cantipartici").val();
          
          var cantidadpago = Math.round((parseFloat(costogeneral)/parseInt(cantidadalumnos))*100)/100;
          
          console.log(cantidadpago);
          $("#precio").html("<h3><B>Debe pagar S./"+cantidadpago+ " Soles</B></h3>");
          $("#preciomarcado").val(cantidadpago);
          
         }else
         {
             var curso = $("#idcurso").val();
        
              var preciopubgeneral = 0;
              var ceupseupg = 0;
              var pregrado = 0;
              var docenteadmin = 0;
        
            $.ajax({
            url:'./CONTROLADOR/MatriculaControlador.php',
            type:'POST',
            contentType:'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: "json",
          data : {op:'CostoMatricula',tipoalumno:tipoalumno,curso:curso},
          success:function(response){
              
               preciopubgeneral = response[0]['general'];
               
               ceupseupg = response[0]['ceupseupg'];
               
               pregrado = response[0]['pregrado'];
               
               docenteadmin = response[0]['docenteadmin'];
               
             if(tipoalumno === "6")
             {  
             $("#precio").html("<h3><B>Debe pagar S./"+preciopubgeneral+ " Soles</B></h3>");
             $("#preciomarcado").val(response[0]['general']);
                    ocultarCorporativo();
             }else if(tipoalumno === "8")
             {
             $("#preciomarcado").val(response[0]['ceupseupg']);
             $("#precio").html("<h3><B>Debe pagar S./"+ceupseupg+ " Soles</B></h3>"); 
                ocultarCorporativo();
              }else if(tipoalumno === "3")
             {
             $("#preciomarcado").val(response[0]['pregrado']);
             $("#precio").html("<h3><B>Debe pagar S./"+pregrado+ " Soles</B></h3>");
                ocultarCorporativo();
              }
             else if(tipoalumno === "5")
             {$("#preciomarcado").val(response[0]['docenteadmin']);
             $("#precio").html("<h3><B>Debe pagar S./"+docenteadmin+ " Soles</B></h3>");
             ocultarCorporativo();
              }else if(tipoalumno === "7")
             {
                 $("#precio").html("");
                 $("#coorporativo").slideDown("slow");
                 
                 $("#descto").change(function(){
                     var desctotipo = $(this).val();
                     var precio = preciopubgeneral;
                     if(desctotipo === "1")
                     {
                        $("#preciomarcado").val(precio*0.90);
                        $("#precio").html("<h3><B>Debe pagar S./"+precio*0.90+" Soles</B></h4>"); 
                     }else if(desctotipo === "2")
                     {
                         $("#preciomarcado").val(precio*0.85);
                        $("#precio").html("<h3><B>Debe pagar S./"+precio*0.85+" Soles</B></h4>");
                     }else if(desctotipo === "3")
                     {
                        $("#preciomarcado").val(precio*0.80);
                        $("#precio").html("<h3><B>Debe pagar S./"+precio*0.80+" Soles</B></h4>"); 
                     }else if(desctotipo === "4")
                     {
                         $("#preciomarcado").val(precio*0.75);
                        $("#precio").html("<h3><B>Debe pagar S./"+precio*0.75+" Soles</B></h4>");
                     }else if(desctotipo === "5")
                     {
                       //alert("AQUI DEBE OCURRIR LA MAGIA!!!");  
                     }
                  });
                 
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
        var precio = $("#preciomarcado").val()
        if(parseInt(montopago)>parseInt(precio))
        {
          $("#comparamonto").html("<FONT COLOR='RED'><B>!UY! Se acaba de exceder en el monto Ingresado! Ingrese Nuevamente</B></FONT>");
          $("#deuda").val('00.00');
        }else if(montopago===precio)
        {
          $("#comparamonto").html("<FONT COLOR='BLACK'><B>Todo en Orden! Proceda a matricular</B></FONT>");  
          $("#deuda").val('00.00');
          }else
          {
            $("#comparamonto").html("<FONT COLOR='RED'><B>Adeuda: S./"+(precio-montopago)+" Soles <B/></FONT>");  
            $("#deuda").val(precio-montopago);
          }
        });
    
    $("#register").click(function(e){
        e.preventDefault();
        
        var curso = $("#idcurso").val();
        var nombrecurso = $("#nombrelimpio").val();
        var alumno = $("#idalumno").val();
        var tipoalumno = $("#tipoalumno").val();
        var observacion = $("#observacion").val();
        var precio = $("#preciomarcado").val()
        var deuda = $("#deuda").val();
        
        var tipopago = $("#tipopago").val();
        var numeropago = $("#numeropago").val();
        var fechapago = $("#fechapago").val();
        var montopago = $("#montopago").val();
        
        
        if(alumno === "" || curso === "" || montopago === "")
        {
            alert("VERIFIQUE TODOS LOS CAMPOS!");
        }else{
            $.ajax({
            url:'./CONTROLADOR/MatriculaControlador.php',
            type:'POST',
          contentType:'application/x-www-form-urlencoded; charset=UTF-8',
           dataType: "text",
          data : {op:'Matricular',curso:curso,alumno:alumno,tipoalumno:tipoalumno,observacion:observacion,deuda:deuda,tipopago:tipopago,numeropago:numeropago,fechapago:fechapago,montopago:montopago},
          success:function(response){
             
             //ESTA ES LA MANERA CORRECTA EN LA QUE SE PODRA SEGUIR MATRICULANDO EN EL MISMO CURSO O EN UNO DIFERENTE.
             
             if(response.indexOf('success')> -1)
             {
              swal({
              title: "MATRICULA EXITOSA",
              text: "Desea seguir en el curso: "+nombrecurso,
              type: "success",
              showCancelButton: true,
              confirmButtonClass: "#00FF00",
              cancelButtonClass: "FF0000",
              confirmButtonText: "SEGUIR MATRICULANDO",
              cancelButtonText: "CAMBIAR DE CURSO",
              closeOnConfirm: true,
              closeOnCancel: true
            },
            function(isConfirm) {
              if (isConfirm) {
                limpiarMatriculaAgain();
              } else {
                limpiarMatricula();
              }
            });
                
            }else if(response.indexOf('error')> -1)
             {
                 alert("EL ALUMNO "+alumno+" YA ESTA MATRICULADO EN \n"+curso.substr(4,nombrecurso));
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
    ///FIN REGISTRO DE MATRICULA
    });
    
});

var lista = function ()
{
   var table = $("#dt_matricula").DataTable({
       "destroy":true,
       "destroy":true,
       "order": [[ 1, 'asc' ]],
             "ajax":{
                 "method":"POST",
                 "url":"./CONTROLADOR/MatriculaControlador.php",
                 "data":{op:'Listar'}
                    },"columns":[
                 {"data":"dni"},
                 {"data":"nombre"},
                 {"data":"curso"},
                 {"data":"email"},
                 {"data":"observacion"},
                 {"defaultContent":"<button type='button' class='editar btn btn-primary'><i class='zmdi zmdi-edit'></i></button><button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='zmdi zmdi-delete'></i></button>"}
             ],"language":idioma_spanish
       ,"dom": "<'row'<'form-inline' <'col-sm-offset-5'B>>>"
					 +"<'row' <'form-inline' <'col-sm-1'f>>>"
					 +"<rt>"
					 +"<'row'<'form-inline'"
					 +"<'col-sm-6 col-md-6 col-lg-6'l>"
					 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
                                 "buttons":[
                                        'excelHtml5',
                                        'pdfHtml5']
   });
   
    obtener_data_modificar("#dt_matricula tbody",table);
}

var obtener_data_modificar = function(tbody,table)
{
    $(tbody).on("click","button.editar",function(){
        var data = table.row( $(this).parents("tr") ).data();
        console.log(data);
        $("#idmatricula").val(data.id)
        $("#CURSO").val(data.curso);
        $("#fechaini").val(data.fechaini);
        $("#fechafin").val(data.fechafin);
        $("#ALUMNO").val('DNI:'+data.dni+", "+data.nombre);
        $("#condicion option[value="+'"'+data.condicion+'"'+"]").attr("selected",true);
        $("#OBSERVACION").val(data.observacion);
        //RECORDAR SIEMPRE ESTE TRUCO
        $("#situacion option[value="+'"'+data.situacion+'"'+"]").attr("selected",true);
        $("#documento option[value="+'"'+data.documento+'"'+"]").attr("selected",true);
        $("#recogio option[value="+'"'+data.recogio+'"'+"]").attr("selected",true);
        //RECORDAR SIEMPRE ESTE TRUCO
        $('#modalModificarMatriculaAlumno').modal('show');
        
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

var limpiarModal = function()
{
        $("#DNIACTUA").val("");
        $("#APELLIDOS").val("");
        $("#NOMBRES").val("");
        $("#TELEFONOS").val("");
        $("#CELULARES").val("");
        $("#DOMICILIOS").val("");
       $("#distrito").val("");
       $("#emailpersonal").val("");
       $("#emailinstitucional").val("");
       $("#EMPRESAS").val("");
        $("#CARGOS").val("");
       $("#TELEFONOEMPRESAS").val("");
       $("#DIRECCIONES").val("");
       $("#distritoempresa").val("");
       
       $("#observacionmatri").val("");
       
       $('#modalAlumno').modal('hide');
}

var limpiarModalAgain = function()
{
        $("#DNIACTUA").val("");
        $("#APELLIDOS").val("");
        $("#NOMBRES").val("");
        $("#TELEFONOS").val("");
        $("#CELULARES").val("");
        $("#DOMICILIOS").val("");
       $("#distrito").val("");
       $("#emailpersonal").val("");
       $("#emailinstitucional").val("");
       $("#EMPRESAS").val("");
        $("#CARGOS").val("");
        $("#DIRECCIONES").val("");
       $("#TELEFONOEMPRESA").val("");
       $("#distritoempresa").val("");
       $("#observacionmatri").val("");
}

var limpiarCerrarModalModificar = function()
{
       /*$("#idmatricula").val("");
       $("#CURSO").val("");
       $("#fechaini").val("");
       $("#fechafin").val("");
       $("#ALUMNO").val("");
       $("#condicion").val("");
       $("#OBSERVACION").val("");
       $("#situacion").val("");
       $("#documento").val("")
       $("#recogio").val("");*/
       
       $('#modalModificarMatriculaAlumno').modal('hide');
}

var limpiarMatricula = function ()
{
     $("#curso").val("");
     $("#alumno").val("");
     $("#tipoalumno").val("");
     $("#observacion").val("");
     $("#preciomarcado").val("")
     $("#deuda").val("");
      $("#tipopago").val("");
      $("#numeropago").val("");
      $("#fechapago").val("");
      $("#montopago").val("");
      $("#comparamonto").html("");
       $("#precio").html("");
}

var limpiarMatriculaAgain = function ()
{
        $("#alumno").val("");
        $("#tipoalumno").val("");
        $("#observacion").val("");
        $("#preciomarcado").val("")
        $("#deuda").val("");
         $("#tipopago").val("");
        $("#numeropago").val("");
        $("#fechapago").val("");
        $("#montopago").val("");
        $("#comparamonto").html("");
        $("#precio").html("");
}

var ocultarCorporativo = function()
{
    $("#coorporativo").slideUp("slow");
}





