@extends('layouts.index')
@section('content')
  <div class="row">
    <script src="/Hotel/public/js/alert/alert_time.js"></script>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                     <h2><i class="fa fa-unlock"></i> Cambiar Contraseña</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 @if (Session::has('message'))
                   <div class="text-danger">
                   {{Session::get('message')}}
                   </div>
                  @endif
                  <div class="x_content">
                    <br />
                      
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('updatePassword')}}">
                      {{csrf_field()}}
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="password" class="form-control has-feedback-left" id="mypassword" name="mypassword" required="required" placeholder="Contraseña Actual">
                          <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password"> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="password" class="form-control has-feedback-left" id="password" name="password" required="required" placeholder=" Nueva Contraseña">
                          <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirmation">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" class="form-control has-feedback-left" id="password_confirmation" name="password_confirmation"  placeholder="Confirmar nueva Contraseña">
                          <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         <button type="submit" class="btn btn-round btn btn-success"> Guardar</button>
                          <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-round btn btn-primary"> Cerrar</a>
                         
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
 @endsection

