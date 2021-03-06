@extends('layouts.index')
@section('content')

  <script src="/Hotel/public/js/jquery-2.1.0.min.js"></script>
   <script src="/Hotel/public/js/reservation/date.js"></script>
  <script src="/Hotel/public/js/reservation/reservation.js"></script>
    <script src="/Hotel/public/js/reservation/info.js"></script>
    <script src="/Hotel/public/js/reservation/close.js"></script>
  <script language="javascript" type="text/javascript" src="/Hotel/public/js/reservation/id.js"></script>

<div class="container">
  <form   method="post" action="{{url('/storeRoom', [$person->id, $reservation->id])}}" class="form-horizontal"  name="f1">
    <div class="col-md-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
            <h2><i class="fa fa-file-text"></i> Datos Reserva </h2>
              <ul class="nav navbar-right panel_toolbox">
              <li class="dropdown">
              <h2>Reserva {{$reservation->reservation_num}}</h2>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                {{csrf_field()}}
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Entrada <span class="required"></span></label>  
                      <div class="form-group" class="control-group" id="date_in" >
                        <div class="col-md-5 col-sm-5 col-xs-11"  class="input-group date">
                          <input type="text" class="form-control has-feedback-left" name="value_from_start_date"  id="date_check_in" value="{{$reservation->date_check_in}}" readonly="readonly" />
                          <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
              

    <label class="control-label col-md-3 col-sm-3 col-xs-12">Salida <span class="required"></span></label>  
                      <div class="form-group" class="control-group" id="date_in" >
                        <div class="col-md-5 col-sm-5 col-xs-11"  class="input-group date">
                          <input type="text" class="form-control has-feedback-left" name="value_from_end_date"  value="{{$reservation->date_check_out}}" id="date_check_out" readonly="readonly"  />
                          <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

           
                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones</label>
                        <div class="col-md-9 col-sm-10 col-xs-12">
                          <div class="well">
                            <div  class="demo demo-auto inl-bl colorpicker-element" data-container="#demo_cont" data-color="rgba(150,216,62,0.55)" data-inline="true">{{$reservation->observation}}</div>   
                          </div>
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
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre</label>
              <div class="form-group row">
             <div class="col-md-7 col-sm-5 col-xs-13">
                         <input class="form-control has-feedback-left" value="{{$person->name}}" name="name" id="name"  readonly="readonly" >
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
              </div>
               <label class="control-label col-md-3 col-sm-3 col-xs-12">1° Apellido</label>
              <div class="form-group row">
             <div class="col-md-7 col-sm-5 col-xs-13">
                  <input class="form-control has-feedback-left" value="{{$person->last_name_1}}" name="name" id="name"  readonly="readonly" >
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
              </div>
             
              <label class="control-label col-md-3 col-sm-3 col-xs-12">2° Apellido</label>
              <div class="form-group row">
             <div class="col-md-7 col-sm-5 col-xs-13">
                  <input class="form-control has-feedback-left" value="{{$person->last_name_2}}" name="name" id="name"  readonly="readonly" >
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
               </div>
                </div>
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono</label>
              <div class="form-group row">
             <div class="col-md-7 col-sm-5 col-xs-13">
                  <input class="form-control has-feedback-left" value="{{$person->phone}}" name="name" id="name"  readonly="readonly" >
                          <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>    
              </div> 
          
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo</label>
              <div class="form-group row">
             <div class="col-md-7 col-sm-5 col-xs-13">
                  <input class="form-control has-feedback-left" value="{{$person->email}}" name="name" id="name"  readonly="readonly" >
                          <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>    
              </div> 
            </div>
            </div>
        </div>
<div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                  <div class="x_title">
                  <h2><i class="fa fa-bed"></i> Habitaciones</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                   <div class="x_content"> 
                     <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('provision')}}">
                     <br>
                         {{csrf_field()}}
                       <div class="ln_solid"></div>
                       <div class="table table-striped table-bordered bulk_action">
                 <table  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style=text-align:center >Cantidad de personas</th>
                          <th style=text-align:center >Habitación</th>
                          <th style=text-align:center >Precio</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($room as $post)
                        <tr>
                          <th style=text-align:center>{{$post->pax_num}}</th>
                          <td style=text-align:center>{{$post->number}}</td>
                          <td style=text-align:center>₡ {{$post->price}}</td> 
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                    </form>
                  </div>
                </div>
                </div>
                     <div class="x_panel">
                  <div class="x_title">
                  <h2><i class="fa fa-money"></i> Total de Reserva</h2>
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

      <div class="form-group row">
        <div  class=" col-md-offset-11">
           <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-round btn btn-primary">Cerrar</a>
        </div>
      </div>
  </form>
</div>

   
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js'></script>
<script  src="/Hotel/public/daterangepicker/js/indexEdit.js"></script>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css'>
</body>
    @endsection

