$(document).ready(function(){
    
    $('.tooltips-general').tooltip('hide');
    
    $('.mobile-menu-button').on('click', function(){
        var mobileMenu=$('.navbar-lateral');	
        if(mobileMenu.css('display')=='none'){
            mobileMenu.fadeIn(300);
        }else{
            mobileMenu.fadeOut(300);
        }
    });
    $('.dropdown-menu-button').on('click', function(){
        var dropMenu=$(this).next('ul');
        dropMenu.slideToggle('slow');
    });
    
    $('.exit-system-button').on('click', function(e){
        e.preventDefault();
        var LinkExitSystem=$(this).attr("data-href");
        swal({
            title: "¿Estás seguro?",
            text: "Quieres salir del sistema y cerrar la sesión actual",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5cb85c",
            confirmButtonText: "Si, salir",
            cancelButtonText: "No, cancelar",
            animation: "slide-from-top",
            closeOnConfirm: false 
        },function(){
            //window.location=LinkExitSystem;
            $.ajax({
                url:LinkExitSystem,
                type:'POST',
                data:{op:'logout'},
                success:function()
                {
                    $(location).attr('href','index.php');
                },
          fail: function(response)
          {
              console.log(response);
          }       
       }).done(function(){
          console.log("success"); 
       }).fail(function(){
           console.log("error");
       }).always(function(){
           console.log("complete");
       });
        //fin de la function AJAX
        });  
    ///fin del evento de boton
    });
    
    
    $('.search-book-button').click(function(e){
        e.preventDefault();
        var LinkSearchBook=$(this).attr("data-href");
        swal({
           title: "¿Qué libro estás buscando?",
           text: "Por favor escribe el nombre del libro",
           type: "input",   
           showCancelButton: true,
           closeOnConfirm: false,
           animation: "slide-from-top",
           cancelButtonText: "Cancelar",
           confirmButtonText: "Buscar",
           confirmButtonColor: "#3598D9",
           inputPlaceholder: "Escribe aquí el nombre de libro" }, 
      function(inputValue){
           if (inputValue === false) return false;  

           if (inputValue === "") {
               swal.showInputError("Debes escribir el nombre del libro");     
               return false;   
           } 
            window.location=LinkSearchBook+"?bookName="+inputValue;
       });
    });
    
       
   $(document).on('click','#btn-ayuda',function(e){
       e.preventDefault();
        $('#ModalAyuda').removeClass('modal-backdrop').modal("show");
        
    });
    
});
(function($){
    $(window).load(function(){
        $(".custom-scroll-containers").mCustomScrollbar({
            theme:"dark-thin",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons:{ enable: true }
        });
        //$("#ModalAyuda").insertAfter($('body'));
    });
})(jQuery);