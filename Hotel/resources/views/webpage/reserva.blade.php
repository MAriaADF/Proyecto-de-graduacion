@extends('webpage.index')
@section('content')
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <link href="/Hotel/public/assets/css/material-bootstrap-wizard.css" rel="stylesheet" />
<script src="/Hotel/public/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
  <script src="/Hotel/public/assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/Hotel/public/assets/js/jquery.bootstrap.js" type="text/javascript"></script>
  <script src="assets/js/material-bootstrap-wizard.js"></script>

  <script src="/Hotel/public/js/reservation/price_room2.js"></script>
  <script type="text/javascript" src="/Hotel/public/js/reservation/infoReserva.js"></script>

  <script src="assets/js/jquery.validate.min.js"></script>
  <script language="javascript" type="text/javascript" src="/Hotel/public/js/reservation/id.js"></script>
  <script src="/Hotel/public/js/reservation/price_room.js"></script>

  <link href="/Hotel/public/assets/css/demo.css" rel="stylesheet" />
  <div id="head" >
      <div class="line">
        <h1>Reserva ya</h1>
      </div>
    </div>
     <div class="container">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="blue" id="wizardProfile">
                        <form action="{{url('/storeResvation')}}" method="post" name="f1">
                          <div class="wizard-header">
                              <h3 class="wizard-title">
                                 Reservación
                              </h3>
                  <h5>Su reserva sera confirmada al correo proporcionado</h5>
                          </div>
                <div class="wizard-navigation">
                  <ul>
                                  <li><a href="#about" data-toggle="tab">Datos personales</a></li>
                                  <li><a href="#account" data-toggle="tab">Habitaciones</a></li>
                                  <li><a href="#address" data-toggle="tab">Detalles</a></li>
                              </ul>
                </div>
                   <div class="tab-content">
                    <div class="tab-pane" id="about">
                     <div class="row">
                      <h4 class="info-text">Ingrese los datos personales</h4>
                                   
                         <div class="col-sm-6">
                        <div class="input-group">
                          <span class="input-group-addon">
                          </span>
                          <div class="form-group label-floating">
                            <label class="control-label">Nombre </label>
                            <input name="lastname" id="name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">
                          </span>
                          <div class="form-group label-floating">
                            <label class="control-label">1° Apellido</label>
                            <input name="last_name_1" id="last_name_1" type="text" class="form-control" required>
                          </div>
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">
                          </span>
                          <div class="form-group label-floating">
                            <label class="control-label">2° Apellido</label>
                            <input name="last_name_2" id="last_name_2"type="text" class="form-control" >
                          </div>
                        </div>
                          </div>
                            <div class="col-sm-6">          
                        <div class="input-group">
                             <span class="input-group-addon">
                          </span>
                          <div class="form-group label-floating">
                            <label class="control-label">Correo</label>
                            <input name="email" id="email" type="email" class="form-control">
                             </div>          
                        </div>
                        <div class="input-group">
                             <span class="input-group-addon">
                          </span>
                          <div class="form-group label-floating">
                            <label class="control-label">Telefono</label>
                            <input name="phone" id="phone" type="text" class="form-control" required
                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" >
                             </div>          
                        </div> 
                           </div>            
                                  </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <h4 class="info-text">Seleccione las fechas</h4>
                        <div class="x_content">
              <div class="form-group row">
                {{csrf_field()}}
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Entrada <span class="required">*</span>
                      </label>
                        <div class="control-group" id="date_in" >
                          <div class="controls">
                            <div class="input-group date">
                           <input type="text" class="form-control" name="value_from_start_date" data-datepicker="separateRange" id="date_check_in"/><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                             </div>
                          </div>
                     </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Salida <span class="required">*</span></label>
                  <div class="control-group" id="date_out">
                    <div class="controls">
                      <div class="input-group date">
                        <input type="text" class="form-control" name="value_from_end_date" data-datepicker="separateRange"  id="date_check_out" /><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Dias <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                   <input class="date-picker form-control col-md-7 col-xs-12" name="day" id="day" readonly="readonly" type="text" >
                  </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Habitaciones<span class="required"></span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" id="combito"  disabled required>
                       <option value='' selected>Selecciona...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        </select>
                  </div> 
              </div>
            </div>
            <div id="1" style="display: none;">
                    <h3> Habitacion 1 </h3>
                      <div class="form-group row">
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
                      <div class="form-group row" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total <span ></span>
                        </label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="date-picker form-control col-md-7 col-xs-12" name="total" id="total" readonly="readonly" type="text"/>
                      </div>
                    </div>
                </div>

                 <div id="2" style="display: none;">
                    <h3> Habitacion 1 </h3>
                      <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pax<span ></span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="pax2" id="pax2" required>
                                <option value='' selected>Selecciona...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total <span ></span>
                        </label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="date-picker form-control col-md-7 col-xs-12" name="total2" id="total2" readonly="readonly" type="text"/>
                      </div>
                    </div>
                </div>
                                </div>

                                <div class="tab-pane" id="address">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Are you living in a nice area? </h4>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="input-group">
                                            <span class="input-group-addon">
                                            </span>
                                              <label>Nombre Completo: </label>
                                              <input type="text" name="full_name" id="full_name" readonly="readonly" style="border:none">
                                          </div>
                                          <div class="input-group">
                                            <span class="input-group-addon">
                                            </span>
                                              <label>Habitación 1:</label>
                                              <input name="room1" id="room1" type="text" readonly="readonly" type="text" style="border:none">
                                          </div>
                                          <div class="input-group" id="element" style="display: none;">
                                            <span class="input-group-addon">
                                            </span>
                                              <label>Habitación 2:</label>
                                              <input name="room2" id="room2" readonly="readonly" type="text" style="border:none">
                                          </div>
                                            </div>
                                              <div class="col-sm-6">          
                                          <div class="input-group">
                                               <span class="input-group-addon">
                                            </span>
                                              <label>Correo:</label>
                                              <input name="email2" id="email2" readonly="readonly" type="text" style="border:none">          
                                          </div>
                                          <div class="input-group">
                                               <span class="input-group-addon">
                                            </span>
                                              <label>Precio:</label>
                                              <input name="price1" id="price1" readonly="readonly" type="text" style="border:none">       
                                          </div> 
                                          <div class="input-group"  id="elemento" style="display: none;">
                                               <span class="input-group-addon">
                                            </span>
                                              <label >Precio:</label>
                                              <input name="price2" id="price2" type="text" readonly="readonly" style="border:none">        
                                          </div>
                                          <div class="input-group">
                                               <span class="input-group-addon">
                                            </span>
                                              <label>Total:</label>
                                              <input name="sum" id="sum" type="text" readonly="readonly" style="border:none">         
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-info btn-wd' name='next' value='Siguiente' id="mostrar" />
                                    <input type="submit" class='btn btn-finish btn-fill btn-info btn-wd' name='finish' value='Finalizar' />
                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='atras' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
          </div><!-- end row -->
      </div> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js'></script>
<script  src="/Hotel/public/js/reservation/index.js"></script>
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css'>
   @endsection