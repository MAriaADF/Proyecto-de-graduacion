@extends('layouts.index')
@section('content')
 <div class="row">
    <script src="/Hotel/public/js/alert/alert_time.js"></script>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registro usuario</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  @if (session('status'))
                    <div class = "alert alert-success">
                        {{ session ('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class = "alert alert-error">
                        {{ session ('error') }}
                    </div>
                @endif
                  <div class="x_content">
                    <br />
                      
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('regist_provision')}}">
                      {{csrf_field()}}
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Producto*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  id="detail"  name="detail" required="required" class="form-control col-md-7 col-xs-12"  maxlength="55">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success btn-round">Guardar</button>
                          <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-primary btn-round">Cerrar</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
 @endsection

     