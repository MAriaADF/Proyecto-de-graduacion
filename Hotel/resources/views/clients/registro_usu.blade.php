@extends('layouts.index')
@section('content')
  <div class="row">
         
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <h2><i class="fa fa-user-plus"></i> Registro de cliente </h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                      
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('client')}}">
                      {{csrf_field()}}
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" class="form-control has-feedback-left" id="name" name="name" required="required" placeholder="Nombre" maxlength="20" >
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" class="form-control has-feedback-left" id="last_name_1" name="last_name_1" required="required" placeholder="1° Apellido" maxlength="20">
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="last_name_2" name="last_name_2"  placeholder="2° Apellido" maxlength="20">
                          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="phone" class="form-control has-feedback-left" id="phone" name="phone"  placeholder="Teléfono" maxlength="12"  onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                          <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="email" class="form-control has-feedback-left" id="email"  name="email" data-parsley-trigger="change" required  placeholder="Correo" maxlength="35" >
                           <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                          <button type="submit" class="btn btn-success btn-round">Guardar</button>
                            <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-round  btn-primary">Cerrar</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
 @endsection

