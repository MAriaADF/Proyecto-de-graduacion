$(document).ready(function(){
    
    
    $("#mostrar1").on( "click", function() {
    	$('#mostrar1').hide();
    	 $('#1').show();
    	 var date_check_in=document.getElementById("date_check_in").value;
    var date_check_out=document.getElementById("date_check_out").value;
	var pax = document.getElementById("pax1").value;
	if(!pax==""){
		$.get("http://localhost/Hotel/public/proyecto/"+date_check_in+"/"+ date_check_out+"/"+pax, function(response,date_check_in, date_check_in, pax){
		$("#room1").empty();
		response.forEach(element => {
			$("#room1").append('<option value=' +element.id+'> '+element.number+' </option>');
			
		});
    });
	}
  });
});

 