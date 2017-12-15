
$(function(){
	$("#pax").on('change', onSelectPax);
});
 

function onSelectPax(){
	var day=document.getElementById("day").value;
	var date_check_in=document.getElementById("date_check_in").value;
    var date_check_out=document.getElementById("date_check_out").value;
	var pax = $(this).val();
	if(!pax==""){
		$('#room').removeAttr('disabled');
		$.get("http://localhost/Hotel/public/proyecto/"+date_check_in+"/"+ date_check_out+"/"+pax, function(response,date_check_in, date_check_in, pax){
		$("#room").empty();
		response.forEach(element => {
			$("#room").append('<option value=' +element.id+'> '+element.number+' </option>');
			
		});
	});

	$.get('http://localhost/Hotel/public/room/'+pax, function(response){
    response.forEach(element => {
    	console.log(element.price);
      var a = day * element.price;
      document.f1.total.value = a;

      document.f1.suma.value = a;
	    });
	  });

	}
	
}
