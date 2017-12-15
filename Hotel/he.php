<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
 
    <script>
    /**
   * Documentado en http://lwp-l.com/s2379
   */
  function isValidDate(year, month, day)
  {
    var dteDate;
    month=month-1;
    dteDate=new Date(year,month,day);
    return ((year==dteDate.getFullYear()) && (month==dteDate.getMonth()) && (day==dteDate.getDate()));
  }
 
  /**
   * Funcion para validar una fecha
   * Tiene que recibir:
   *  La fecha en formato español dd/mm/yyyy
   * Devuelve:
   *  true o false
   */
  function validate_fecha(fecha)
  {
    var patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
 
    if(fecha.search(patron)==0)
    {
      var values=fecha.split("-");
      if(isValidDate(values[0],values[1],values[2]))
      {
        return true;
      }
    }
    return false;
  }
 
    function calcularDias()
    {

    var date_check_in=document.getElementById("date_check_in").value;
    var date_check_out=document.getElementById("date_check_out").value;
    var resultado="";
          if(validate_fecha(date_check_in) && validate_fecha(date_check_out))
          {
            inicial=date_check_in.split("-");
            final=date_check_out.split("-");
            // obtenemos las fechas en milisegundos
            var dateStart=new Date(inicial[0],(inicial[1]-1),inicial[2]);
                  var dateEnd=new Date(final[0],(final[1]-1),final[2]);
                  if(dateStart<dateEnd)
                  {
              // la diferencia entre las dos fechas, la dividimos entre 86400 segundos
              // que tiene un dia, y posteriormente entre 1000 ya que estamos
              // trabajando con milisegundos.
              resultado="La diferencia es de "+(((dateEnd-dateStart)/86400)/1000)+" días";
            }else{
              resultado="La fecha inicial es posterior a la fecha final";
            }
          }
    document.getElementById("resultado").innerHTML=resultado;
  }
    </script>
 
</head>
 
<body>
 
<form>
  <p>Introduce la fecha inicial y final en formato español dd/mm/yyyy</p>
  <input type="text" name="date_check_in"  id="date_check_in" onblur="calcularDias();" >
  <input type="text" name="date_check_out"  id="date_check_out" onblur="calcularDias();" >
</form>
<div id="resultado"></div>
 
</body>
</html>