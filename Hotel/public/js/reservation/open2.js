$(document).ready(function(){
    
    
    $("#mostrar2").on( "click", function() {
    	$('#mostrar2').hide();
    	 $('#2').show();
    	 var date_check_in=document.getElementById("date_check_in").value;
    var date_check_out=document.getElementById("date_check_out").value;
	var pax = document.getElementById("pax2").value;
	if(!pax==""){
		$.get("http://localhost/Hotel/public/proyecto/"+date_check_in+"/"+ date_check_out+"/"+pax, function(response,date_check_in, date_check_in, pax){
		$("#room2").empty();
		response.forEach(element => {
			$("#room2").append('<option value=' +element.id+'> '+element.number+' </option>');
			
		});
    });
	}
  });
});

 