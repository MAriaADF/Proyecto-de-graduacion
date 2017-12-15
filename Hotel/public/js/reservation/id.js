$(function(){
	$("#combito").on('change', onSelectHabitation);
});
 
function onSelectHabitation(){

	$('#2').hide();
	$('#1').show();
	$('#3').show();
	var combito = $(this).val();

	if(combito=="2"){
		$('#2').show();
	}
}
    