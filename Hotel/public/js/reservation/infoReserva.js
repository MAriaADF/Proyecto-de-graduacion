
  $(document).ready(function(){
    
    
    $("#mostrar").on( "click", function() {
      var date_check_in=document.getElementById("date_check_in").value;
    var date_check_out=document.getElementById("date_check_out").value;
    var name=document.getElementById("name").value;
    var last_name_1=document.getElementById("last_name_1").value;
    var last_name_2=document.getElementById("last_name_2").value;
    var email=document.getElementById("email").value;
    var pax=document.getElementById("pax").value;
    var total=document.getElementById("total").value;
    var pax2=document.getElementById("pax2").value;
    var total2=document.getElementById("total2").value;
    document.f1.full_name.value=" "+name+" "+last_name_1 +" "+last_name_2;
    document.f1.email2.value=" "+ email;

        if(!pax2==""){
        $('#element').show();
         $('#elemento').show();  
          document.f1.room1.value=" "+ pax;
          document.f1.price1.value=" "+ total;
              if(pax2=="1" ){
                document.f1.room2.value=" "+ pax2+"persona";
              }else{
                document.f1.room2.value=" "+ pax2+" personas";
              }
                document.f1.price2.value=" "+ total2;
                var suma=parseInt(total)+parseInt(total2);
                document.f1.sum.value=" " + suma;
       }else{

        if(pax=="1" ){
          document.f1.room1.value=" "+ pax+"persona";
        }else{
          document.f1.room1.value=" "+ pax+" personas";
        }
        document.f1.price1.value=" "+ total;
        document.f1.sum.value=" "+ total;
      }
     });
  });
    