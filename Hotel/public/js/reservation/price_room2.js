
$(function(){
	$("#pax2").on('change', onSelectPax2);
});
 

function onSelectPax2(){
	var day=document.getElementById("day").value;
	var date_check_in=document.getElementById("date_check_in").value;
    var date_check_out=document.getElementById("date_check_out").value;
	var pax2 = $(this).val();
	if(!pax2==""){

	$.get('http://localhost/Hotel/public/room/'+pax2, function(response){
    response.forEach(element => {
      var a = day * element.price;
      document.f1.total2.value = a;
	    });
	  });

	}
}
