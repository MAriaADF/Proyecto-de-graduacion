
  function show_date($id){

    //alert($id);
    $.get('http://localhost/Hotel/public/create/'+$id, function(response){
    response.forEach(element => {
      document.f1.id.value = element.id;
      document.f1.name.value = element.name + " " + element.last_name_1 + " " +element.last_name_2;
      });
    });

  }