    var separator = ' - ', dateFormat = 'YYYY-MM-DD';
    var options = {
        autoUpdateInput: false,
        autoApply: true,
        locale: {
            format: dateFormat,
            separator: separator,
            applyLabel: '確認',
            cancelLabel: '取消'
        },
        minDate: moment().add(0, 'days'),
        maxDate: moment().add(90, 'days'),
        opens: "right"
    };


        $('[data-datepicker=separateRange]')
            .daterangepicker(options)
            .on('apply.daterangepicker' ,function(ev, picker) {
                var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
                var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;

                var mainName = this.name.replace('value_from_start_', '');
                if(boolEnd) {
                    mainName = this.name.replace('value_from_end_', '');
                    $(this).closest('form').find('[name=value_from_end_'+ mainName +']').blur();
                   
                }

                $(this).closest('form').find('[name=value_from_start_'+ mainName +']').val(picker.startDate.format(dateFormat));
                $(this).closest('form').find('[name=value_from_end_'+ mainName +']').val(picker.endDate.format(dateFormat));

                $(this).trigger('change').trigger('keyup');
                calcularDias();
            })
            .on('show.daterangepicker', function(ev, picker) {
                var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
                var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;
                var mainName = this.name.replace('value_from_start_', '');
                if(boolEnd) {
                    mainName = this.name.replace('value_from_end_', '');
                }

                var startDate = $(this).closest('form').find('[name=value_from_start_'+ mainName +']').val();
                var endDate = $(this).closest('form').find('[name=value_from_end_'+ mainName +']').val();
                

                $('[name=daterangepicker_start]').val(startDate).trigger('change').trigger('keyup');
                $('[name=daterangepicker_end]').val(endDate).trigger('change').trigger('keyup');

                
                if(boolEnd) {
                    $('[name=daterangepicker_end]').focus();
                }
            });
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
    document.getElementById("total").value="";
    var pax=document.getElementById("pax").value;
    var pax2=document.getElementById("pax2").value;
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
              resultado=(((dateEnd-dateStart)/86400)/1000);
               $('#combito').removeAttr('disabled');
               

            }else{
              resultado="La fecha inicial es posterior a la fecha final";
               
            }
          }
    document.f1.day.value=resultado;
             
       if(!pax==""){
                $.get('http://localhost/Hotel/public/room/'+pax, function(response){
                  response.forEach(element => {
                    var a = resultado * element.price;
                    document.f1.total.value = a;
                    });
                  });
              }

                if(!pax2==""){
                  $.get('http://localhost/Hotel/public/room/'+pax2, function(response){
                  response.forEach(element => {
                    var a = resultado * element.price;
                    document.f1.total2.value = a;
                    });
                  });
                }
  }