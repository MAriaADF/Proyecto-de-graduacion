@extends('layouts.index')
@section('content')
 
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="/Hotel/public/js/jquery-2.1.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
   <script src="/Hotel/public/js/reservation/date.js"></script>
  <script src="/Hotel/public/js/reservation/reservation.js"></script>
  <script src="/Hotel/public/js/reservation/reservation2.js"></script>
  <script language="javascript" type="text/javascript" src="/Hotel/public/js/reservation/id.js"></script>

<div class="container">
  <form  method="post" action="{{url('reservation')}}" class="form-horizontal" name="f1" novalidate>
   {{csrf_field()}}
    @if (session('status'))     
      
                @endif
    <div class="col-md-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
            <h2><i class="fa fa-file-text"></i> Datos Reserva </h2>
              <ul class="nav navbar-right panel_toolbox">
              <li class="dropdown">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">     
                       <div class="form-group" class="control-group" id="date_in" >
                        <div class="col-md-11 col-sm-10 col-xs-13"  class="input-group date">
                           <input type="phone" class="form-control has-feedback-left" name="value_from_start_date" data-datepicker="separateRange" id="date_check_in" placeholder="Entrada">
                          <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                       <div class="form-group" class="control-group" id="date_out" >
                        <div class="col-md-11 col-sm-10 col-xs-13"  class="input-group date">
                           <input type="phone" class="form-control has-feedback-left" name="value_from_end_date" data-datepicker="separateRange"  id="date_check_out" placeholder="Salida">
                          <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>        
            
                     <div class="form-group">
                        <div class="col-md-11 col-sm-10 col-xs-13">
                            <input type="text" class="form-control has-feedback-left" name="day" id="day" readonly="readonly" type="text"   placeholder="Dias">
                          <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

              <div class="form-group row">
            
                  <div class="col-md-11 col-sm-10 col-xs-12">
                    <select class="form-control has-feedback-left" id="combito"  disabled required>
                    <option value='' selected>Seleccione la cantidad de habitaciones</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    </select>
                    <span class="fa fa-bed form-control-feedback left" aria-hidden="true"></span>
                  </div> 
              </div>
            </div>

            </div>

        </div>

        <div class="col-md-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
               <h2><i class="fa fa-user"></i> Datos Cliente </h2>
              <ul class="nav navbar-right panel_toolbox">
              <li class="dropdown">

 <button type="button"  class="btn btn-round btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-user-plus"></i></button>

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h2><i class="fa fa-user"></i> Buscar Cliente</h2>
                        </div>
                        <div class="modal-body">
                     <br>
                    <div class="box-body">
                 <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style=text-align:center >Nombre</th>
                          <th style=text-align:center >Teléfono</th>
                          <th style=text-align:center >Correo</th>
                          <th style=text-align:center> </th>
                        </tr>
                      </thead>
                      <tbody> 
                        @foreach($person as $post)
                        <tr>
                          <td style=text-align:center>{{$post['name']}} {{$post['last_name_1']}}</td>
                          <td style=text-align:center>{{$post['phone']}}</td>  
                          <td style=text-align:center>{{$post['email']}}</td>
                          <td style=text-align:center>
                          <button  onclick="show_date({{$post['id']}});" type="button" data-dismiss="modal" aria-label="Close" class=" btn btn-round btn btn-primary"><span class="fa fa-reply-all"></span></button>
                          </td>

                         </tr> 
                          @endforeach              
                      </tbody>
                    </table>
                  </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              </li>
              
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="form-group">
                       
                        <div class="col-md-11 col-sm-10 col-xs-13">
                           <input type="text" class="form-control has-feedback-left" id="name" name="name" required="required" placeholder="Nombre">
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-11 col-sm-10 col-xs-13">
                           <input type="text" class="form-control has-feedback-left" id="last_name_1" name="last_name_1" required="required" placeholder="1° Apellido">
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                         <div class="form-group">
                        <div class="col-md-11 col-sm-10 col-xs-13">
                            <input type="text" class="form-control has-feedback-left" id="last_name_2" name="last_name_2"  placeholder="2° Apellido">
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-11 col-sm-10 col-xs-13">
                           <input type="phone" class="form-control has-feedback-left" id="phone" name="phone"  placeholder="Teléfono"  onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" >
                          <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-11 col-sm-10 col-xs-13">
                         <input type="email" class="form-control has-feedback-left" id="email"  name="email" data-parsley-trigger="change" required  placeholder="Correo">
                           <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
            </div>
            </div>
        </div>

      <div id="1" style="display: none;">
        <div class="x_panel">
                  <div class="x_title">
                  <h2><i class="fa fa-bed"></i> Habitación 1 </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                   <div class="x_content"> 
                    <br>
                    <div class="control-group">
                    <div class="controls form-inline">
                      <div class="form-group row">
                       <div class="form-group col-md-offset-" class="contenido">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pax<span ></span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="pax" id="pax" required>
                                <option value='' selected>Selecciona...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                              </select>
                          </div> 
                          </div>
                      </div>
                      <div class="form-group row" >
                        <div class="form-group col-md-offset-" class="contenido">
                          <label class="control-label col-md-5">Habitación<span ></span></label>
                          <div class="col-md-1 ">
                          <select class="form-control" name="room" id="room" class="productname" disabled  required>
                             
                            </select>
                        </div> 
                        </div> 
                      </div>
                      <div class="form-group row" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total ₡<span ></span>
                        </label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="date-picker form-control col-md-7 col-xs-12" name="total" id="total" readonly="readonly" type="text" >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      </div>
    </div>
    <div id="2" style="display: none;">
        <div class="x_panel">
                  <div class="x_title">
               <h2><i class="fa fa-bed"></i> Habitación 2 </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                   <div class="x_content"> 
                    <br>
                    <div class="control-group">
                    <div class="controls form-inline">
                      <div class="form-group row">
                       <div class="form-group col-md-offset-" class="contenido">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pax<span ></span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="pax_a" id="pax_a" required>
                                <option value='' selected>Selecciona...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                              </select>
                          </div> 
                          </div>
                      </div>
                      <div class="form-group row" >
                        <div class="form-group col-md-offset-" class="contenido">
                          <label class="control-label col-md-5">Habitación<span ></span></label>
                          <div class="col-md-1 ">
                          <select class="form-control" name="room_a" id="room_a" class="productname" disabled  required>
                             
                            </select>
                        </div> 
                        </div> 
                      </div>
                      <div class="form-group row" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total ₡ <span ></span>
                        </label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="date-picker form-control col-md-7 col-xs-12" name="total_a" id="total_a" readonly="readonly" type="text" >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      </div>
    </div>
    <div id="3" style="display: none;" >       
           <div class="x_panel">
                  <div class="x_title">
                  <h2><i class="fa fa-money"></i> Total a Cancelar </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                   <div class="x_content"> 
                    <br>
                    <div class="form-group row" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Total ₡<span ></span>
                        </label>
                         <div class="col-md-5 col-sm-5 col-xs-5">
                          <input class="date-picker form-control col-md-3 col-xs-6" name="suma" id="suma" readonly="readonly" type="text" >
                        </div>
                      </div>

                </div>
              </div>
      </div>
       </div>

     <div class="col-md-12 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                  <h2><i class="fa fa-comments-o"></i> Observaciones </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                   <div class="x_content"> 
                    <br>
                    <div class="control-group">
                      <div class="form-group">
                          <input type="text"  id="observation"  name="observation" required="required" class="form-control col-md-12 col-xs-12">
                    </div>
                  </div>
                </div>
              </div>
      </div>   
    </div>
      
      <div  class=" col-md-offset-9">
        <input type="text" class="form-control has-feedback-left" id="payment" name="payment"  placeholder="Nombre" style="display: none;">
         <button type="submit"  value="Confirmar" class="btn btn-round btn btn-success"> Confirmar</button> 
         <button type="submit" onclick="activar();" value="Confirmar y pagar" class="btn btn-round btn btn-warning" > Pagar</button> 
        <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-round btn btn-primary">Cerrar</a>
      </div>
  </form>              
  </div>
</div>

<script type="text/javascript">
$('#sandbox-container .input-group.date').datepicker({
    format: 'yyyy-mm-dd',
    todayBtn: "linked",
    language: "es",
    orientation: "auto left"
});
</script> 

    <script type="text/javascript">
      function activar()
      {
        var campo1 = $('#dsingle_cal3').val();
        if((campo1!=null)&&(campo1!=''))
        {
          $('#date_check_in');
        }
      }
    </script>

    </script> 

    <script type="text/javascript">
      function activar()
      {
        document.f1.payment.value = "payment";
      }
    </script>
<script src="/Hotel/public/js/reservation/show_date.js"></script>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js'></script>
<script  src="/Hotel/public/daterangepicker/js/index.js"></script>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css'>
</body>
    @endsection

