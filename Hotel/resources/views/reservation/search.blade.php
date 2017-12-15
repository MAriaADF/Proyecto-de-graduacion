@extends('layouts.index')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
   <link href="/hotel/public/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
   <script src="/hotel/public/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script src="/Hotel/public/js/reports/reservation.js"></script>
   <script src="/Hotel/public/js/reservation/select_tip.js"></script>
   <script src="/hotel/public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
   <script src="/hotel/public/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script><script src="/Hotel/public/js/alert/alert_time.js"></script>
 <link rel="stylesheet" href="/hotel/public/plugins/datatables/dataTables.bootstrap.css">
  <div class="row">

    <div class="modal fade bs-pago-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h2><i class="fa fa-user"></i> Detalle del pago</h2>
                        </div>
                        <div class="modal-body">
                     <br>
                    <div class="box-body">
                        <form name="f2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('/pago')}}">
                  <div class="form-group">
                    {{csrf_field()}}
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" id="id_reser" maxlength="9" name="id_reser" style="display: none;" >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Número de reserva</label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input  class=" form-control col-md-7 col-xs-12"  readonly required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" id="reservation_num"  maxlength="6" name="reservation_num"/>
                          <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                         <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Total </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input  class=" form-control col-md-7 col-xs-12"  readonly required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" id="sum"  maxlength="6" name="sum"/>
                          <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      </div>
                    <div class="modal-footer">
                          <button type="submit" class="btn btn-round btn btn-success">Guardar</button>
                          <button type="button" class=" btn btn-round btn btn-success" data-dismiss="modal">Cerrar</button> 
                        </div>
                    </form>
                  </div>
                        </div>
                      </div>
                    </div>
                  </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-file-text"></i> Buscar Reservas </h2>
                      <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('consult')}}" name="f1">
                      <br>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      {{csrf_field()}}
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Buscar reservar por:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="reserver"  class="form-control " id="reserver"  required>
                           <option value='' selected>Selecciona...</option>
                            <option value="0">  Cliente y rango de fecha </option>
                            <option value="1">  Número de reserva </option>
                            <option value="2">  Rango de fechas </option>
                          </select>
                        </div>
                      </div>
                    <div class="x_content" >
                    <br />
                    <div id="2" style="display: none;">
                      <div class="form-group" >      
                       <button type="button"  class="btn btn-round btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Cliente</button>   
                    <div class="col-md-5 col-sm-10 col-xs-13">
                    <input type="text" readonly="readonly" class="form-control has-feedback-left" id="name" name="name" value="" required>
                    <input type="text"  style="display: none;" id="id" name="id" >
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                      </div>
                      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span>
                          </button>
                          <h2><i class="fa fa-user"></i> Buscar Cliente</h2>
                        </div>
                        <div class="modal-body">
                     <br>
                      <div class="box-body">
                 <table id="" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th style=text-align:center >Nombre</th>
                          <th style=text-align:center >Teléfono</th>
                          <th style=text-align:center >Correo</th>
                          <th style=text-align:center ></th>
                        </tr>
                      </thead>
                      <tbody> 
                        @foreach($person as $post)
                        <tr>
                          <td style=text-align:center>{{$post->name}} {{$post->last_name_1}} {{$post->last_name_2}}</td>
                          <td style=text-align:center>{{$post->phone}}</td>  
                          <td style=text-align:center>{{$post->email}}</td>
                          <td style=text-align:center>
                          <button  onclick="show_date({{$post['id']}});" type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Asignar</button></td>
                         </tr>    
                         @endforeach            
                      </tbody>
                    </table>
                  </div>
                     </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="1" style="display: none;">
                      <div class="col-md-3" class="form-group">                        
                        <div class="col-md-13 xdisplay_inputx form-group has-feedback">
                         <div class="input-group date">
                          <input type="text" id="date_start" name="date_start" value="" class="form-control" required><span class="input-group-addon" ><i  required ></i></span>
                           <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                              </div>
                            </div>
                         </div>
                   <div class="col-md-3">                        
                        <div class="col-md-13 xdisplay_inputx form-group has-feedback">
                         <div class="input-group date">
                          <input type="text" id="date_end" name="date_end" value="" class="form-control" required><span class="input-group-addon"><i  required></i></span>
                           <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                              </div>
                            </div>
                          </div>
                         </div>
                         <div class="col-md-3" class="form-group" id="3" style="display: none;">                        
                        <div class="col-md-13 xdisplay_inputx form-group has-feedback">
                          <input type="text" id="reservation_num"  name="reservation_num" class="form-control" required>
                            </div>
                         </div>

                 <div class="col-md-3" id="4" style="display: none;" >
                 <button type="submit" class="btn btn-success">Generar</button>
                 </div>
               </div>    
                     <br> 
                   <div class="box-body">
                 <table id="datatable" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th style=text-align:center >Reserva</th>
                          <th style=text-align:center >Nombre</th>
                          <th style=text-align:center >Teléfono</th>
                          <th style=text-align:center >Fecha de entrada</th>
                          <th style=text-align:center >Fecha de salida</th>
                          <th style=text-align:center >Pago</th>
                          <th style=text-align:center >Estado</th>
                          <th style=text-align:center></th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($reservation as $post)
                        <tr>
                          <th style=text-align:center>{{$post->reservation_num}}</th>
                          <td style=text-align:center>{{$post->name}}</td>
                          <td style=text-align:center>{{$post->phone}}</td> 
                          <td style=text-align:center>{{$post->date_check_in}}</td>
                          <td style=text-align:center>{{$post->date_check_out}}</td> 
                          <td style=text-align:center>
                            @if ( ($post->state) != 'Pendiente' and ($post->state) != 'Cancelada'   and  ($post->id_inc_exp) == 0)
                             <button type="button"  class="btn btn-round btn btn-default" onclick="show_data_price({{$post->reservation_num}}, {{$post->id_reservation}});" data-toggle="modal" data-target=".bs-pago-modal-sm"><i class="fa fa-money"></i></button>
                            @else
                              {{$post->id_inc_exp}}
                             @endif 
                        </td>
                          <td style=text-align:center>{{$post->state}}</td>
                           <td  >
                           <a href="{{url('/see', [$post->id_person, $post->id_reservation])}}" class='btn btn-round btn btn-dark btn-xs' ><i class="fa fa-search"></i> Ver</a>
                             <a href="{{url('/history', [$post->id_person, $post->id_reservation])}}" class='btn btn-round btn btn-success btn-xs' ><i class="fa fa-history"></i> Historial</a>
                            @if ( ($post->state) == 'Confirmada'    and  ($post->id_inc_exp) == 0)
                            <a href="{{url('/edit', [$post->id_person, $post->id_reservation])}}" class='btn btn-round btn btn-primary btn-xs'><i class="fa fa-pencil"></i> Editar</a>
                             @endif  
                            @if ( ($post->state) == 'Entrada' )
                            <a href="{{url('/date_check_out', [$post->id_reservation])}}" class='btn btn-round btn btn-warning btn-xs'><i class="fa fa-check"></i> Check out</a>
                             @endif 
                           </td>

                         </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                    </form>
                  </div>
                </div>
                <br>
                <br>
                <div class="form-group row">
                    <div  class="col-md-offset-11">
                        <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-round btn btn-primary">Cerrar</a>
                    </div>
                  </div>
                  <br>
              </div>

  <script type="text/javascript">

    $('.date').datepicker({  

       format: 'yyyy/mm/dd'
      
     });  

</script>    

<script type="text/javascript">
$('#sandbox-container .input-group.date').datepicker({
    format: "yyyy/mm/dd",
    todayBtn: "linked",
    language: "es",
    orientation: "auto left"
});
</script> 
<script src="/Hotel/public/js/reservation/client.js"></script>

 <script >
    
  function show_data_price( $reservation_num, $id){
    
    document.f2.id_reser.value = $id; 
    document.f2.reservation_num.value = $reservation_num; 
    
    $.get('http://localhost/Hotel/public/payment/'+$id, function(response){
    response.forEach(element => {
      var a = element.total;
      document.f2.sum.value = a; 
      });
    });
    
   
  }

  </script>


<script >
  
  $(function(){
  $("#reserver").on('change', onSelectHabitation);
});
 
function onSelectHabitation(){

  var reserver = $(this).val();

  if(reserver=="0"){
    document.f1.reservation_num.value = "522";
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
    
</script>

    @endsection

