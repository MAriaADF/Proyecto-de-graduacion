
  function show_date($id){

    //alert($id);
    $.get('http://localhost/Hotel/public/create/'+$id, function(response){
    response.forEach(element => {
      var a =  element.email;
      document.f1.name.value = element.name;
      document.f1.last_name_1.value = element.last_name_1;
       document.f1.last_name_2.value = element.last_name_2;
      document.f1.phone.value = element.phone;
      document.f1.email.value = element.email;

      document.getElementById("name").readOnly = true;
      document.getElementById("last_name_1").readOnly = true;
      document.getElementById("last_name_2").readOnly = true;
      document.getElementById("phone").readOnly = true;
      document.getElementById("email").readOnly = true;
	    });
	  });

  }

 