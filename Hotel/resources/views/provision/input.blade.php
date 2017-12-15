@extends('layouts.index')
@section('content')

      <script src="/Hotel/public/js/alert/alert_time.js"></script>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_title">
                  <h2><i class="fa fa-share"></i> Ingreso de suministros </h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>

                  </div>
                    @if (session('status'))
                    <div class = "alert alert-success">
                        {{ session ('status') }}
                    </div>
                @endif
                  <div class="x_content">
                    <br />
                    <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{url('storeInput')}}">
                       <div class="row">
                     <div class="form-group">
                        {{csrf_field()}}    
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Producto*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="id"  class="form-control " id="lgFormGroupInput"  required>
                           <option selected>Selecciona...</option>
                             @foreach($provi as $provisions)
                            <option value="{{ $provisions['id'] }}">{{$provisions['detail']}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cantidad</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number"  id="lgFormGroupInput"  name="quantity" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success btn-round">Agregar</button>
                          <a href="{{url('home')}}" type='button' value='Cerrar' class="btn btn-round btn btn-primary">Cerrar</a>
                          
                        </div>
                      </div>
                  </div>
                </div>
              </div>
  @endsection

            
     