$(document).ready(function()
{
    ocultarCuadro1();
    ocultarCuadro2();
    ocultarCuadro3();
    
});

var ocultarCuadro1 = function()
{
   $("#cuadro2").slideUp("slow"); 
}

var ocultarCuadro2 = function()
{
    $("#cuadro4").slideUp("slow");
}

var ocultarCuadro3 = function()
{
    $("#cuadro6").slideUp("slow");
}
