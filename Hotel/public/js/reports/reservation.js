$(document).ready(function(){
    
    
    $("#mostrartabla").on( "click", function() {
        $tipo=document.getElementById("tipo").value;
    $date_start=document.getElementById("date_start").value;
    $date_end=document.getElementById("date_end").value;
    alert("aqui funciona");
    if(!tipo=="" || !date_start=="" ||!date_end=="" ){

    $('#datatable1').show();  

    }
  });
});

