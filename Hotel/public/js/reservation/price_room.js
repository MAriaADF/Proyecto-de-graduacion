$(function(){
	$("#pax").on('change', onSelectPax);
});
 

function onSelectPax(){
	var day=document.getElementById("day").value;
	var date_check_in=document.getElementById("date_check_in").value;
    var date_check_out=document.getElementById("date_check_out").value;
	var pax = $(this).val();
	if(!pax==""){

	$.get('http://localhost/Hotel/public/room/'+pax, function(response){
    response.forEach(element => {
      var a = day * element.price;
      document.f1.total.value = a;
	    });
	  });

	}
}
