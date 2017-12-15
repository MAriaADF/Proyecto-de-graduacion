@extends('layouts.index')
@section('content')

  <script src="/Hotel/public/js/jquery-2.1.0.min.js"></script>
   <script src="/Hotel/public/js/reservation/date.js"></script>
  <script src="/Hotel/public/js/reservation/reservation.js"></script>
    <script src="/Hotel/public/js/reservation/close.js"></script>
    <script src="/Hotel/public/js/reservation/open.js"></script>
    <script src="/Hotel/public/js/reservation/open2.js"></script>
    <script src="/Hotel/public/js/reservation/confimar.js"></script>
  <script language="javascript" type="text/javascript" src="/Hotel/public/js/reservation/id.js"></script>

<div class="container">
  <form method="post" action="{{url('editOnline1', [ $reservation->id, $person->id ])}}" class="form-horizontal"  name="f1">
    <div class="col-md-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Datos Reserva </h2>
              <input name="reservation_num" id="reservation_num" value="{{$reservation->reservation_num}}" style="display: none;">
              <ul class="nav navbar-right panel_toolbox">
              <li class="dropdown">
                 <h5>Número reserva {{$reservation->reservation_num}}</h5>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="form-group row">
                {{csrf_field()}}
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Entrada <span class="required">*</span>
                      </label>
                        <div class="control-group" id="date_in" >
                          <div class="controls">
                            <div class="input-group date">
                           <input type="text" class="form-control" name="value_from_start_date"  id="date_check_in" value="{{$reservation->date_check_in}}" readonly="readonly" />
                             </div>
                          </div>
                     </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Salida <span class="required">*</span></label>
                  <div class="control-group" id="date_out">
                    <div class="controls">
                      <div class="input-group date">
                        <input type="text" class="form-control" name="value_from_end_date"  value="{{$reservation->date_check_out}}" id="date_check_out" readonly="readonly"  />
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Datos Cliente</h2>
              <ul class="nav navbar-right panel_toolbox">
              <li class="dropdown">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="form-group row">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input class="date-picker form-control col-md-7 col-xs-12" value="{{$person->name}}" name="name" id="name" required="required" type="text"  readonly="readonly" >
                      </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">1° Apellido <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input class="date-picker form-control col-md-7 col-xs-12" value="{{$person->last_name_1}}" name="last_name_1"  required="required" type="text" readonly="readonly" >
                  </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">2° Apellido </label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12" value="{{$person->last_name_2}}" name="last_name_2" type="text" readonly="readonly"  >
                 </div>
              </div>
              <div class="form-group row">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono <span class="required">*</span></label>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input class="date-picker form-control col-md-7 col-xs-12" value="{{$person->phone}}" name="phone" required="required" type="text" readonly="readonly" >
                  </div> 
              </div>
              <div class="form-group row">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="email" id="email" class="form-control" value="{{$person->email}}" name="email" data-parsley-trigger="change" readonly="readonly" >
                </div>
              </div>
            </div>
            </div>
        </div>
 @foreach($room as $post)
 <div >
        <div class="x_panel">
          <input name="canti" id="canti" value="{{$pax}}" style="display: none;">
          <input id="id{{$post->nfila}}" name="id{{$post->nfila}}"  readonly="readonly" value="{{$post->id}}" type="text" style="display: none;"/>
                  <div class="x_title">
                    <h2> Habitación {{$post->nfila}}</h2>
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

                      <div class="form-group row" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pax </label>
                         <div class="col-md-3 col-sm-9 col-xs-12 col-md-offset-0">
                           
                          <select class="form-control" name="pax{{$post->nfila}}" id="pax{{$post->nfila}}" required disabled >
                                <option value='{{$post->pax_num}}' selected>{{$post->pax_num}}</option>
                              </select>
                        </div>
                      </div>
                      <div class="form-group row" >
                        <label class="control-label col-md-2 col-sm-9 col-xs-6 col-md-offset-2">Total </label>
                         <div class="col-md-3 col-sm-3 col-xs-0 col-md-offset-0">
                          <input class="form-control" name="total{{$post->nfila}}" id="total{{$post->nfila}}" readonly="readonly" value="{{$post->price}}" type="text"/>
                        </div>
                      </div>
                      <div class="form-group row" >
                        <div class="col-md-3 col-sm-9 col-xs-12 col-md-offset-4">
                          <input type='button' name='next' class="btn btn-success" value='Asignar habitación' id="mostrar{{$post->nfila}}"  /> 
                        </div>
                      </div>
                      <div class="form-group row"  id="{{$post->nfila}}" style="display: none;" >
                        <label class="control-label col-md-9 col-sm-3 col-xs-12">Habitacion</label>
                         <div class="col-md-3 col-sm-9 col-xs-12 col-md-offset-0">
                          <select class="form-control" name="room{{$post->nfila}}" id="room{{$post->nfila}}" class="productname"  >
                            </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      </div>
    </div>
    @endforeach


      <div class="form-group row">
        <div  class="col-md-9 col-sm-9 col-xs-12 col-md-offset-9">
          <input type="text" class="form-control has-feedback-left" id="cancelar" name="cancelar"  placeholder="Nombre" style="display: none;">
            <input  type="submit" value="confimar" class="btn btn-primary">
               <input type="submit" onclick="activar();" value="Cancelar" class="btn btn-round btn btn-success">
            <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-primary">Cerrar</a>


        </div>
      </div>
  </form>
</div>
<script type="text/javascript">
      function activar()
      {
        document.f1.cancelar.value = "cancelar";
      }
    </script>
   
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js'></script>
<script  src="/Hotel/public/daterangepicker/js/indexEdit.js"></script>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css'>
</body>
    @endsection

