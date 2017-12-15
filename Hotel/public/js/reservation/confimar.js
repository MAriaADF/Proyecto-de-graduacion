$(document).ready(function(){
    
    
    $("#confirmar").on( "click", function() {
   	$canti=document.getElementById("canti").value;
   	$room1=document.getElementById("room1").value;
   	$id1=document.getElementById("id1").value;
   	$id2='0';

	 if($canti=="1"){
	 	if(!$room1==""){
	 		
	 	}else{
	 	alert("falta assignar una habitacion");	
	 	}
	 }else{
	 	$room2=document.getElementById("room2").value;
	 	if($room2=="" ||$room1==""){
	 		alert("alta assignar una habitacion");
	 	}else{
	 		if($room2===$room1){
	 			alert("las no puede assignar las mismas habitaciones");
	 		}else{
	 			$id2 =document.getElementById("id2").value;
	 			alert($id2);
	 		}
	 		
	 	}
	 }

     });
  });
 