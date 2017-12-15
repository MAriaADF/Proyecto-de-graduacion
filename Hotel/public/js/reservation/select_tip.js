 $(function(){
  $("#reserver").on('change', onSelectHabitation);
});
 
function onSelectHabitation(){

  var reserver = $(this).val();
$a ="A";
  if(reserver=="0"){
    document.2.reservation_num.value = $a ;
    $('#2').show();
    $('#3').hide(); 
    $('#1').show();
    $('#4').show();
  }else if(reserver=="1"){

    document.f1.name.value = "jsa";
    document.f1.date_start.value = "0000-10-12";
    document.f1.date_end.value = "0000-10-12";
    $('#2').hide();
    $('#3').show();
    $('#1').hide();
    $('#4').show();
  }else if(reserver=="2"){

    document.f1.name.value = "jsa";
    document.f1.reservation_num.value = "541";
    $('#2').hide();
    $('#3').hide();
    $('#1').show();
    $('#4').show();
  }
}