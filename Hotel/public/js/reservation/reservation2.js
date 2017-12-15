
$(function(){
	$("#pax_a").on('change', onSelectPax2);
});
 

function onSelectPax2(){

	var total=document.getElementById("total").value;
	var day=document.getElementById("day").value;
	var date_check_in=document.getElementById("date_check_in").value;
    var date_check_out=document.getElementById("date_check_out").value;

	var pax2= $(this).val();
	if(!pax2==""){
		$('#room_a').removeAttr('disabled');
		$.get("http://localhost/Hotel/public/proyecto/"+date_check_in+"/"+ date_check_out+"/"+pax2, function(response,date_check_in, date_check_in, pax){
		$("#room_a").empty();
		response.forEach(element => {
			$("#room_a").append('<option value=' +element.id+'> '+element.number+' </option>');
			
		});
	});

	$.get('http://localhost/Hotel/public/room/'+pax2, function(response){
    response.forEach(element => {
      var a = day * element.price;
      document.f1.total_a.value = a;
      document.f1.suma.value = "";
	var sum = parseInt(total) + parseInt(a);
	document.f1.suma.value = sum; 
	    });
	  });
	
	}
	
}
